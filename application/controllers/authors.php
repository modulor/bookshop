<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authors extends CI_Controller {

	function __construct(){
		parent::__construct();        
        $this->load->model('authors_model');       
	}

	public function index(){
		$this->add();
	}

	public function add(){

		if($this->input->post()){

			$data['saved'] = $this->authors_model->add($this->input->post());

		}
		
		$data['v_section'] = "authors/v_author_new";

		$this->load->view("v_main",$data);

	}
}