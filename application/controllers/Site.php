<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->enable_profiler(FALSE);
    }

	/* Accueil */
	public function index()
	{
		 $this->load->model('accueil_model');
        $this->load->model('image_model');
		//$data['text'] = $this->accueil_model->text();
        $data_['imageproduits']=$this->image_model->imageproduits();

		$this->load->model('produit_model');
		$produits = $this->produit_model->produits_accueil();

		$this->load->view('site/template/header');
		$this->load->view('site/pages/accueil', array('produits' => $produits));
		$this->load->view('site/template/footer');
	}

	/* Liste des produits */
	function produits()
	{
		$this->load->model('produit_model');
		$produits = $this->produit_model->produits_liste();

		$this->load->view('site/template/header');
		$this->load->view('site/pages/produits', array('produits' => $produits));
		$this->load->view('site/template/footer');
	}

	/* Détail produit */
	function produit($produit)
	{
		$this->load->model('produit_model');
		$produit = $this->produit_model->produit_detail($produit);
		$caracteristiques = $this->produit_model->caracteristique_produit($produit->id);
		$utilisations = $this->produit_model->utilisation_produit($produit->id);
		$priorites = $this->produit_model->priorite_produit($produit->id);

		//var_dump($produit);exit;


			//$this->load->view('site/template/header_fixe', array('slide' => $produits[$produit]['slide']));
			$this->load->view('site/template/header', array());
			$this->load->view('site/pages/produit', array('produit' => $produit, 'caracteristiques' => $caracteristiques, 'utilisations' => $utilisations, 'priorites' => $priorites));
			$this->load->view('site/template/footer');


	}

	/* Contact */
	public function contact()
	{

		$this->load->library('form_validation');

		$this->config->load( 'form_validation/email' , TRUE );
		$this->rules = config_item('form_validation/email');

		$this->form_validation->set_rules($this->rules['contact']);
		if( $this->form_validation->run() !== FALSE )
    	{
			$this->load->library('email');		

$config = Array(
    'protocol' => 'mail',
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'gustocofffee@gmail.com',
    'smtp_pass' => 'password*000',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);
			
				$this->email->initialize($config);
				//$this->email->from( $this->input->post('email'), $this->input->post('prenom').' '.$this->input->post('nom') );
				$from = $this->config->item('smtp_user');
				$this->email->from($from);
				$this->email->to('aboniaa@gmail.com');
				$this->email->subject('Demande informations');

				// On inscrit les informations obligatoires
				$message = "Nom : ".$this->input->post('prenom').' '.$this->input->post('nom');
				$message .= "<br>Adresse e-mail : ".$this->input->post('email');

				// Si un téléphone est entré on l'inscrit
				if( $this->input->post('telephone') != "" )
				{
					$message .= "<br>Téléphone : ".$this->input->post('telephone');
				}

				// On termine par noter le message
				$message .= "<br>Message : ".$this->input->post('message');

				$this->email->message($message);

				// Si l'eail est envoyé, OK on confirme sinon message d'erreur
				if( $this->email->send() )
				{
					$data['text']=$this->input->post('message');
					//$this->session->set_flashdata('success', 'Votre message a bien été envoyé. Notre équipe s\'occupe de votre message dans les plus brefs délais.');
					$this->load->view('site/template/header');
					$this->load->view('site/pages/contactresult',$data);
					$this->load->view('site/template/footer');
				}
				else
				{
					echo $this->email->print_debugger();
					//$this->session->set_flashdata('error', 'Une erreur est survenue, votre message n\'a pas pu être envoyé. Veuillez réessayer ultérieurement.');

				}
			}
			else{

				
			//$this->load->view('site/template/header_fixe', array('slide' => $produits[$produit]['slide']));
			$this->load->view('site/template/header');
			$this->load->view('site/pages/contact');
			$this->load->view('site/template/footer');
			}

			} 
		


	/* Mentions légales */
	public function mentions_legales()
	{
		$data = array(
			'generale' => array(
				'site_url' => 'http://www.Gustocoffee.fr',
				'short_url' => 'Gustocoffee.fr'
			),
			'informations_legales' => array(
				'societe' => 'Gusto Coffee',
				'adresse' => '1 Rue de Paris',
				'code_postal' => '75000',
				'ville' => 'Paris',
				'telephone' => '01 34 56 78 09',
				'adresse_email' => 'contact@gustocoffee.fr',
				'directeur_publication' => 'M. Jackson'
			),
			'proprietaire' => array(
				'societe' => 'Gustocoffee',
				'responsable' => 'M. Jackson',
				'adresse' => '1 Rue de Paris',
				'code_postal' => '75220',
				'ville' => 'PARIS',
				'pays' => 'FRANCE',
				'telephone' => '01 34 56 78 09',
				'rcs' => 'RCS Paris 790 971 000'
			)
		);

		$this->load->view('site/template/header');
		$this->load->view('site/pages/mentions-legales', array('data' => $data));
		$this->load->view('site/template/footer');
	}

	public function reservation(){
		$this->load->view('site/template/header');
		$this->load->view('site/pages/reservation');
		$this->load->view('site/template/footer');	

		 
	}

	public function compare(){
		if ($this->input->method(TRUE) == 'POST') {
			$quantity = (int) $this->input->post('quantity');
			$date = (string) $this->input->post('dateheader');
			$time = (string) $this->input->post('timeheader');

			$this->load->model('reservation_model');
			//$reservation = $this->reservation_model->comparetest($id);
			$reservation = $this->reservation_model->compare($quantity,$date,$time);
			echo ($reservation);
		// 	if (!empty($id)) {
		// 		echo json_encode(array(
		// 			"is_error" => false,
		// 			"message" => $id
		// 		));
		// 		return;
		// 	} else {
		// 		echo json_encode(array(
		// 			"is_error" => true,
		// 			"message" => $id
		// 		));
		// 		return;
		// 	}
		// } else {
		// 	echo json_encode(array(
		// 		"is_error" => true,
		// 		"message" => "Invalid request"
		// 	));
		// 	return;
		// }
		// // $dateheader=$_GET['dateheader'];
		// // $timeheader = $_GET['timeheader'];
		// // $quantity = $_GET['quantity'];
		// //$this->load->model('reservation_model');
		// $dateheader=$this->input->post('dateheader');
		// //$timeheader = $this->input->post('timeheader');
		// //$quantity = $this->input->post('quantity');
		// //$reservation = $this->reservation_model->compare($dateheader,$timeheader,$quantity);
		//return $reservation;
		//$tablenumber=$reservation -> tbnumber;
		//return $tablenumber;
		}
	}
		// if($reservation){
		// 	$notification = "Success";
		// 	}
		//    else{
		//    $notification = "Failed";
		//    }
		  
		// 	echo json_encode(array('notify'=>$notification,'reservation'=>$reservation));
		
		// //$reservation = $this->reservation_model->compare($data);
		// // $query = $this->db->query(
        // //     "SELECT tbnumber FROM reservation WHERE date = '{$dateheader}' AND time = '{$timeheader}' AND  quantity= '{$quantity}'");
        // // return $query;



	// /* Refresh captcha Ajax */
	// public function refresh() {
    //     $config = array(
    //     	'img_path'      => 'assets/images/captcha/',
    //     	'img_url'       => base_url().'assets/images/captcha/',
    //     );

    //     $captcha = create_captcha($config);

	// 	// On efface l'ancien code et on remet le nouveau en session
	// 	$this->session->unset_userdata('code_captcha');
	// 	$this->session->set_userdata('code_captcha', $captcha['word']);

    //     // Affiche l'image du captcha
    //     echo $captcha['image'];
    // }

	/* Fonction ajout produit panier Ajax */
	public function ajouter_panier()
	{
		$id = $this->input->post('id');
		$this->load->model('produit_model');

		$produit = $this->produit_model->produit($id);
		$panier = array('id' => $produit->id, 'nom' => $produit->nom, 'prix' => $produit->prix_ht, 'quantite' => '1', 'total' => $produit->prix_ht, 'slug' => $produit->slug);

		$panier_total = $this->session->userdata('panier');
		$panier_total[$produit->id] = $panier;

		$this->session->set_userdata('panier', $panier_total);
		return true;
	}

	/* supprimer produit panier Ajax */
	public function supprimer_panier()
	{
		$id = $this->input->post('id');
		unset($_SESSION['panier'][$id]); //supprime le produit du panier

		return true;
	}

	/* MAJ quantité produit panier Ajax */
	public function update_panier()
	{
		$id = $this->input->post('id');
		$qte = $this->input->post('qte');

		$panier_total = $this->session->userdata('panier');
		$panier_total[$id]['quantite'] = $qte;
		$panier_total[$id]['total'] = $qte * $panier_total[$id]['prix']; //calcul du total

		$this->session->set_userdata('panier', $panier_total);
		echo $qte * $panier_total[$id]['prix']."€"; //on renvoie le total pour maj le prix affiché
	}

	
	public function get_adresse()
	{
		$this->load->model('client_model');
		$this->load->helper('form');
		$pays = $this->client_model->liste_pays();

		$data = '<div id="adresse_autre_container">';
		$data .= '<div class="">'.form_label('Adresse *', 'adresse', array('class' => 'col-xs-12 col-sm-4')).'<div class="col-xs-12 col-sm-8">'.form_input(array('name' => 'adresse_facturation', 'placeholder' => 'Numéro de voie et nom de la rue', 'id' => 'adresse', 'class' => (empty(form_error('adresse')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('adresse'))).'</div></div>';
		$data .= '<div class="">'.form_label('Complément d\'adresse', 'adresse_complement', array('class' => 'col-xs-12 col-sm-4')).'<div class="col-xs-12 col-sm-8">'.form_input(array('name' => 'adresse_complement_facturation', 'placeholder' => 'Appartemment, bureau, etc', 'id' => 'adresse_complement', 'class' => (empty(form_error('adresse_complement')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('adresse_complement'))).'</div></div>';
		$data .= '<div class="">'.form_label('Code Postal *', 'code_postal', array('class' => 'col-xs-12 col-sm-4')).'<div class="col-xs-12 col-sm-8">'.form_input(array('name' => 'code_postal_facturation', 'id' => 'code_postal', 'class' => (empty(form_error('code_postal')) ? "" : "has-error") . " col-xs-12 col-sm-4", 'value' => set_value('code_postal'))).'</div></div>';
		$data .= '<div class="">'.form_label('Ville *', 'ville', array('class' => 'col-xs-12 col-sm-4')).'<div class="col-xs-12 col-sm-8">'.form_input(array('name' => 'ville_facturation', 'id' => 'ville', 'class' => (empty(form_error('ville')) ? "" : "has-error") . " col-xs-12 col-sm-8", 'value' => set_value('ville'))).'</div></div>';
		$data .= '<div class="">'.form_label('Pays *', 'pays', array('class' => 'col-xs-12 col-sm-4')).'<div class="col-xs-12 col-sm-8">'.form_dropdown('pays_facturation', $pays, $pays['France'], array('id' =>'pays', 'class' =>'form-control col-xs-12 col-sm-8')).'</div></div>';
		$data .= '</div>';

		echo $data;
	}


	public function afficher_panier()
	{
		$this->load->model('produit_model');
		if( $this->session->has_userdata('panier') || !empty($this->session->userdata('panier')))
		{
			$panier=[];

			foreach ($this->session->userdata('panier') as $article)
			{
				//var_dump($article['slug']);
				$produit = $this->produit_model->produit_detail($article['slug']);
				$panier[$produit->slug]['nom']=$produit->nom;
				$panier[$produit->slug]['image']=$produit->bidon;
				$panier[$produit->slug]['description']=$produit->description_courte;
				$panier[$produit->slug]['quantite']=$article['quantite'];
			}
			echo json_encode($panier);
		}
		else
		{
			return FALSE;
		}
	}
    public function services()
    {
        $this->load->model('services');
		$services_type = $this->services->services_type_liste();
        
		$this->load->view('site/template/header');
		$this->load->view('site/pages/services', array('services_type' => $services_type));
		$this->load->view('site/template/footer');	
	}
    public function service($id)
    {
        $this->load->model('services');
		$service = $this->services->service_liste($id);
        $type = $id;
        
		$this->load->view('site/template/header');
		$this->load->view('site/pages/service', array('service' => $service, 'type' => $type));
		$this->load->view('site/template/footer');	
	}
}
