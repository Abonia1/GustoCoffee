<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);

        $params = array(
            'target' 				=> 'client',
        	'maConfig' 				=>'ma_config/client',
        	'validationRules'	=> 'form_validation/client',
        	'model'					=> 'client_model'
        );
        $this->load->library('customer', $params);
        $this->load->library('authentification');

        $this->load->model('client_model');
    }

    // -----------------------------------------------------------------------

    /**
     * Connexion du client
     *
     */
	public function connexion()
	{
	    if( !$this->authentification->est_connecte('client') )
	    {
	        $this->load->helper('form');

	        if( $this->authentification->connexion('client') )
	        {
	            redirect('/profil');
	            exit;
	        }
	        else
	        {
                $this->load->view('site/template/header');
                $this->load->view('site/auth/connexion', array());
                $this->load->view('site/template/footer');
	        }
	    }
	    else {
	        redirect('');
	        exit;
	    }
	}

	// -----------------------------------------------------------------------

    /**
     * Inscription du client
     *
     */

	public function inscription()
	{
		//si l'utilisateur est connecté on le redirige vers la page d'accueil qui lui est propre (page dedier -> client; page secteur spécifique -> prospret;)
	    if( $this->authentification->est_connecte('client') )
      {
        redirect('');
        exit;
	  }
        $this->load->helper('form');
        $pays = $this->client_model->liste_pays();
        $email = $this->input->post('identifiant');

        $this->load->view('site/template/header');
        $this->load->view('site/auth/inscription', array('pays' => $pays, 'email' => $email));
        $this->load->view('site/template/footer');

	}
	public function inscriptionform()
	{
		//si l'utilisateur est connecté on le redirige vers la page d'accueil qui lui est propre (page dedier -> client; page secteur spécifique -> prospret;)
	    if( $this->authentification->est_connecte('client') )
      {
        redirect('/');
        exit;
	  }
	  if( $this->customer->ajouter() )
	  {
	  redirect('connexion','refresh');
	  exit;
	  }
        $this->load->helper('form');
        $pays = $this->client_model->liste_pays();
        $email = $this->input->post('identifiant');

        $this->load->view('site/template/header');
        $this->load->view('site/auth/inscription', array('pays' => $pays, 'email' => $email));
        $this->load->view('site/template/footer');
	

	}

	// -----------------------------------------------------------------------

	/**
	 * Mot de passe oublié
	 *
	 */
	public function mot_passe_oublie()
	{
	    if( !$this->authentification->est_connecte('client') )
	    {
            //si c'est ok on génère un nouveau pass et on envoi par e-mail
	        $this->load->helper('form');

            $this->load->view('site/template/header');
            $this->load->view('site/auth/mot-passe-oublie');
            $this->load->view('site/template/footer');
	    }
        else {
            redirect();
            exit;
        }

	}



	// -----------------------------------------------------------------------

	/**
	 * Déconnexion du client
	 *
	 */
	public function deconnexion()
	{
	    if( $this->authentification->deconnexion('client') )
	    {
	        redirect('/connexion');
	    }
	}
}
