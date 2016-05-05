<?php if (!defined('BASEPATH')) die ('No direct script access allowed!');

class Categorie extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
    }

    public function index()
    {
        $this->load->library('layout');

        //Add the menu and load needed data
        $this->layout->include_public_menu();
        $data_menu['familles'] = Model\Famille::all();

        $this->layout->view('layout/menu_public', $data_menu);
    }

    public function details($id)
    {
        $data['category'] = Model\Categorie::find($id);
        //If the result is null, 404 error is shown
        if(is_null($data['category'])){
            show_404();
            return;
        }

        $this->load->library('layout');

        //Add the menu and load needed data
        $this->layout->include_public_menu();
        $data_menu['familles'] = Model\Famille::all();

        //Retrieve all the products
        $data['products'] = $data['category']->products();

        $this->layout->views('layout/menu_public', $data_menu)
        ->view('../views/categories/view_details_category', $data);
    }
}