<?php
class Act_code_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function modify_act_ext_info($code, $ext_info = '') {
        if (empty($code)) {
            return FALSE;
        }
        $data = array( 'ext_info' => $ext_info);
        $this->db->where('code', (int)$code);
        $this->db->update('act_code', $data); 
    }

    public function check($code){
        $sql = 'select * from act_code where code = ?';
        $sqlData = array($code);
        return $this->db->query($sql, $sqlData)->result();
    }

    public function insert_code($codes) {
        $insertDatas = array();
        foreach ($codes as $code) {
            $insertDatas[] = array('code' => $code);
        }
        return $this->db->insert_batch('act_code', $insertDatas);
    }
}

