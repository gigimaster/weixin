<?php
class Code_monitor_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }


    public function get_count(){
        $sql = 'select code,count(*) as num from openid_act_code_map group by code';
        return $this->db->query($sql)->result();
    }

    public function get_total_act(){
        $sql = 'select * from act_code';
        return $this->db->query($sql)->result();
    }
}

