<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct() {
        parent::__construct();
				$params = array(
          'target' 					=> 'client',
        	'maConfig' 				=>'ma_config/client',
        	'validationRules'	=> 'form_validation/client',
        	'model'						=> 'client_model'
        );
        $this->load->library('customer', $params);
        $this->load->library('authentification');

        $this->load->model('client_model');
    }

  public function index()
	{
    if( !$this->authentification->est_connecte('client') )
    {
			redirect();
			exit;
		}

		//Si on ajoute c'est bon on peut rediriger vers liste
		if( $this->customer->modifier_client($this->session->userdata('client')->id) )
		{
				redirect('profil');
				exit;
		}

		//faire un update des informations

		$this->load->helper('form');
		$this->load->model('client_model');
		$pays = $this->client_model->liste_pays();
		$client = $this->client_model->recuperer_client($this->session->userdata('client')->id);

		$this->load->view('site/template/header');
		$this->load->view('site/profil/profil', array('pays' => $pays, 'client' => $client));
		$this->load->view('site/template/footer');

	}

  public function commandes()
	{
		if( !$this->authentification->est_connecte('client') )
	    {
			redirect();
			exit;
		}
		else {
			$this->load->model('reservation_model');
			$reservations = $this->reservation_model->reservation_liste($this->session->userdata('client')->id);

			$this->load->view('site/template/header');
			$this->load->view('site/profil/commandes', array('reservations' => $reservations));
			$this->load->view('site/template/footer');
		}
	}

}
