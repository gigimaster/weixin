<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Code_monitor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('code_monitor_model');
    }


	public function index() {
        $countNumTmp = $this->code_monitor_model->get_count();
        $count = array();
        foreach ($countNumTmp as $c) {
            $count[$c->code] = $c->num;
        }
        $total = $this->code_monitor_model->get_total_act();
        $echo = '';
        $arrKeys = array('门店类型', '区域', '省份','城市','门店编码','门店名称','一级系统','二级系统','经销商编码','经销商名称','赠品编码','赠品名称','规格','赠品箱数','赠品瓶数', '已抽奖数量');
        $echo = "<table border='1'><tr>";
        $echo .= "<td>id</td>";
        foreach ($arrKeys as $key) {
            $echo .= "<td>{$key}</td>";
        }
        $echo .= "</tr>";
        foreach ($total as $t) {
            $echo .= "<tr>";
            $echo .= "<td>{$t->code}</td>";
            $content = json_decode($t->ext_info, TRUE);
            foreach ($arrKeys as $a) {
                if ($a == '已抽奖数量') {
                    if (isset($count[$content['门店编码']])) {
                        $echo .= "<td>{$count[$content['门店编码']]}</tf>";
                    }
                    else {
                        $echo .= "<td>0</td>";
                    }
                }
                else {
                    if (isset($content[$a])) {
                        $ca = $content[$a];
                    }
                    else {
                        $ca = '';     
                    }
                    $echo .= "<td>$ca</td>";
                }
            }
            $echo .= "</tr>";
        }
        $echo .= "</table>";
        echo $echo;
    }
}
