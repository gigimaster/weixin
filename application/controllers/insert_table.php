<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insert_table extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('msg_map_model');
        $this->load->model('matter_table_model');
        $this->load->model('openid_act_code_map_model');
        $this->load->model('act_code_model');
    }


	public function index($table = '') {
        if (empty($table)) {
            echo "empty table\n";exit;     
    
        }
        $num = $this->$table();
        echo "num:\t{$num}\n";
    }

    private function msg_map($content = '', $matterId) {
        if (empty($content) || empty($matterId)) {
            return FALSE;     
        }
        $datas = array(
            array(
                'msg_content' => $content,
                'msg_action' => '',
                'msg_type' => 1,
                'matter_id' => $matterId,
            ),
        );
        return $this->msg_map_model->insert_msg_map($datas);
    }

    private function msg_map_multi() {
        $file = file('/tmp/tuwencontent');
        $contents = array();
        $mid = 442;
        foreach ($file as $line) {
            $c = trim($line, '"');
            $c = trim($c);
            $contents[] = $c;
        }
        foreach ($contents as $co) {
            $this->msg_map($co, $mid);
        }
    }



    private function matter_table() {
        $datas = array(
            array(
                'type' => 'CLICK',
                'media_id' => 0,
                'title' => 'zxh',
                'description' => 'zxhhuihuihuolaibeijingfazhanme',
                'url_main' => 'www.meilishuo.com',
                'url_slave' => 'http://tp4.sinaimg.cn/1677257583/180/5672937731/0',
            ),
        );
        return $this->matter_table_model->insert_matter_table($datas);
    }

    private function double_table() {
        $massageType = 2;
        if ($massageType == 1) {
            $msgAction = '';
            $msgType = 1;
            $matterType = 'text';
        }
        else {
            $matterType = 'event';
            $msgAction = '';
            $msgType = 1;
        }

        $sourceData = array(
            'msg_content' => '亮白增艳洗衣液',
            'title' => '蓝月亮亮白增艳洗衣液',
            'description' =>
            '蓝月亮亮白增艳洗衣液独有的色彩调理技术，使衣服保持亮丽如新。了解洗衣液浓度与粘度的区别，亮白增艳洗衣液的特色、参考用量与使用注意事项请查看全文。',
            'url' =>
            'http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5NjEzNDQwMA==&appmsgid=10002741&itemidx=1&sign=1bc67a0fc733c98098d0b92a914b3ede#wechat_redirect',
            'pic_url' =>
            'http://mmsns.qpic.cn/mmsns/zntibgBQz8mO6FsR2gytJfLxwFp8oemrWJicjib06MPdEjVhFibBMN85PA/0',
        );
        if (empty($sourceData['title'])) {
            $matterType = 'text';
        }

        $matter = array(
            array(
                'type' => $matterType,
                'media_id' => 0,
                'title' => $sourceData['title'],
                'description' => $sourceData['description'],
                'url_main' => $sourceData['url'],
                'url_slave' => $sourceData['pic_url'],
            ),
        );

        $this->matter_table_model->insert_matter_table($matter);

        $matter_id = $this->matter_table_model->db->insert_id();
        if (empty($matter_id)) {
            echo 'empty matter_id';exit;
        }
        else {
            var_dump($matter_id);     
        }

        $msg = array(
            array(
                'msg_content' => $sourceData['msg_content'],
                'msg_action' => $msgAction,
                'msg_type' => $msgType,
                'matter_id' => $matter_id,
            ),
        );
 
        $this->msg_map_model->insert_msg_map($msg);
    }

    private function text_modify_recommend_insert($key, $content) {
        if (empty($key) || empty($content)) {
            return FALSE;     
        }
        $msgAction = '';
        $msgType = 1;
        $matterType = 'text';

        $sourceData = array(
            'msg_content' => $key,
            'title' => '',
            'description' =>
            $content,
            'url' =>
            '',
            'pic_url' =>
            '',
        );

        $matter = array(
            array(
                'type' => $matterType,
                'media_id' => 0,
                'title' => $sourceData['title'],
                'description' => $sourceData['description'],
                'url_main' => $sourceData['url'],
                'url_slave' => $sourceData['pic_url'],
            ),
        );

        $this->matter_table_model->insert_matter_table($matter);

        $matter_id = $this->matter_table_model->db->insert_id();
        if (empty($matter_id)) {
            echo 'empty matter_id';exit;
        }
        else {
            var_dump($matter_id);     
        }

        $msg = array(
            array(
                'msg_content' => $sourceData['msg_content'],
                'msg_action' => $msgAction,
                'msg_type' => $msgType,
                'matter_id' => $matter_id,
            ),
        );
 
        $this->msg_map_model->insert_msg_map($msg);
    }


    private function auto_recommend() {
        $file = file('/tmp/content');

        $filenew = array();
        foreach ($file as $line) {
            $filenew[]= trim($line);
        }

        $inlalala = FALSE;

        $tmp = array('key'=>array(), 'content'=>array());
        $total = array();
        foreach ($filenew as $line) {
            if (strpos($line, 'lalala') !== FALSE) {
                if (!empty($tmp)) {
                    $total[] = $tmp;
                    $tmp = array('key'=>array(), 'content'=>array());
                }
            }
            if (strpos($line, 'lalala') !== FALSE) {
                $inlalala = TRUE;
                $innanana = FALSE;
            }
            if (strpos($line, 'nanaan') !== FALSE) {
                $innanana = TRUE;
                $inlalala = FALSE;
            }
            if ($inlalala) {
                $key = trim($line);
                $key = trim($key, 'lalala');
                $key = trim($key);
                if (!empty($key)) {
                    $tmp['key'][] = $key;
                }
                $key = '';
            }
            if ($innanana) {
                $content = trim($line);
                $content = trim($content, 'nanaan');
                $content = trim($content);
                if (!empty($tmp['content'][0])) {
                    $tmp['content'][0] .= "\n".$content;
                }
                else {
                    $tmp['content'][] = $content;
                }
                $content = '';
            }
        }
        foreach ($total as $single) {
            $keys = $single['key'];
            $content = $single['content'];
            foreach ($keys as $k) {
                $this->text_modify_recommend_insert($k, $content[0]);
            }
        }
    }

    private function update_code_ext_info() {
        $extinfo= file('/tmp/shopInfo122');
        $info = array();
        $codes = array();
        foreach ($extinfo as $i) {
            $tmp = trim($i);
            $tmpArr = explode(" ", $tmp);
            $arrTmp = array();
            foreach ($tmpArr as $t) {
                $t = trim($t);
                if (!empty($t)) {
                    $arrTmp[] = $t;
                }
            }
            $arr = array();
            $arrKeys = array('门店类型', '区域', '省份','城市','门店编码','门店名称','一级系统','二级系统','经销商编码','经销商名称','赠品编码','赠品名称','规格','赠品箱数','赠品瓶数');
            foreach ($arrTmp as $k=>$a) {
                $arr[$arrKeys[$k]] = $a;
            }
            $code = $arr['门店编码'];
            $info[$code] = $arr;
            $codes[] = $code;
        }
        $this->act_code_model->insert_code($codes);
        foreach ($info as $c => $a) {
            $this->act_code_model->modify_act_ext_info($c, json_encode($a));
        }
    }
    




    private function insert_code() {
        $codes = array(
            2401406,2003110,2002220,2233840,2012240,2013201,2002460,2020855,2071641,2046290,2098052
        );
        return $this->act_code_model->insert_code($codes);
    }
}

