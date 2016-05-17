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
        if($this->session->has_userdata('userLogged'))
        {
            $currentUser = $this->session->userdata('userLogged');
            if($currentUser->type == 'admin')
            {
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
                    $this->form_validation->set_rules('category_name', 'Nom de la catégorie', 'required|max_length[50]');
                    $this->form_validation->set_rules('family_id', 'Famille de la catégorie', 'required');

                    if($this->form_validation->run() == false){
                        $this->session->set_flashdata('message-error','1 Une erreur est survenue ...'); 
                    }else{
                        $category_name = $this->input->post('category_name', TRUE);
                        $category_id = $this->input->post('category_id', TRUE);
                        $family_id = $this->input->post('family_id', TRUE);

                        $category = Model\Categorie::find($category_id);
                        $family = Model\Famille::find($family_id);

                        if(!is_null($category) && !is_null($family)){
                            $category->denomination = $category_name;
                            $category->famille_id = $family_id;
                            
                            if(isset($_FILES['picture_create'])){
                                $config['upload_path']          = './assets/images/';
                                $config['allowed_types']        = 'jpg|png|jpeg';
                                $config['file_name']            = $category->id.'-'.$category->denomination.'-'.$category->family()->denomination;
                                $config['overwrite']            = TRUE;

                                $this->load->library('upload', $config);

                                if (!$this->upload->do_upload('picture_create'))
                                {
                                    $error = $this->upload->display_errors();
                                    $this->session->set_flashdata('message-error', "Une erreur est survenue pendant le téléchargement de l'image. Veuillez réessayer ultérieurement.");
                                }
                                else
                                {
                                    $this->upload->data();
                                    $category->image = $this->upload->data('file_name');
                                    $category->save();
                                    $this->session->set_flashdata('message-success','La catégorie a bien été modifiée.');
                                }
                            }else{
                                $category->save();
                                $this->session->set_flashdata('message-success','La catégorie a bien été modifiée.');
                            }
                                
                        }else{
                            $this->session->set_flashdata('message-error','2 Une erreur est survenue ...'); 
                        }
                    }
                }
            }
            else
            {
                redirect('/Home', 'location');
            }
        }
        else
        {
            redirect('/Home', 'location');
        }
    }

    public function admin_add(){
        if($this->session->has_userdata('userLogged'))
        {
            $currentUser = $this->session->userdata('userLogged');
            if($currentUser->type == 'admin')
            {
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
                    $this->form_validation->set_rules('category_name', 'Nom de la catégorie', 'required|max_length[50]');
                    $this->form_validation->set_rules('family_id', 'Famille de la catégorie', 'required');

                    if($this->form_validation->run() == false){
                        $this->session->set_flashdata('message-error',"Une erreur est survenue ..."); 
                    }
                    else
                    {
                        $category_name = $this->input->post('category_name', TRUE);
                        $family_id = $this->input->post('family_id', TRUE);

                        $family = Model\Famille::find($family_id);

                        if(!is_null($family)){
                            $category = new Model\Categorie();
                            $category->denomination = $category_name;
                            $category->famille_id = $family_id;

                            if($category->save()){

                                //Si il y a une image à uploader
                                if(isset($_FILES['picture_create'])){
                                    $last_category = Model\Categorie::last_created();
                                    $config['upload_path']          = './assets/images/';
                                    $config['allowed_types']        = 'jpg|png';
                                    $config['file_name']            = $last_category->id.'-'.$last_category->denomination.'-'.$last_category->family()->denomination;
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
                                        $last_category->image = $this->upload->data('file_name');
                                        $last_category->save();
                                        $this->session->set_flashdata('message-success','La catégorie a bien été ajoutée.');
                                    }
                                } //Sinon on affiche seulement un message de succès
                                else{
                                    $this->session->set_flashdata('message-success','La catégorie a bien été ajoutée.');
                                }
                            }else{
                                $this->session->set_flashdata('message-error','Une erreur est survenue ...');   
                            }
                        }else{
                            $this->session->set_flashdata('message-error','Une erreur est survenue ...'); 
                        }
                    }
                }
            }
            else
            {
                redirect('/Home', 'location');
            }
        }
        else
        {
            redirect('/Home', 'location');
        }
    }

    public function admin_delete(){
        if($this->session->has_userdata('userLogged'))
        {
            $currentUser = $this->session->userdata('userLogged');
            if($currentUser->type == 'admin')
            {
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
                    $this->form_validation->set_rules('category_id', 'Id de la catégorie', 'required');

                    if($this->form_validation->run() == false){
                        $this->session->set_flashdata('message-error','Une erreur est survenue ...'); 
                    }
                    else{
                        $category_id = $this->input->post('category_id', TRUE);
                        $category = Model\Categorie::find($category_id);

                        if(!is_null($category)){                
                            foreach ($category->products as $product) {
                                Model\Produit::delete($product->id);
                            }
                            
                            $category->delete();
                            $this->session->set_flashdata('message-success','La catégorie a bien été supprimée.');
                        }
                        else{
                            $this->session->set_flashdata('message-error','Une erreur est survenue ...'); 
                        }
                    }
                }
            }
            else
            {
                redirect('/Home', 'location');
            }
        }
        else
        {
            redirect('/Home', 'location');
        }
    }

    public function admin_show($categId)
    {
        $this->session->testAdminLogged();
        $data['categ'] = \Model\Categorie::find($categId);
        if(is_null($data['categ']))
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
        ->view('../views/categories/view_admin_categories_product', $data);
    }

}