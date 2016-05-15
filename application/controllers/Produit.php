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

        $where = "categorie_id=".$data['product']->categorie()->id." and id!=".$id." and produit_du_moment=1";

        $data['product_categories'] = $this->db->select('*')
                                               ->from('produit')
                                               ->where($where)
                                               ->limit(2)
                                               ->get();

        $this->layout->views('layout/menu_public', $data_menu)
        ->view('../views/products/view_details_product', $data);
    }

    public function admin_addProduct($familyId)
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
        $this->layout->add_js('create_product_form');


        $method = $this->input->method(TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('denomination_create', 'Denomination', 'required', array('required'=>'La dénomination du produit est obligatoire'));
        $this->form_validation->set_rules('categorie_create', 'Categorie', 'required', array('required'=>'La catégorie est requise. Si vous ne trouvez pas la catégorie, vous devez en ajouter une via l\'accueil du menu d\'administration: <a href="'.base_url().'index.php/Admin">Accueil Admin</a>'));
        $this->form_validation->set_rules('prix_create', 'Prix', 'required|greater_than_equal_to[0]', array('required'=>'Le prix est obligatoire', 'greater_than_equal_to'=>'Le prix doit être supérieur ou égal à 0€'));
        $this->form_validation->set_rules('type_create', 'Vente par', 'required', array('required'=>'Le type de vente (kg/pièce) est obligatoire'));

        $this->form_validation->set_error_delimiters('<div class="ui error message">', '</div>');
        

         if ($this->form_validation->run() == FALSE)
        {
            
            $this->layout->views('layout/menu_admin')
            ->view('../views/products/admin_add_product', $data);
        }
        else
        {
            $newProduct = new \Model\Produit();

            $newProduct->denomination = $this->input->post('denomination_create', TRUE);
            $newProduct->origine = $this->input->post('origine_create', TRUE);
            $newProduct->prix = $this->input->post('prix_create', TRUE);
            $newProduct->typeVente = $this->input->post('type_create', TRUE);
            $newProduct->description = $this->input->post('description_create', TRUE);
            if(strcmp($this->input->post('moment_create', TRUE), 'on')==0)
            {
                $newProduct->produit_du_moment = 1;
            }
            else
            {
                $newProduct->produit_du_moment = 0;
            }
            if(strcmp($this->input->post('phare_create', TRUE), 'on')==0)
            {
                $newProduct->produit_phare = 1;
            }
            else
            {
                $newProduct->produit_phare = 0;
            }

            $newProduct->categorie_id = $this->input->post('categorie_create', TRUE);
            $newProduct->save();

            $newProduct = \Model\Produit::last_created();
            $this->session->set_flashdata('message-success', 'Le produit \''.$newProduct->denomination.'\' a bien été créé.');
            redirect('Produit/admin_addImage/'.$newProduct->id);

        }
    }

    public function admin_addImage($productId)
    {
        $this->session->testAdminLogged();
        $product = \Model\Produit::find($productId);
        $data['product'] = $product;
        if(is_null($product))
        {
            show_404();
            return;
        }

        $this->load->library('layout');
        //Add the menu and load needed data
        $this->layout->include_admin_menu();
        $this->layout->add_js('create_product_form');

        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = $product->id.'-'.$product->denomination.'-'.$product->categorie()->family()->denomination;
        $config['overwrite']            = TRUE;
        $data['error']='';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('picture_create'))
        {
                $data['error'] = $this->upload->display_errors();
                $this->layout->views('layout/menu_admin')
                ->view('../views/products/admin_add_image_product', $data);
        }
        else
        {
                $this->upload->data();
                $product->image = $this->upload->data('file_name');
                $product->save();
                $this->session->set_flashdata('message-success', 'Produit bien créé');
                redirect('Produit/admin_details/'.$product->id);
        }       
    }  

    public function admin_details($productId)
    {
        $this->session->testAdminLogged();
        $product = \Model\Produit::find($productId);
        $data['product'] = $product;
        if(is_null($product))
        {
            show_404();
            return;
        }

        $this->load->library('layout');
        //Add the menu and load needed data
        $this->layout->include_admin_menu();

        $this->layout->views('layout/menu_admin')
        ->view('../views/products/view_admin_details_product', $data);
    }

    public function admin_edit($productId)
    {
        $this->session->testAdminLogged();
        $product = \Model\Produit::find($productId);
        $data['product'] = $product;
        if(is_null($product))
        {
            show_404();
            return;
        }

        $this->load->library('layout');
        //Add the menu and load needed data
        $this->layout->include_admin_menu();
        $this->layout->add_js('edit_product_form');


        $method = $this->input->method(TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('denomination_edit', 'Denomination', 'required', array('required'=>'La dénomination du produit est obligatoire'));
        $this->form_validation->set_rules('categorie_edit', 'Categorie', 'required', array('required'=>'La catégorie est requise. Si vous ne trouvez pas la catégorie, vous devez en ajouter une via l\'accueil du menu d\'administration: <a href="'.base_url().'index.php/Admin">Accueil Admin</a>'));
        $this->form_validation->set_rules('prix_edit', 'Prix', 'required|greater_than_equal_to[0]', array('required'=>'Le prix est obligatoire', 'greater_than_equal_to'=>'Le prix doit être supérieur ou égal à 0€'));
        $this->form_validation->set_rules('type_edit', 'Vente par', 'required', array('required'=>'Le type de vente (kg/pièce) est obligatoire'));

        $this->form_validation->set_error_delimiters('<div class="ui error message">', '</div>');
        

         if ($this->form_validation->run() == FALSE)
        {
            
            $this->layout->views('layout/menu_admin')
            ->view('../views/products/admin_edit_product', $data);
        }
        else
        {
            $product->denomination = $this->input->post('denomination_edit', TRUE);
            $product->origine = $this->input->post('origine_edit', TRUE);
            $product->prix = $this->input->post('prix_edit', TRUE);
            $product->typeVente = $this->input->post('type_edit', TRUE);
            $product->description = $this->input->post('description_edit', TRUE);
            if(strcmp($this->input->post('moment_edit', TRUE), 'on')==0)
            {
                $product->produit_du_moment = 1;
            }
            else
            {
                $product->produit_du_moment = 0;
            }
            if(strcmp($this->input->post('phare_edit', TRUE), 'on')==0)
            {
                $product->produit_phare = 1;
            }
            else
            {
                $product->produit_phare = 0;
            }

            $product->categorie_id = $this->input->post('categorie_edit', TRUE);
            $product->save();

            $this->session->set_flashdata('message-success', 'Le produit \''.$product->denomination.'\' a bien été modifié.');
            redirect('Produit/admin_details/'.$product->id);

        }
    }

    public function admin_delete(){

        $method = $this->input->method(TRUE);
        $this->load->library('layout');

        if($method == "GET")
        {
            //Method GET allow us to retrieve edition form with ajax request
            $productId = $this->input->get('id', TRUE);
            $data['get_product'] = Model\Produit::find($productId);

            $output = $this->load->view("../views/products/form_delete_product", $data, true);

            //Return html corresponding to the form
            echo $output;
        }


        else if($method == "POST")
        {
            $this->form_validation->set_rules('product_id', 'Id du produit', 'required');

            if($this->form_validation->run() == false){
                $this->session->set_flashdata('message-error','Une erreur est survenue ...'); 
            }
            else{
                $product_id = $this->input->post('product_id', TRUE);

                $product = Model\Produit::find($product_id);

                if(!is_null($product)){                            
                    $product->delete();
                    $this->session->set_flashdata('message-success','Le produit '.$product->denomination.' a bien été supprimée.');
                }else{
                    $this->session->set_flashdata('message-error','Une erreur est survenue. Veuillez réessayer ultérieurement.');
                }
            }
        }
    }
}