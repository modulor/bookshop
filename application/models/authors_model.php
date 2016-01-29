<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authors_model extends CI_Model {

	// show list author from "author" table

	public function author_list(){

		return $query = $this->db->order_by("name")
		->get("author")
		->result();

	}

	// add a new author to "author" table

	public function add($form){

		$data = array(
			'name' => $form['name'],
			'lastname' => $form['lastname'],
			'birthday' => $form['birthday']
		);

		$insert = $this->db->insert("author",$data);

		return true;

	}

}