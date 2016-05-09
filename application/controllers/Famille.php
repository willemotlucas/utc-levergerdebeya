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
        $method = $this->input->method(TRUE);
        $this->load->library('layout');

        if($method == "GET")
        {
            //Method GET allow us to retrieve edition form with ajax request
            $data = array();
            $output = $this->load->view("../views/families/form_add_family", $data, true);

            //Return html corresponding to the form
            echo $output;
        }


        else if($method == "POST")
        {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('session');

            $family_name = $this->input->post('family_name', TRUE);

            $this->form_validation->set_rules('family_name', 'Nom de la famille', 'required|max_length[50]');
            
            if($this->form_validation->run() == false){
                $this->session->set_flashdata('message-error','Une erreur est survenue ...'); 
            }else{
                $family = new Model\Famille();
                $family->denomination = $family_name;
                $family->save();
                $this->session->set_flashdata('message-success','La famille a bien été ajoutée.');
            }
        }
    }

    public function admin_delete(){
        $method = $this->input->method(TRUE);
        $this->load->library('layout');

        if($method == "GET")
        {
            //Method GET allow us to retrieve edition form with ajax request
            $family_id = $this->input->get('id', TRUE);
            $data['get_family'] = Model\Famille::find($family_id);

            $output = $this->load->view("../views/families/form_delete_family", $data, true);

            //Return html corresponding to the form
            echo $output;
        }


        else if($method == "POST")
        {
            $family_id = $this->input->post('family_id', TRUE);

            $family = Model\Famille::find($family_id);

            if(!is_null($family)){                
                $this->load->helper(array('url'));
                $this->load->library('session'); 
                
                $family->delete();
                $this->session->set_flashdata('message-success','La catégorie a bien été supprimée.');
            }else{
                $this->session->set_flashdata('message-error','Une erreur est survenue. Veuillez réessayer ultérieurement.');
            }
        }
    }
}