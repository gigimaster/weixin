<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bluemoon extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $profile = array(
           'token' => 'bluemoon',
           'appid' => 'wx1376c9c0aa72ddeb',
           'appsecret' => '499cb8a279f50c6312f65c7723b7f526',
           'debug' => TRUE,
        );
        $this->load->library('WechatApi', $profile);
        $this->load->model('msg_map_model');
        $this->load->model('matter_table_model');
        $this->load->model('act_code_model');
        $this->load->model('openid_act_code_map_model');
    }


	public function index($page = '', $action = '') {
        //$this->valid();

        if (empty($page)) {
            $result = $this->message();
        }
        else {
            $result = $this->$page($action);
        }
    }


    public function act() {
        $openid = 0;
        if (isset($_GET['openid'])) {
            $openid = $_GET['openid'];
        }
        $checkOpenId = $this->openid_act_code_map_model->check($openid);
        file_put_contents('/tmp/zxlogs', 'checkOpenid:'.print_r($checkOpenId, TRUE), FILE_APPEND);
        if (!empty($checkOpenId)) {
            $pass = FALSE; 
        }
        else {
            $pass = TRUE;
        }
        $data = array('pass' => $pass, 'openid' => $openid);
        file_put_contents('/tmp/zxlogs', 'data:'.print_r($data, TRUE), FILE_APPEND);
		$this->load->view('activity', $data);
    }

    public function act_code_check() {
        $openid = $_GET['openid'];
        $code = $_GET['code'];
        $checkCode = $this->act_code_model->check($code);
        file_put_contents('/tmp/zxlogs', 'checkcode:'.print_r($checkCode, TRUE), FILE_APPEND);
        file_put_contents('/tmp/zxlogs', 'code:'.print_r($code, TRUE), FILE_APPEND);
        if (!empty($checkCode)) {
            $this->openid_act_code_map_model->insert($openid, $code);
            $response_no = 0; 
        }
        else {
            $response_no = 1; 
        }
        echo '{"no" : '.$response_no.'}';
    }

    public function message() {
        $type = $this->wechatapi->getRev()->getRevType();
        switch($type) {
            case WechatApi::MSGTYPE_EVENT:
                $params = $this->eventRequestParse();
                break;
            case WechatApi::MSGTYPE_TEXT:
                $params = $this->textRequestParse();
                break;
        }
        if (empty($params)) {
            return FALSE; 
        }
        $msg = $this->msg_map_model->get_msg_map($params);
        if (!empty($msg)) {
            $this->sendMessageSingle($msg[0]);
        }
    }

    private function eventRequestParse() {
        $fromUser = $this->wechatapi->getRev()->getRevFrom();
        $toUser = $this->wechatapi->getRev()->getRevTo();
        $event = $this->wechatapi->getRev()->getRevEvent();
        if (empty($event)) {
            return FALSE;
        }

        $params = array();
        $params['msg_content'] = $event['key'];
        $params['msg_action'] = strtoupper($event['event']);
        $params['msg_type'] = 2;
        return $params;    
    }
    
    private function textRequestParse() {
        $content = $this->wechatapi->getRev()->getRevContent();
        $params = array('msg_content' => $content, 'msg_type' => 1);
        return $params;
    }

    private function sendMessageSingle($msg) {
        $matter = $this->matter_table_model->get_matter(array($msg->matter_id));
        if (empty($matter)) {
            return FALSE;
        }
        $type = $matter[0]->type;
        if ($type == WechatApi::MSGTYPE_EVENT) {
            $fromUser = $this->wechatapi->getRev()->getRevFrom();
            $time = time();
            $params = "openid={$fromUser}&t={$time}";
            if (!empty($matter[0]->url_main)) {
                $url = $matter[0]->url_main; 
                if (strpos($url, "?") !== FALSE) {
                    $url .= "&{$params}";
                }
                else {
                    $url .= "?{$params}";
                }
            }
            else {
                $url = '';     
            }
            $news = array();
            $new['Title'] = $matter[0]->title;
            $new['Description'] = $matter[0]->description;
            $new['Url'] = $url;
            $new['PicUrl'] = $matter[0]->url_slave;
            $news[] = $new;
            $this->wechatapi->news($news)->reply();
        }
        else if ($type == WechatApi::MSGTYPE_TEXT) {
            $this->wechatapi->text($matter[0]->description)->reply();
        }
        else if ($type == WechatApi::MSGTYPE_IMAGE) {
            $this->wechatapi->image($matter[0]->media_id)->reply();
        }
    }

    public function menu($action = 'get') {
        var_dump($action);
        switch ($action) {
            case 'DELETE' :
                break;
            case 'create' :
                $result = $this->wechatapi->createMenu($this->hackMenu());
                break;
            case 'get' :
                return $this->wechatapi->getMenu();
        }
    }

    private function hackMenu() {
        $menu = array ( 'button' => array ( array ( 'name' => '在线咨询', 'sub_button' => array ( array ( 'type' => 'click', 'name' => '新品体验', 'key' => 1, 'sub_button' => array (),), array ( 'type' => 'click', 'name' => '人工咨询', 'key' => 3, 'sub_button' => array (),),),), array ( 'name' => '两大难题', 'sub_button' => array ( array ( 'type' => 'click', 'name' => '油斑', 'key' => 4, 'sub_button' => array (),), array ( 'type' => 'click', 'name' => '色渍', 'key' => 5, 'sub_button' => array (),),),), array ( 'name' => '科学洗衣', 'sub_button' => array ( array ( 'type' => 'click', 'name' => '优质洗衣液', 'key' => 6, 'sub_button' => array (),), array ( 'type' => 'click', 'name' => '洗衣液更省钱', 'key' => 7, 'sub_button' => array (),), array ( 'type' => 'click', 'name' => '不同洗衣液特色', 'key' => 8, 'sub_button' => array (),), array ( 'type' => 'click', 'name' => '科学洗衣法', 'key' => 9, 'sub_button' => array (),),),),),);
        return $menu;
    }

    public function valid() {
        return $this->wechatapi->valid();
    }
}
