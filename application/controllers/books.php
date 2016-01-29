<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

	function __construct(){
		parent::__construct();        
        $this->load->model('books_model');       
	}

	public function index(){
		$this->catalog();
	}

	// browse catalog
	public function catalog(){

		// form post

		$data['form'] = $this->input->post();

		// get books list

		$data['book_list'] = $this->books_model->book_list();

		foreach ($data['book_list'] as $book) {
			$data['authors']['book_'.$book->id_book] = $this->books_model->get_book_authors($book->id_book);
		}

		$data['v_section'] = "books/v_catalog";

		$this->load->view("v_main",$data);

	}


	// new book

	public function add(){

		if($this->input->post()):

			// save the new book

			$data['saved'] = $this->books_model->add($this->input->post());

		endif;

		// author list

		$this->load->model("authors_model");

		$data['author_list'] = $this->authors_model->author_list();

		$data['v_section'] = "books/v_book_new";

		$this->load->view("v_main",$data);

	}


	// edit book

	public function edit($id_book = ""){

		if(!$this->books_model->validate($id_book))
			redirect(base_url(),"refresh");

		if($this->input->post()){

			$data['saved'] = $this->books_model->edit($this->input->post(),$id_book);

		}

		// book info

		$data['book'] = $this->books_model->info($id_book);

		// get the author

		$data['the_authors']['book_'.$id_book] = $this->books_model->get_book_authors($id_book);

		// author list

		$this->load->model("authors_model");

		$data['author_list'] = $this->authors_model->author_list();

		$data['id_book'] = $id_book;

		$data['v_section'] = "books/v_book_edit";

		$this->load->view("v_main",$data);

	}


	// validate if ISBN code exist in "book" table

	public function validate_isbn(){

		$data['response'] = $this->books_model->validate_isbn($_POST['isbn']);

        print json_encode($data);                

	}

}