<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->library('layout');

        //Add the menu and load needed data
		$this->layout->include_public_menu();
		$data_menu['familles'] = Model\Famille::all();

		$data['products'] = Model\Produit::find_by_produit_phare(1);

		$this->layout->views('layout/menu_public', $data_menu)
		->view('home/homepage', $data);
	}

	public function magasins()
	{
		$this->load->library('layout');

		$this->layout->include_public_menu();

		$data_menu['familles'] = Model\Famille::all();

		$this->layout->views('layout/menu_public', $data_menu)
		->view('home/magasins');
	}

	public function contact(){
		$this->load->library('layout');
		$this->layout->include_public_menu();
		$data_menu['familles'] = Model\Famille::all();

		$method = $this->input->method(TRUE);
		if($method == "GET")
		{
			$this->layout->add_js('contact');
			$this->layout->views('layout/menu_public', $data_menu)
			->view('home/contact');
		}
		else if($method == "POST")
		{
			$this->form_validation->set_rules('full_name', 'Nom', 'required|max_length[50]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[70]');
			$this->form_validation->set_rules('objet', 'Objet du message', 'required|max_length[50]');
			$this->form_validation->set_rules('message', 'Contenu du message', 'required');

			if($this->form_validation->run()){
				$name = $this->input->post('full_name');
				$email = $this->input->post('email');
				$objet = $this->input->post('objet');
				$message = $this->input->post('message');

				$to = 'willemotlucas@gmail.com';
				$email_subject = "Nouvel email auvergerdepapa.com de la part de $name";
				$email_body = "Vous avez reçu un nouvel e-mail envoyé depuis le formulaire de contact de votre site auvergerdepapa.com.\n\n" . 
				"Voici les détails :\n\Nom : $name\n\nEmail: $email\n\Objet du message: $objet\n\nMessage:\n$message";
				$headers = "From: contact@auvergerdepapa.com\n";
				$headers .= "Reply-To: $email";
				mail($to,$email_subject,$email_body,$headers);

				$this->session->set_flashdata('message-success', 'Votre message a bien été envoyé.');
			}else{
				$this->session->set_flashdata('message-error', "Une erreur est survenue lors de l'envoi du message. Veuillez remplir tous les champs.");
			}
			redirect('/home/contact', 'refresh');
		}


	}

	public function search()
	{
		//Construct navigation bar
		$this->load->library('layout');
		$this->layout->include_public_menu();
		$data_menu['familles'] = Model\Famille::all();

		//Retrieve post params
		$data['products'] = array();
		$search_text = $this->input->post('search_text', TRUE);
		$search_text = $this->security->xss_clean($search_text);

		if(!empty($search_text) && !is_null($search_text)){
			$sql = "SELECT * FROM Produit WHERE denomination LIKE '%" . $this->db->escape_like_str($search_text) . "%'";
			$query = $this->db->query($sql);

			foreach ($query->result() as $product) {
				array_push($data['products'], $product);
			}
			$data['count'] = $query->num_rows();
		}
		
		$this->layout->views('layout/menu_public', $data_menu)
		->view('home/search_result', $data);
	}
}
