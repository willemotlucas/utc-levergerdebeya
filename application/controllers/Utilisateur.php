<?php if (!defined('BASEPATH')) die ('No direct script access allowed!');

class Utilisateur extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
    }

    public function signup()
    {

    }

    public function login()
    {
        $this->load->library('session');
        $method = $this->input->method(TRUE);

        if($method == "POST")
        {
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);


            $user = Model\Utilisateur::limit(1)->find_by_email($email, FALSE);

            if(strcmp($password, $user->password) == 0)
            {
                $this->session->set_userdata('userLogged', $user);
                $this->session->set_flashdata('message-success','Vous vous êtes bien connecté. Bonjour '.ucfirst($user->prenom).' '.ucfirst($user->nom)); 
                redirect($_POST['currentUrl']);
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