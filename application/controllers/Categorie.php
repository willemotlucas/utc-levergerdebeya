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

        $this->layout->views('layout/menu_public', $data_menu)->view('../views/categories/view_details_category', $data);
    }

    public function admin_edit(){
        $method = $this->input->method(TRUE);
        $this->load->library('layout');

        if($method == "GET")
        {
            //Method GET allow us to retrieve edition form with ajax request
            $category_id = $this->input->get('id', TRUE);
            $data['get_category'] = Model\Categorie::find($category_id);
            $data['get_families'] = Model\Famille::all();

            $output = $this->load->view("../views/categories/form_edit_category", $data, true);

            //Return html corresponding to the form
            echo $output;
        }


        else if($method == "POST")
        {
            $category_name = $this->input->post('category_name', TRUE);
            $category_id = $this->input->post('category_id', TRUE);
            $family_id = $this->input->post('family_id', TRUE);

            $category = Model\Categorie::find($category_id);
            $family = Model\Famille::find($family_id);

            if(!is_null($category) && !is_null($family)){                
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->load->library('session'); 

                $this->form_validation->set_rules('category_name', 'Nom de la catégorie', 'required|max_length[50]');
                $this->form_validation->set_rules('family_id', 'Famille de la catégorie', 'required');
                
                if($this->form_validation->run() == false){
                    $this->session->set_flashdata('message-error','Une erreur est survenue ...'); 
                }else{
                    $category->denomination = $category_name;
                    $category->famille_id = $family_id;
                    $category->save();
                    $this->session->set_flashdata('message-success','La catégorie a bien été modifée.');
                }
            }
        }
    }

    public function admin_add(){
        $method = $this->input->method(TRUE);
        $this->load->library('layout');

        if($method == "GET")
        {
            //Method GET allow us to retrieve edition form with ajax request
            $data['get_families'] = Model\Famille::all();
            $output = $this->load->view("../views/categories/form_add_category", $data, true);

            //Return html corresponding to the form
            echo $output;
        }


        else if($method == "POST")
        {
            $category_name = $this->input->post('category_name', TRUE);
            $category_id = $this->input->post('category_id', TRUE);
            $family_id = $this->input->post('family_id', TRUE);

            $family = Model\Famille::find($family_id);

            if(!is_null($family)){                
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->load->library('session'); 

                $this->form_validation->set_rules('category_name', 'Nom de la catégorie', 'required|max_length[50]');
                $this->form_validation->set_rules('family_id', 'Famille de la catégorie', 'required');
                
                if($this->form_validation->run() == false){
                    $this->session->set_flashdata('message-error','Une erreur est survenue ...'); 
                }else{
                    $category = new Model\Categorie();
                    $category->denomination = $category_name;
                    $category->famille_id = $family_id;
                    $category->save();
                    $this->session->set_flashdata('message-success','La catégorie a bien été ajoutée.');
                }
            }
        }
    }

    public function admin_delete(){
        $method = $this->input->method(TRUE);
        $this->load->library('layout');

        if($method == "GET")
        {
            //Method GET allow us to retrieve edition form with ajax request
            $category_id = $this->input->get('id', TRUE);
            $data['get_category'] = Model\Categorie::find($category_id);

            $output = $this->load->view("../views/categories/form_delete_category", $data, true);

            //Return html corresponding to the form
            echo $output;
        }


        else if($method == "POST")
        {
            $category_id = $this->input->post('category_id', TRUE);

            $category = Model\Categorie::find($category_id);

            if(!is_null($category)){                
                $this->load->helper(array('url'));
                $this->load->library('session'); 

                foreach ($category->products as $product) {
                    Model\Produit::delete($product->id);
                }
                
                $category->delete();
                $this->session->set_flashdata('message-success','La catégorie a bien été supprimée.');
            }
        }
    }

}