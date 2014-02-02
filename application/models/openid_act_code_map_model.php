<?php
class Openid_act_code_map_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function check($openid = ''){
        $sql = 'select * from openid_act_code_map where openid = ? ';
        $sqlData = array($openid);
        return $this->db->query($sql, $sqlData)->result();
    }

    public function insert($openid, $code) {
        if (empty($openid) || empty($code)) {
            return FALSE;
        }
        $insertDatas = array(
            array(
                'openid' => $openid,
                'code' => $code,
            ),
        );
        return $this->db->insert_batch('openid_act_code_map', $insertDatas);
    }
}
