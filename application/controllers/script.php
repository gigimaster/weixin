<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Script extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('article_model');
        //$test = $this->article_model->get_article();
        $profile = array(
           'token' => 'apitest',
           'appid' => 'wxafc10e114a16f7cf',
           'appsecret' => '21c0b3b0578ec552a6933afc32ddfbbc',
           'debug' => TRUE,
        );
        $this->load->library('WechatApi', $profile);
    }


	public function index($page = '', $id = 0) {
        $weObj = $this->wechatapi;
        //$weObj->valid();
        $type = $weObj->getRev()->getRevType();
        
        //include('/home/zx/sites/weixin/application/libraries/WebchatApi.php');
        switch($type) {
            case WechatApi::MSGTYPE_TEXT:
                    $weObj->text("hello, I'm wechat")->reply();
                    exit;
                    break;
            case WechatApi::MSGTYPE_EVENT:
                    break;
            case WechatApi::MSGTYPE_IMAGE:
                    break;
            default:
                    $weObj->text("help info")->reply();
        }
    }
}
