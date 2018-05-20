<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->enable_profiler(TRUE);
    }

    public function index()
	{
		$this->load->view('site/template/header');
		$this->load->view('site/panier/panier', array());
		$this->load->view('site/template/footer');
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

    public function livraison()
	{
		if( !$this->authentification->est_connecte('client') )
		{
			redirect('connexion');
			exit;
		}

		if( $this->session->has_userdata('panier') )
		{
			$this->session->unset_userdata('commande'); //Je remet toujours ma commande à vide

			$articles = array('articles' => $this->session->userdata('panier'), 'livraison' => array(), 'paiement' => array()); //je prends le panier pour le mettre dans commande => articles
			$this->session->set_userdata('commande', $articles);
		}

		if($this->input->post('adresse') != NULL)
		{

			//Verifier les donnees form validation
			// Passer les données en session puis redirect paiement
			$livraison = array(
				'adresse' => $this->input->post('adresse'),
				'adresse_complement' => $this->input->post('adresse_complement'),
				'code_postal' => $this->input->post('code_postal'),
				'ville' => $this->input->post('ville'),
				'pays' => $this->input->post('pays'),
				'adresse_facturation' => $this->input->post('adresse_facturation'),
				'adresse_complement_facturation' => $this->input->post('adresse_complement_facturation'),
				'code_postal_facturation' => $this->input->post('code_postal_facturation'),
				'ville_facturation' => $this->input->post('ville_facturation'),
				'pays_facturation' => $this->input->post('pays_facturation'),
				'type_livraison' => $this->input->post('livraison')
			);

			$this->session->userdata['commande']['livraison'] = $livraison; //je place mes infos livraison en session

			redirect('panier/paiement');
			exit;
		}

		$this->load->model('client_model');
		$pays = $this->client_model->liste_pays();
		$adresses = $this->client_model->recuperer_adresses($this->session->userdata['client']->id);

		$this->load->view('site/template/header');
		$this->load->view('site/panier/livraison', array('adresses' => $adresses, 'pays' => $pays));
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
		if($this->input->post('paiement') != NULL)
		{
			$this->load->model('commande_model');

			$paiement = array(
				'type_paiement' => $this->input->post('paiement')
			);

			$this->session->userdata['commande']['paiement'] = $paiement; //je place mes infos livraison en session

			// on récupère les informations de la commande
			$data = array(
				'client' => $this->session->userdata['client']->id,
				'reference' => "",
				'prix_ht_final' => 20,
				'prix_ht_remise' => 20,
				'prix_ttc_final' => 20,
				'date_creation' => date('Y-m-d H:i:s'),
				'date_modification' => date('Y-m-d H:i:s'),
				'statut' => 2,
				'valide' => 1,
				'bon_livraison' => 'facture.pdf'
			);

			$commande = $this->commande_model->ajouter($data); // ajout de la commande on recup l'id

			$articles = array();
			foreach ($this->session->userdata['commande']['articles'] as $key => $val) {
				$articles[] = array(
					'commande' => $commande,
					'produit' => $val['id'],
					'prix_ht' => $val['prix'],
					'remise' => 0,
					'quantite' => $val['quantite'],
					'total_ht' => $val['total']
				);
			}

			$this->commande_model->ajouter_produit_commande($articles); // On ajoute les produits

			$this->session->unset_userdata(array('panier', 'commande'));
			redirect('profil/commandes');
			exit;
		}

		$this->load->view('site/template/header');
		$this->load->view('site/panier/paiement', array());
		$this->load->view('site/template/footer');
	}
}
