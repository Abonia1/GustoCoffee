<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->enable_profiler(FALSE);
    }

    public function index()
	{
		$this->load->view('site/template/header');
		$this->load->view('site/panier/panier', array());
		$this->load->view('site/template/footer');
	}


	public function paiement()
	{
		if( !$this->authentification->est_connecte('client') )
		{
			redirect('connexion');
			exit;
		}

		// form_validation run
		else
		{
			// on récupère les informations de la commande
			$data = array(
				'date' => $this->input->post('Date'),
				'time' => $this->input->post('Time'),
				'quantity' => $this->input->post('quantity'),
				'tablenumber' => $this->input->post('tablenumber'),

			);
			 //$reservation = $this->reservation_model->ajouter($data); // ajout de la commande on recup l'id

			//$this->commande_model->ajouter_produit_commande($articles); // On ajoute les produits
			// Show submitted data on view page again.


		$this->load->view('site/template/header');
		$this->load->view('site/panier/paiement', $data);
		$this->load->view('site/template/footer');
		}
	}

	public function reservationsuccess()
	{
		if( !$this->authentification->est_connecte('client') )
		{
			redirect('connexion');
			exit;
		}

		// form_validation run
		if($this->input->post('paiement') != NULL)
		{
			$this->load->model('reservation_model');

			$paiement = array(
				'type_paiement' => $this->input->post('paiement')
			);

			$this->session->userdata['reservation']['paiement'] = $paiement; //je place mes infos livraison en session

			// on récupère les informations de la commande
			// $data = array(
			// 	'c_id' => $this->session->userdata['client']->id,
			// 	'reservation_id' => "",
			// 	'date' => date('Y-m-d H:i:s'),
			// 	'date_modification' => date('Y-m-d H:i:s'),
			// 	'statut' => 2,
			// 	'valide' => 1,
			// 	'bon_livraison' => ''
			// );

			// $reservation = $this->reservation_model->ajouter($data); // ajout de la commande on recup l'id

			// $articles = array();
			// foreach ($this->session->userdata['commande']['articles'] as $key => $val) {
// form_validation run
	// on récupère les informations de la commande
	 // On ajoute les produits

		}
		else{
		$nom = $this->session->userdata['client']->nom;
		$data = array(
			'c_id' => $this->session->userdata['client']->id,
			'date' => $this->input->post('Date'),
			'time' => $this->input->post('Time'),
			'quantity' => $this->input->post('quantity'),
			'tbnumber' => $this->input->post('tablenumber'),
			'payment' => $this->input->post('total')
	
		);
		$this->load->model('reservation_model');
		$reservation = $this->reservation_model->ajouter($data); 

		$this->load->view('site/template/header');
		$this->load->view('site/panier/reservationsuccess',$data);
		$this->load->view('site/template/footer');
	}
	}
}


    /*public function informations()
	{
		if( !$this->authentification->est_connecte('client') )
		{
			redirect('connexion'); //on envoi sur connexion ou inscription puis retour sur livraison
			exit;
		}

		//on vérifie qu'un panier existe si oui on créé une commande sinon on renvoi sur panier avec une erreur
		if( $this->session->has_userdata('panier') )
		{
			$this->session->unset_userdata('commande'); //Je remet toujours ma commande à vide

			$articles = array('articles' => $this->session->userdata('panier')); //je prends le panier pour le mettre dans commande => articles
			$this->session->set_userdata('commande', $articles);
		}


		$this->load->model('client_model');
		$client = $this->client_model->recuperer_client($this->session->userdata['client']->id);
		$pays = $this->client_model->liste_pays();

		$this->load->view('site/template/header');
		$this->load->view('site/panier/informations', array('client' => $client, 'pays' => $pays));
		$this->load->view('site/template/footer');
	}*/

    // public function livraison()
	// {
	// 	if( !$this->authentification->est_connecte('client') )
	// 	{
	// 		redirect('connexion');
	// 		exit;
	// 	}

	// 	if( $this->session->has_userdata('panier') )
	// 	{
	// 		$this->session->unset_userdata('commande'); //Je remet toujours ma commande à vide

	// 		$articles = array('articles' => $this->session->userdata('panier'), 'livraison' => array(), 'paiement' => array()); //je prends le panier pour le mettre dans commande => articles
	// 		$this->session->set_userdata('commande', $articles);
	// 	}

	// 	if($this->input->post('adresse') != NULL)
	// 	{

	// 		//Verifier les donnees form validation
	// 		// Passer les données en session puis redirect paiement
	// 		$livraison = array(
	// 			'adresse' => $this->input->post('adresse'),
	// 			'adresse_complement' => $this->input->post('adresse_complement'),
	// 			'code_postal' => $this->input->post('code_postal'),
	// 			'ville' => $this->input->post('ville'),
	// 			'pays' => $this->input->post('pays'),
	// 			'adresse_facturation' => $this->input->post('adresse_facturation'),
	// 			'adresse_complement_facturation' => $this->input->post('adresse_complement_facturation'),
	// 			'code_postal_facturation' => $this->input->post('code_postal_facturation'),
	// 			'ville_facturation' => $this->input->post('ville_facturation'),
	// 			'pays_facturation' => $this->input->post('pays_facturation'),
	// 			'type_livraison' => $this->input->post('livraison')
	// 		);

	// 		$this->session->userdata['commande']['livraison'] = $livraison; //je place mes infos livraison en session

	// 		redirect('panier/paiement');
	// 		exit;
	// 	}

	// 	$this->load->model('client_model');
	// 	$pays = $this->client_model->liste_pays();
	// 	$adresses = $this->client_model->recuperer_adresses($this->session->userdata['client']->id);

	// 	$this->load->view('site/template/header');
	// 	$this->load->view('site/panier/livraison', array('adresses' => $adresses, 'pays' => $pays));
	// 	$this->load->view('site/template/footer');
	// }



    // public function paiement()
	// {
	// 	if( !$this->authentification->est_connecte('client') )
	// 	{
	// 		redirect('connexion');
	// 		exit;
	// 	}

	// 	// form_validation run
	// 	if($this->input->post('paiement') != NULL)
	// 	{
	// 		$this->load->model('reservation_model');

	// 		$paiement = array(
	// 			'type_paiement' => $this->input->post('paiement')
	// 		);

	// 		$this->session->userdata['reservation']['paiement'] = $paiement; //je place mes infos livraison en session

	// 		// on récupère les informations de la commande
	// 		// $data = array(
	// 		// 	'c_id' => $this->session->userdata['client']->id,
	// 		// 	'reservation_id' => "",
	// 		// 	'date' => date('Y-m-d H:i:s'),
	// 		// 	'date_modification' => date('Y-m-d H:i:s'),
	// 		// 	'statut' => 2,
	// 		// 	'valide' => 1,
	// 		// 	'bon_livraison' => ''
	// 		// );

	// 		// $reservation = $this->reservation_model->ajouter($data); // ajout de la commande on recup l'id

	// 		// $articles = array();
	// 		// foreach ($this->session->userdata['commande']['articles'] as $key => $val) {
	// 			$data = array(
	// 				'c_id' => $this->session->userdata['client']->id,
	// 				'reservation_id' => $val['reservation_id'],
	// 				'date' => $val['date'],
	// 				'time' => $val['time'],
	// 				'quantite' => $val['quantite'],
	// 				'status' => $val['status'],
	// 				'tbnumber' => $val['tbnumber'],
	// 			);
			

	// 		$this->commande_model->ajouter_produit_commande($articles); // On ajoute les produits

	// 		$this->session->unset_userdata(array('panier', 'commande'));
	// 		redirect('profil/commandes');
	// 		exit;
	// 	}

	// 	$this->load->view('site/template/header');
	// 	$this->load->view('site/panier/paiement', array($data																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																			));
	// 	$this->load->view('site/template/footer');
	// }
