<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books_model extends CI_Model {

	// list from table "book"

	public function book_list(){

		$this->db->select("b.*");
		$this->db->from("book b");
		$this->db->join("book_has_author bha","b.id_book = bha.book_id_book","inner");

		if($this->input->post()):

			$form = $this->input->post();

			// get search options

			//author

			if($form['author']!=""):

				$this->db->join("author a","bha.author_id_author = a.id_author","inner");
				$this->db->like("a.name",$form['author']);
				$this->db->or_like("a.lastname",$form['author']);

			endif;

			// title

			if($form['title']!=""):

				$this->db->like("b.title",$form['title']);

			endif;

			// publication

			if($form['publication']!=""){

				switch ($form['publication_range']) {
					case 'before':
						$this->db->where("b.publication <=",$form['publication']);
					break;
					
					default:
						$this->db->where("b.publication >=",$form['publication']);
					break;
				}

			}

			// price

			if($form['price']!=""){

				switch ($form['price_range']) {
					case 'less':
						$this->db->where("b.price <=",$form['price']);
					break;
					
					default:
						$this->db->where("b.price >=",$form['price']);
					break;
				}

			}

		endif;

		return $query = $this->db->group_by('b.id_book')
		->get()
		->result();

	}


	// get one o multiple authors from a book

	public function get_book_authors($id_book = ""){

		return $query = $this->db->select("concat(a.name,' ',a.lastname) as fullname, a.id_author",false)
		->from("author a")
		->join("book_has_author bha","a.id_author = bha.author_id_author","inner")
		->join("book b","bha.book_id_book = b.id_book","inner")
		->where("b.id_book",$id_book)
		->get()
		->result_array();

	}


	// insert row into table "book"

	public function add($form){

		$data = array(
			'ISBN' => $form['ISBN'],
			'title' => $form['title'],
			'publication' => $form['publication'],
			'price' => $form['price'],
			'image_url' => $form['image_url']
		);

		$insert_book = $this->db->insert("book",$data);

		// get the last id_book

		$id_book = $this->db->select_max("id_book")
		->get("book")
		->row()
		->id_book;

		// relate the book and the author(s)

		foreach($form['id_author'] as $id_author){

			$data_r = array(
				'book_id_book' => $id_book,
				'author_id_author' => $id_author
			);

			$insert_author = $this->db->insert("book_has_author",$data_r);

		}


		return true;

	}


	// validate book if exist and if id_book is numeric

	public function validate($id_book){

		if(!is_numeric($id_book))
			return false;

		$query = $this->db->select("id_book")
		->where("id_book",$id_book)
		->get("book")
		->num_rows();

		if($query>0)
			return true;

		return false;

	}


	// info book 

	public function info($id_book){

		return $query = $this->db->where("id_book",$id_book)
		->get("book")
		->row();

	}


	// edit row from table "book"

	public function edit($form,$id_book){

		$data = array(
			'title' => $form['title'],
			'publication' => $form['publication'],
			'price' => $form['price'],
			'image_url' => $form['image_url']
		);

		$update = $this->db->where("id_book",$id_book)
		->update("book",$data);

		// update book_has_author

		// by deleting first the existing relations

		$delete = $this->db->where("book_id_book",$id_book)
		->delete("book_has_author");

		// now insert the new value(s)

		foreach($form['id_author'] as $id_author){

			$data_h = array(
				'book_id_book' => $id_book,
				'author_id_author' => $id_author
			);

			$update_h = $this->db->insert("book_has_author",$data_h);

		}
		
		return true;

	}


	// valid unique value for ISBN in table "book"

	public function validate_isbn($isbn){

		$query = $this->db->select("ISBN")
		->where("ISBN",$isbn)
		->get("book")
		->num_rows();

		if($query > 0)
			return "exist";

		return "no_exist";

	}

}