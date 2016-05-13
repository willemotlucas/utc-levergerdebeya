<?php if (!defined('BASEPATH')) die ('No direct script access allowed!');

class Utilisateur extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
    }

    public function index()
    {
        $this->showAccount();
    }

    public function signup()
    {

        $method = $this->input->method(TRUE);
        $this->load->library('layout');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if($this->session->has_userdata('userLogged'))
        {
            $this->session->set_flashdata("message-error", "Vous êtes déjà connecté au site...");
            redirect('Utilisateur/showAccount');
        }
        else
        {
            $this->form_validation->set_rules('nom_create', 'Nom', 'required');
            $this->form_validation->set_rules('prenom_create', 'Prenom', 'required');
            $this->form_validation->set_rules('mail_create', 'Email', 'required|is_unique[utilisateur.email]|valid_email', array('is_unique' => "L'adresse email entrée est déjà utilisée. Veuillez en choisir une autre."));
            $this->form_validation->set_rules('password_create', 'Mot de passe', 'required|min_length[8]');
            $this->form_validation->set_rules('password_confirm', 'Confirmation de mot de passe', 'required|matches[password_create]');

            $this->form_validation->set_error_delimiters('<div class="ui error message">', '</div>');

            if ($this->form_validation->run() == FALSE)
            {
                    $this->layout->include_public_menu();
                    $data_menu['familles'] = Model\Famille::all();

                    $this->layout->add_js('create_user_form');

                    $this->layout->views('layout/menu_public', $data_menu)
                                ->view('../views/users/view_create_user');
            }
            else
            {
                    $newUser = new Model\Utilisateur();

                    $newUser->nom = $this->input->post('nom_create', TRUE);
                    $newUser->prenom = $this->input->post('prenom_create', TRUE);
                    $newUser->email = $this->input->post('mail_create', TRUE);
                    $newUser->password = $this->input->post('password_create', TRUE);
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

                    $this->session->set_userdata("userLogged", Model\Utilisateur::last_created());
                    redirect('Utilisateur/showAccount');
            }
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
                    if(strcmp($_POST['currentUrl'], 'Utilisateur/signup')==0)
                    {
                        redirect('Utilisateur/showAccount');
                    }
                    else
                    {
                        redirect($_POST['currentUrl']);
                    }
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
            if(strcmp(implode('/', func_get_args()), 'Utilisateur/showAccount') == 0)
            {
                redirect('Home');
            }
            redirect(implode('/', func_get_args()));
        }
        redirect('/Home');
        
    }

    public function showAccount()
    {
        if($this->session->has_userdata('userLogged'))
        {   
            $userLogged = $this->session->userdata('userLogged');
            $method = $this->input->method(TRUE);
            $this->load->library('layout');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nom_edit', 'Nom', 'required');
            $this->form_validation->set_rules('prenom_edit', 'Prenom', 'required');
            $this->form_validation->set_rules('mail_edit', 'Email', 'required|valid_email');

            $this->form_validation->set_error_delimiters('<div class="ui error message">', '</div>');

            
            if ($this->form_validation->run() == FALSE)
            {
                
                    //Add the menu and load needed data
                    $this->layout->include_public_menu();
                    $data_menu['familles'] = Model\Famille::all();
                    $this->layout->add_js('create_user_form');

                    $data = $this->getUserDatas();

                    $this->layout->views('layout/menu_public', $data_menu)
                    ->view('../views/users/view_details_users', $data);
            }
            else
            {
                $email = $this->input->post('mail_edit', TRUE);
                $otherUser = \Model\Utilisateur::limit(1)->find_by_email($email, FALSE);
                if($otherUser != null && $otherUser->id != $userLogged->id)
                {
                    $this->session->set_flashdata('message-error', 'L\'adresse email entrée est déjà utilisée....');
                    
                }
                else
                {
                    $userLogged->nom = $this->input->post('nom_edit', TRUE);
                    $userLogged->prenom = $this->input->post('prenom_edit', TRUE);
                    $userLogged->email = $this->input->post('mail_edit', TRUE);
                    $userLogged->date_naissance = $this->input->post('birth_edit', TRUE);
                    $userLogged->tel_portable = $this->input->post('cell_edit', TRUE);
                    $userLogged->tel_domicile = $this->input->post('phone_edit', TRUE);
                    $userLogged->adresse = $this->input->post('adresse_edit', TRUE);
                    $userLogged->compl_adresse = $this->input->post('compl_adresse', TRUE);
                    $userLogged->code_postal = $this->input->post('postal_edit', TRUE);
                    $userLogged->ville = $this->input->post('ville_edit', TRUE);
                    $userLogged->save();

                    $this->session->set_flashdata('message-success', 'Les modifications ont été prises en compte.');
                }

                //Add the menu and load needed data
                $this->layout->include_public_menu();
                $data_menu['familles'] = Model\Famille::all();
                $this->layout->add_js('create_user_form');

                $data = $this->getUserDatas();

                $this->layout->views('layout/menu_public', $data_menu)
                ->view('../views/users/view_details_users', $data);
                    
            }
        }
        else
        {
            redirect('/Home');
        }
    }

    public function admin_gestion()
    {
        $this->session->testAdminLogged();
        $data['users'] = \Model\Utilisateur::all();

        $this->load->library('layout');

        //Add the menu and load needed data
        $this->layout->include_admin_menu();
        $this->layout->add_js('jquery.dataTables');
        $this->layout->add_js('semantic.dataTables');
        $this->layout->add_js('admin');

        $this->layout->views('layout/menu_admin')
        ->view('../views/users/view_all_users', $data);
    }

    public function admin_showUser($id)
    {
        $this->session->testAdminLogged();
        $data['userShown'] = \Model\Utilisateur::find($id);
        if(is_null($data['userShown']))
        {
            show_404();
            return;
        }

        $method = $this->input->method(TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('layout');
        //Add the menu and load needed data
        $this->layout->include_admin_menu();
        $this->layout->add_js('admin_edit_user_form');

        $this->form_validation->set_rules('nom_edit_admin', 'Nom', 'required');
        $this->form_validation->set_rules('prenom_edit_admin', 'Prenom', 'required');
        $this->form_validation->set_rules('mail_edit_admin', 'Email', 'required|valid_email');

        $this->form_validation->set_error_delimiters('<div class="ui error message">', '</div>');

        
        if ($this->form_validation->run() == FALSE)
        {
                $this->layout->views('layout/menu_admin')
                ->view('../views/users/admin_show_user', $data);
        }
        else
        {
            $email = $this->input->post('mail_edit_admin', TRUE);
            $otherUser = \Model\Utilisateur::limit(1)->find_by_email($email, FALSE);
            if($otherUser != null && $otherUser->id != $data['userShown']->id)
            {
                $this->session->set_flashdata('message-error', 'L\'adresse email entrée est déjà utilisée....');   
            }
            else
            {
                $data['userShown']->nom = $this->input->post('nom_edit_admin', TRUE);
                $data['userShown']->prenom = $this->input->post('prenom_edit_admin', TRUE);
                $data['userShown']->email = $this->input->post('mail_edit_admin', TRUE);
                $data['userShown']->date_naissance = $this->input->post('birth_edit_admin', TRUE);
                $data['userShown']->tel_portable = $this->input->post('cell_edit_admin', TRUE);
                $data['userShown']->tel_domicile = $this->input->post('phone_edit_admin', TRUE);
                $data['userShown']->adresse = $this->input->post('adresse_edit_admin', TRUE);
                $data['userShown']->compl_adresse = $this->input->post('compl_adresse_admin', TRUE);
                $data['userShown']->code_postal = $this->input->post('postal_edit_admin', TRUE);
                $data['userShown']->ville = $this->input->post('ville_edit_admin', TRUE);
                $data['userShown']->save();

                $this->session->set_flashdata('message-success', 'Les modifications ont été prises en compte.');
            }
            $this->layout->views('layout/menu_admin')
            ->view('../views/users/admin_show_user', $data);
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

        if($user->date_naissance != null)
        {
            $data['date_naissance'] = $user->date_naissance;
        }
        else
        {
            $data['date_naissance'] = "";
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