<?php if (!defined('BASEPATH')) die ('No direct script access allowed!');

class Famille extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
    }

    public function details($id)
    {
        //Retrieve the family with the given id
        $data['famille'] = Model\Famille::find($id);
        //If the result is null, 404 error is shown
        if(is_null($data['famille'])){
            show_404();
            return;
        }

        $this->load->library('layout');

        //Add the menu and load needed data
        $this->layout->include_public_menu();
        $data_menu['familles'] = Model\Famille::all();

        //Retrieve all categories for the given family
        $data['categories'] = $data['famille']->categories();

        $this->layout->views('layout/menu_public', $data_menu)
        ->view('../views/families/view_details_family', $data);
    }

    public function admin_add(){
        //TODO: Check if the current user is administrator

        $this->load->library('layout');
        $this->layout->views('layout/menu_admin')
        ->view('../views/families/view_add_form');
    }
}