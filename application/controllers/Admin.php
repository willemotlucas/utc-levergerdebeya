<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		//TODO: Check if the current user is an administrator
		$this->load->library('layout');

        //Add the menu and load needed data
		$this->layout->include_admin_menu();

		$this->layout->add_css('dataTables');
		$this->layout->add_js('jquery.dataTables');
		$this->layout->add_js('semantic.dataTables');
		$this->layout->add_js('admin');

		$data['families'] = Model\Famille::all();
		
		$this->layout->views('layout/menu_admin')
		->view('../views/admin/index', $data);
	}
}
