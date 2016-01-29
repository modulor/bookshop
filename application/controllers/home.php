<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){

		$data['v_section'] = "v_home";

		$this->load->view("v_main",$data);
	}
}
