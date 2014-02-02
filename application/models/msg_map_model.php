<?php
class Msg_map_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }


    public function get_msg_map($params){
        $sql = 'select * from msg_map where 1 ';
        $sqlData = array();
        foreach ($params as $key => $value) {
            switch ($key) {
                case 'msg_content':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and msg_content = ? ";
                        $sqlData[] = $value;
                    }
                    break;
                case 'msg_action':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and msg_action = ? ";
                        $sqlData[] = $value;
                    }
                    break;
                case 'msg_type':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and msg_type = ? ";
                        $sqlData[] = $value;
                    }
                    break;
            }
        }
        return $this->db->query($sql, $sqlData)->result();
    }

    public function insert_msg_map($datas) {
        $insertDatas = array();
        foreach ($datas as $data) {
            $tmp = array();
            $tmp['msg_content'] =
            isset($data['msg_content'])?$data['msg_content']:'';
            $tmp['msg_action'] = 
            isset($data['msg_action'])?$data['msg_action']:'';
            $tmp['msg_type'] = 
            isset($data['msg_type'])?$data['msg_type']:0;
            $tmp['matter_id'] = $data['matter_id'];
            if (empty($data['matter_id'])) {
                continue;
            }
            $insertDatas[] = $tmp;
        }
        return $this->db->insert_batch('msg_map', $insertDatas);
    }
}
