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
        $this->session->testAdminLogged();
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
            $this->form_validation->set_rules('family_name', 'Nom de la famille', 'required|max_length[50]');

            if($this->form_validation->run() == false){
                $this->session->set_flashdata('message-error','Une erreur est survenue. Veuillez réessayer ultérieurement.'); 
            }else{
                $family_name = $this->input->post('family_name', TRUE);
                $family = new Model\Famille();
                $family->denomination = $family_name;
                if($family->save()){
                    //Si il y a une image à uploader
                    if(isset($_FILES['picture_create'])){
                        $last_family = Model\Famille::last_created();
                        $config['upload_path']          = './assets/images/';
                        $config['allowed_types']        = 'jpg|png';
                        $config['file_name']            = $last_family->id.'-'.$last_family->denomination;
                        $config['overwrite']            = TRUE;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('picture_create'))
                        {
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('message-error', $eror);
                        }
                        else
                        {
                            $this->upload->data();
                            $last_family->image = $this->upload->data('file_name');
                            $last_family->save();
                            $this->session->set_flashdata('message-success','La famille a bien été ajoutée.');
                        }
                    } //Sinon on affiche seulement un message de succès
                    else{
                        $this->session->set_flashdata('message-success','La famille a bien été ajoutée.');
                    }
                }else{
                    $this->session->set_flashdata('message-error','Une erreur est survenue. Veuillez réessayer ultérieurement.'); 
                }
                $this->session->set_flashdata('message-success','La famille a bien été ajoutée.');
            }
        }
    }

    public function admin_edit(){
        $this->session->testAdminLogged();
        $method = $this->input->method(TRUE);
        $this->load->library('layout');

        if($method == "GET")
        {
            //Method GET allow us to retrieve edition form with ajax request
            $family_id = $this->input->get('id', TRUE);
            $data['get_family'] = Model\Famille::find($family_id);

            $output = $this->load->view("../views/families/form_edit_family", $data, true);

            //Return html corresponding to the form
            echo $output;
        }


        else if($method == "POST")
        {
            $this->form_validation->set_rules('family_name', 'Nom de la famille', 'required|max_length[50]');
                
            if($this->form_validation->run() == false){
                error_log('validation failed');
                $this->session->set_flashdata('message-error','Une erreur est survenue. Veuillez réessayer ultérieurement.'); 
            }
            else
            {
                $family_name = $this->input->post('family_name', TRUE);
                $family_id = $this->input->post('family_id', TRUE);

                $family = Model\Famille::find($family_id);

                if(!is_null($family)){
                    $family->denomination = $family_name;

                    //Si il y a une image à uploader
                    if(isset($_FILES['picture_create'])){
                        error_log('file to upload');
                        $config['upload_path']          = './assets/images/';
                        $config['allowed_types']        = 'jpg|png';
                        $config['file_name']            = $family->id.'-'.$family->denomination;
                        $config['overwrite']            = TRUE;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('picture_create'))
                        {
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('message-error', $eror);
                        }
                        else
                        {
                            $this->upload->data();
                            $family->image = $this->upload->data('file_name');
                            $family->save();
                            $this->session->set_flashdata('message-success','La catégorie a bien été ajoutée.');
                        }
                    }
                    else{
                        $family->save();
                        $this->session->set_flashdata('message-success','La famille a bien été modifée.');
                    }
                }else{
                    $this->session->set_flashdata('message-error','Une erreur est survenue. Veuillez réessayer ultérieurement.');
                }
            }
        }
    }

    public function admin_delete(){
        $this->session->testAdminLogged();
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
            $this->form_validation->set_rules('family_id', 'Id de la famille', 'required');

            if($this->form_validation->run() == false){
                $this->session->set_flashdata('message-error','Une erreur est survenue ...'); 
            }
            else{
                $family_id = $this->input->post('family_id', TRUE);

                $family = Model\Famille::find($family_id);

                if(!is_null($family)){                            
                    $family->delete();
                    $this->session->set_flashdata('message-success','La catégorie a bien été supprimée.');
                }else{
                    $this->session->set_flashdata('message-error','Une erreur est survenue. Veuillez réessayer ultérieurement.');
                }
            }
        }
    }

    public function admin_details($familyId)
    {
        $this->session->testAdminLogged();
        $data['famille'] = \Model\Famille::find($familyId);
        if(is_null($data['famille']))
        {
            show_404();
            return;
        }

        $this->load->library('layout');
        //Add the menu and load needed data
        $this->layout->include_admin_menu();
        $this->layout->add_js('jquery.dataTables');
        $this->layout->add_js('semantic.dataTables');
        $this->layout->add_js('admin');
        $this->layout->add_js('delete_product');

        $this->layout->views('layout/menu_admin')
        ->view('../views/families/view_admin_all_product', $data);
    }
}