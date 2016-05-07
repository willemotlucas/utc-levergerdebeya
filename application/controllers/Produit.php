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
        $this->layout->add_js('produit');

        //Add the menu and load needed data
        $this->layout->include_public_menu();
        $data_menu['familles'] = Model\Famille::all();

        $where = "categorie_id=".$data['product']->categorie()->id." and id!=".$id;

        $data['product_categories'] = $this->db->select('*')
                                               ->from('produit')
                                               ->where($where)
                                               ->limit(2)
                                               ->get();

        //$data['product_categories'] = Model\Produit::limit(2)->find_by_categorie_id($data['product']->categorie()->id);

        $this->layout->views('layout/menu_public', $data_menu)
        ->view('../views/products/view_details_product', $data);
    }
}