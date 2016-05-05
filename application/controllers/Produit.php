<?php if (!defined('BASEPATH')) die ('No direct script access allowed!');

class Produit extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
    }

    public function details($id)
    {
        $data['product'] = Model\Produit::find($id);
        //If the result is null, 404 error is shown
        if(is_null($data['product'])){
            show_404();
            return;
        }

        $this->load->library('layout');

        //Add the menu and load needed data
        $this->layout->include_public_menu();
        $data_menu['familles'] = Model\Famille::all();

        $this->layout->views('layout/menu_public', $data_menu)
        ->view('../views/products/view_details_product', $data);
    }
}