<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		//TODO: Check if the current user is an administrator
		$this->load->library('layout');
		$this->load->library('session'); 

        //Add the menu and load needed data
		$this->layout->include_admin_menu();

		//Add required css
		$this->layout->add_css('dataTables');

		//Add required js
		$this->layout->add_js('jquery.dataTables');
		$this->layout->add_js('semantic.dataTables');
		$this->layout->add_js('admin');
		$this->layout->add_js('form_add_edit_category');
		$this->layout->add_js('delete_category');

		$data['families'] = Model\Famille::all();
		
		$this->layout->views('layout/menu_admin')
		->view('../views/admin/index', $data);
	}
}
