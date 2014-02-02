<?php
class Matter_table_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }


    public function get_matter($params){
        $sql = 'select * from matter_table where 1 ';
        $sqlData = array();
        foreach ($params as $key => $value) {
            switch ($key) {
                case 'matter_id':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and matter_id = ? ";
                        $sqlData[] = $value;
                    }
                    break;
                case 'type':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and type = ? ";
                        $sqlData[] = $value;
                    }
                    break;
                case 'media_id':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and media_id = ? ";
                        $sqlData[] = $value;
                    }
                    break;
                case 'title':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and title = ? ";
                        $sqlData[] = $value;
                    }
                    break;
                case 'description':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and description = ? ";
                        $sqlData[] = $value;
                    }
                    break;
                case 'url_main':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and url_main = ? ";
                        $sqlData[] = $value;
                    }
                    break;
                case 'url_slave':
                    if (!empty($value) && !is_array($value)) {
                        $sql .= " and url_slave = ? ";
                        $sqlData[] = $value;
                    }
                    break;
            }
        }
        return $this->db->query($sql, $sqlData)->result();
    }

    public function insert_matter_table($datas) {
        $insertDatas = array();
        foreach ($datas as $data) {
            $tmp = array();
            $tmp['type'] = 
            isset($data['type'])?$data['type']:'';
            $tmp['media_id'] = 
            isset($data['media_id'])?$data['media_id']:0;
            $tmp['title'] = 
            isset($data['title'])?$data['title']:'';
            $tmp['description'] = 
            isset($data['description'])?$data['description']:'';
            $tmp['url_main'] = 
            isset($data['url_main'])?$data['url_main']:'';
            $tmp['url_slave'] = 
            isset($data['url_slave'])?$data['url_slave']:'';
            $insertDatas[] = $tmp;
        }
        return $this->db->insert_batch('matter_table', $insertDatas);
    }
}

