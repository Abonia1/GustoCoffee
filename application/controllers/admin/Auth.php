<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(FALSE);
        
        $this->load->library('authentification');
    }
    
    // -----------------------------------------------------------------------
    
    /**
     * Connexion de l'utilisateur
     *
     */
	public function connexion()
	{
	    if( !$this->authentification->est_connecte('administrateur') )
	    {
	        $this->load->helper('form');
	        
	        if( $this->authentification->connexion('administrateur') )
	        {
	            redirect('/admin/tableau-de-bord');
	            exit;
	        }
	        else
	        {
	            $content = $this->load->view('admin/authentification/connexion', array(), TRUE);
	            $this->load->view('admin/template/template-login', array('content' => $content));
	        }
	    }
	    else 
	    {
	        redirect('/admin/tableau-de-bord');
	        exit;
	    }
		
	}
	
	// -----------------------------------------------------------------------
	
	/**
	 * Mot de passe oubli�
	 *
	 */
	public function mot_passe_oublie()
	{
	    if( !$this->authentification->est_connecte('administrateur') )
	    {
	        $this->load->helper('form');
	       
	        $content = $this->load->view('admin/authentification/mot_passe_oublie', array(), TRUE);
	        $this->load->view('admin/template/template-login', array('content' => $content));
	    }
	    
	}
	
	// -----------------------------------------------------------------------
	
	/**
	 * Tableau de bord de l'utilisateur
	 *
	 */
	public function tableau_de_bord()
	{ 
	    if( !$this->authentification->est_connecte('administrateur') )
	    {
	        redirect('/admin/connexion');
	        exit;    
	    } 
	    
	    $this->load->model( array('client_model', 'commande_model') );
	    
	    $clients = $this->client_model->nombre_client();
	    $commandes = $this->commande_model->nombre_commande();
	    
	    $content = $this->load->view('admin/tableau_de_bord/tableau_de_bord', array('clients' => $clients, 'commandes' => $commandes), TRUE);
	    $this->load->view('admin/template/template', array('content' => $content));
	}
	
	// -----------------------------------------------------------------------
	
	/**
	 * D�connexion de l'utilisateur
	 *
	 */
	public function deconnexion()
	{
	    $this->authentification->deconnexion('administrateur');
	    redirect('/admin/tableau-de-bord');
	}
}
