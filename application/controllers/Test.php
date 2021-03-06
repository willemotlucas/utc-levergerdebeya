<?php if (!defined('BASEPATH')) die ('No direct script access allowed!');

class Test extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
    }

    /*
     * Displays all of the blog posts in a table
     */
    public function index()
    {
            // load all of our posts
            $data['utilisateur'] = Model\Utilisateur::all();
            $data['ville_livraison'] = Model\Ville_Livraison::all();
            $data['famille'] = Model\Famille::all();
            $data['categorie'] = Model\Categorie::all();

            // build our blog table
            $data['content'] = $this->load->view('test', $data, TRUE);

            // show the main template
            $this->load->view('main_template', $data);
    }
}