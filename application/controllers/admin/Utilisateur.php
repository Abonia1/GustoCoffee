<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user');
        $this->load->model('utilisateur_model');
        
        $this->config->load( 'ma_config/utilisateur' , TRUE );
        $this->utilisateur = config_item('ma_config/utilisateur');
        $this->output->enable_profiler(FALSE);
    }
    
    // -----------------------------------------------------------------------
    
	public function ajouter()
	{
        if( !$this->authentification->est_connecte('administrateur') )
	    {
	        redirect('/admin/connexion');
	        exit;
	    }
	    
	    if( $this->user->ajouter() )
	    {
	        redirect('/admin/utilisateur/liste');
	        exit;
	    }
	   
	    $this->load->helper('form');
	  
        $roles = $this->utilisateur['utilisateur']['role'];
	   
        $content = $this->load->view('admin/utilisateur/ajouter', array('roles' => $roles), TRUE);
	    $this->load->view('admin/template/template', array('content' => $content));
	}

	// -----------------------------------------------------------------------	

	public function liste()
	{ 
	    if( !$this->authentification->est_connecte('administrateur') )
	    {
	        redirect('/admin/connexion');
	        exit;
	    }
	    
	    $utilisateurs = $this->utilisateur_model->afficher_utilisateur();
	    
	    foreach ($utilisateurs AS &$utilisateur) {
	        switch ($utilisateur->role) {
	    		case '9':
	    		    $utilisateur->role= 'administrateur';
	    			break;
	    		
	    		case '8':
	    		    $utilisateur->role= 'comptabilite';
	    			break;
	    	}
	    }

	    $content = $this->load->view('admin/utilisateur/liste', array('utilisateur' => $utilisateurs), TRUE);
	    $this->load->view('admin/template/template', array('content' => $content));
	}

	// -----------------------------------------------------------------------
	
	public function modifier($id)
	{
	    if( !$this->authentification->est_connecte('administrateur') )
	    {
	        redirect('/admin/connexion');
	        exit;
	    }
	    
	    // Si on ajoute c'est bon on peut rediriger vers liste
	    if( $this->user->modifier_utilisateur($id) )
	    {
	        redirect('/admin/utilisateur/liste');
	        exit;
	    }
	    
	    
	    //Sinon on affiche le formulaire de modification
	    $this->load->helper('form');
	    $utilisateur = $this->utilisateur_model->afficher_utilisateur($id);
	
    	switch($utilisateur->role) {
    		case '9':
    			$utilisateur->role= 'Administrateur';
    			break;
    		
    		case '8':
    			$utilisateur->role= 'Comptabilite';
    			break;	
	    }

	    $roles = $this->utilisateur['utilisateur']['role'];

	    $content = $this->load->view('admin/utilisateur/modifier', array('roles' => $roles, 'utilisateur' => $utilisateur), TRUE);
	    $this->load->view('admin/template/template', array('content' => $content));
	}

	// -----------------------------------------------------------------------
	
	public function supprimer($id)
	{
	    
	    if( !$this->authentification->est_connecte('administrateur') )
	    {
	        redirect('/admin/connexion');
	        exit;
	    }
	    
	    if( $this->user->supprimer_utilisateur($id) )
	    {
	        redirect('/admin/utilisateur/liste');
	        exit;
	    }
	}
}	