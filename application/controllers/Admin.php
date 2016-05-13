<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
        $this->session->testAdminLogged();
		$this->load->library('layout');

        //Add the menu and load needed data
		$this->layout->include_admin_menu();

		//Add required css
		$this->layout->add_css('dataTables');
		$this->layout->add_css('style');

		//Add required js
		$this->layout->add_js('jquery.dataTables');
		$this->layout->add_js('semantic.dataTables');
		$this->layout->add_js('admin');
		$this->layout->add_js('form_add_edit_category');
		$this->layout->add_js('form_add_edit_family');
		$this->layout->add_js('delete_category');
		$this->layout->add_js('delete_family');

		$data['families'] = Model\Famille::all();
		
		$this->layout->views('layout/menu_admin')
		->view('../views/admin/index', $data);
	}
}
