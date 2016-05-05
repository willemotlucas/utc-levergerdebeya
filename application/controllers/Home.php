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
}
