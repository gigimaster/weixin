<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Src extends CI_Controller {

    public function __construct() {
        parent::__construct();     
        $this->load->helper('file');
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function img($file = '') {
        if (empty($file)) {
            return '';
        }
        $a = read_file('/home/zx/sites/weixin/src/img/'.$file);
        echo $a;
	}

	public function js() {
		$this->load->view('welcome_message');
	}

	public function css() {
		$this->load->view('welcome_message');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
