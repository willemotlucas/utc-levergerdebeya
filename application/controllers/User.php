<?php if (!defined('BASEPATH')) die ('No direct script access allowed!');

class User extends CI_Controller
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
                $data['users'] = Model\User::all();

                // build our blog table
                $data['content'] = $this->load->view('view_all_users', $data, TRUE);

                // show the main template
                $this->load->view('main_template', $data);
        }
}