<?php if (!defined('BASEPATH')) die ('No direct script access allowed!');

class Utilisateur extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
    }

    public function createUser()
    {
        $method = $this->input->method(TRUE);
        $this->load->library('layout');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if($method == 'POST')
        {
            $newUser = new Model\Utilisateur();
            $password_create = $this->input->post('password_create', TRUE);
            $password_confirm = $this->input->post('password_confirm', TRUE);

            if(strcmp($password_create, $password_confirm) == 0)
            {
                $newUser->nom = $this->input->post('nom_create', TRUE);
                $newUser->prenom = $this->input->post('prenom_create', TRUE);
                $newUser->email = $this->input->post('mail_create', TRUE);
                $newUser->password = $password_create;
                $newUser->date_naissance = $this->input->post('birth_create', TRUE);
                $newUser->tel_portable = $this->input->post('cell_create', TRUE);
                $newUser->tel_domicile = $this->input->post('phone_create', TRUE);
                $newUser->adresse = $this->input->post('adresse_create', TRUE);
                $newUser->compl_adresse = $this->input->post('compl_adresse', TRUE);
                $newUser->code_postal = $this->input->post('postal_create', TRUE);
                $newUser->ville = $this->input->post('ville_create', TRUE);
                $newUser->date_creation = date_default_timezone_get();
                $newUser->type="normalUser";
                $newUser->save();

                $this->session->set_userdata("userLogged", $newUser);
                redirect('Utilisateur/showAccount');
            }
        }
    }

    public function signup()
    {

        $method = $this->input->method(TRUE);
        $this->load->library('layout');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if($method == "POST")
        {
            $email_signup = $this->input->post('email_signup', TRUE);
            $password_signup = $this->input->post('password_signup', TRUE);
            $password_confirm = $this->input->post('password_confirm', TRUE);
            $currentUrl = $this->input->post('currentUrl', TRUE);

            //$family = Model\Famille::find($family_id);
            $user = Model\Utilisateur::limit(1)->find_by_email($email_signup, FALSE);

            if($user != null)
            {
                $this->session->set_flashdata('message-error','L\'adresse mail entrée est déjà utilisée');
                redirect($currentUrl);
            }

            $this->form_validation->set_rules('email_signup', 'Email', 'required');
            $this->form_validation->set_rules('password_signup', 'Mot de passe', 'required|min_length[8]'); 

            if($this->form_validation->run() == false){
                $this->session->set_flashdata('message-error','Une erreur est survenue...');
                redirect($currentUrl);
            }else{

                //Add the menu and load needed data
                $this->layout->include_public_menu();
                $data_menu['familles'] = Model\Famille::all();

                $data['email_signup'] = $email_signup;
                $data['password_signup'] = $password_signup;
                $this->layout->add_js('create_user_form');

                $this->layout->views('layout/menu_public', $data_menu)
                            ->view('../views/users/view_create_user', $data);
            }
        }
        else
        {
            redirect('Home');
        }
    }

    public function login()
    {
        $this->load->library('session');
        $method = $this->input->method(TRUE);
        $this->load->library('form_validation');

        if($method == "POST")
        {

            $email = $this->input->post('email_login', TRUE);
            $password = $this->input->post('password_login', TRUE);
            
            $user = Model\Utilisateur::limit(1)->find_by_email($email, FALSE);

            $this->form_validation->set_rules('email_signup', 'Email', 'required|email');
            $this->form_validation->set_rules('password_signup', 'Mot de passe', 'required'); 


            if(strcmp($password, $user->password) == 0)
            {
                $this->session->set_userdata('userLogged', $user);
                $this->session->set_flashdata('message-success','Vous vous êtes bien connecté. Bonjour '.ucfirst($user->prenom).' '.ucfirst($user->nom)); 
                if(strcmp($user->type, 'admin') == 0)
                {
                    redirect('Admin');
                }
                else
                {
                    redirect($_POST['currentUrl']);
                }   
            }
            else
            {
                $this->session->set_flashdata('message-error','Une erreure est survenue, l\'email ou le mot de passe est incorrect.'); 
                redirect($_POST['currentUrl']);
            }
        }
    }

    public function disconnect()
    {
        if($this->session->has_userdata('userLogged'))
        {
            $this->session->unset_userdata('userLogged');
            $this->session->set_flashdata('message-success','Vous vous êtes bien déconnecté. A bientôt.');
            redirect(implode('/', func_get_args()));
        }
        else
        {
            redirect('/Home');
        }
        
    }

    public function showAccount()
    {
        if($this->session->has_userdata('userLogged'))
        {

            $this->load->library('layout');

            //Add the menu and load needed data
            $this->layout->include_public_menu();
            $data_menu['familles'] = Model\Famille::all();

            $data = $this->getUserDatas();


            $this->layout->views('layout/menu_public', $data_menu)
            ->view('../views/users/view_details_users', $data);
        }
        else
        {
            redirect('/Home');
        }
    }

    private function getUserDatas()
    {
        $data['user']= $this->session->userdata('userLogged');
        $user=$data['user'];

        if($user->nom != null)
        {
            $data['nom'] = ucfirst($user->nom);
        }
        else
        {
            $data['nom'] = "";
        }

        if($user->prenom != null)
        {
            $data['prenom'] = ucfirst($user->prenom);
        }
        else
        {
            $data['prenom'] = "";
        }

        if($user->email != null)
        {
            $data['email'] = $user->email;
        }
        else
        {
            $data['email'] = "";
        }

        if($user->tel_portable != null)
        {
            $data['tel_portable'] = $user->tel_portable;
        }
        else
        {
            $data['tel_portable'] = "";
        }

        if($user->tel_domicile != null)
        {
            $data['tel_domicile'] = $user->tel_domicile;
        }
        else
        {
            $data['tel_domicile'] = "";
        }

        if($user->adresse != null)
        {
            $data['adresse'] = $user->adresse;
        }
        else
        {
            $data['adresse'] = "";
        }

        if($user->compl_adresse != null)
        {
            $data['compl_adresse'] = $user->compl_adresse;
        }
        else
        {
            $data['compl_adresse'] = "";
        }

        if($user->code_postal != null)
        {
            $data['code_postal'] = $user->code_postal;
        }
        else
        {
            $data['code_postal'] = "";
        }

        if($user->ville != null)
        {
            $data['ville'] = $user->ville;
        }
        else
        {
            $data['ville'] = "";
        }

        return $data;

    }


}