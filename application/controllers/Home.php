<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->library('layout');

        //Add the menu and load needed data
		$this->layout->include_public_menu();
		$data_menu['familles'] = Model\Famille::all();

		$this->layout->views('layout/menu_public', $data_menu)
		->view('products/test_product');
	}

	public function magasins()
	{
		$this->load->library('layout');

		$this->layout->include_public_menu();

		$data_menu['familles'] = Model\Famille::all();

		$this->layout->views('layout/menu_public', $data_menu)
		->view('home/magasins');
	}

	public function search()
	{
		//Construct navigation bar
		$this->load->library('layout');
		$this->layout->include_public_menu();
		$data_menu['familles'] = Model\Famille::all();

		//Retrieve post params
		$data['products'] = array();
		$search_text = $this->input->post('search_text', TRUE);
		$search_text = $this->security->xss_clean($search_text);

		if(!empty($search_text) && !is_null($search_text)){
			$sql = "SELECT * FROM Produit WHERE denomination LIKE '%" . $this->db->escape_like_str($search_text) . "%'";
			$query = $this->db->query($sql);

			foreach ($query->result() as $product) {
				array_push($data['products'], $product);
			}
			$data['count'] = $query->num_rows();
		}
		
		$this->layout->views('layout/menu_public', $data_menu)
		->view('home/search_result', $data);
	}
}
