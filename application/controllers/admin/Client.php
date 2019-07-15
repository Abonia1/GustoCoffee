<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $params=array(
        	'target' 					=> 'admin',
        	'maConfig' 					=>'ma_config/client',
        	'validationRules'			=> 'form_validation/client',
        	'model'						=> 'client_model',
        );
        $this->load->library('customer',$params);
        $this->output->enable_profiler(FALSE);
    }

    // -----------------------------------------------------------------------

	public function ajouter()
	{
	    //Si pas connecté on retourne à login
	    if( !$this->authentification->est_connecte('administrateur') )
	    {
	        redirect('/admin/connexion');
	        exit;
	    }

	    //Si on ajoute c'est bon on peut rediriger vers liste
	    if( $this->customer->ajouter() )
	    {
	        redirect('/admin/client/liste');
	        exit;
	    }

	    //Sinon on affiche le formulaire d'ajout
	    $this->load->helper('form');

	    $pays = $this->client_model->liste_pays();

	   $content = $this->load->view('admin/client/ajouter', array('pays' => $pays), TRUE);
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

	    $this->load->model('client_model');
	    $clients = $this->client_model->recuperer_clients();

	    $content = $this->load->view('admin/client/liste', array('clients' => $clients), TRUE);
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

	    //Si on ajoute c'est bon on peut rediriger vers liste
	    if( $this->customer->modifier_client($id) )
	    {
	        redirect('/admin/client/liste');
	        exit;
	    }


	    //Sinon on affiche le formulaire de modification
	    $this->load->helper('form');

	    $client = $this->client_model->recuperer_client($id);
	    $pays = $this->client_model->liste_pays();

	    $content = $this->load->view('admin/client/modifier', array('pays' => $pays, 'client' => $client), TRUE);
	    $this->load->view('admin/template/template', array('content' => $content));
	}

	// -----------------------------------------------------------------------

	public function supprimer($id)
	{
	    // On supprime ou on classe en archive pour ne perdre aucune donnée ?
	    //Supprimer client en faisant attention à supprimer tout ce qui lui appartient

	    //Si on classe en archive
	    // Ajouter à la table archive, et avec un CRON on vide la table archive en créant un fichier CSV ou autre tous les mois.

	    if( !$this->authentification->est_connecte('administrateur') )
	    {
	        redirect('/admin/connexion');
	        exit;
	    }

	    if( $this->customer->supprimer_client($id) )
	    {
	        redirect('/admin/client/liste');
	        exit;
	    }
	}

	public function detail($id)
	{
		if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

		$client = $this->client_model->recuperer_client($id);

		$totalUser = 0;
		$annuleUser = 0;
		$dettesUser = 0;

		$this->load->model('reservation_model');
	    $commandes = $this->reservation_model->reservations_client($id);

	    if(is_array($commandes)) {
    	    foreach( $commandes AS $commande ) {
    	        switch( $commande->status )
    	        {
    	            case 0:
    	                $annuleUser += intval($commande->payment);
    	                break;

    	            case 1:
    	            case 2:
    	                $dettesUser += intval($commande->payment);
    	                break;

    	            case 3:
    	                $totalUser += intval($commande->payment);
    	                break;
    	        }
    	        /*
    	    	if( $commande->statut == 3 )
    	    	{
    	    		$totalUser=$totalUser+intval($commande->prix_ttc_final);
    	    	}
    	    	if($commande->statut == 0)
    	    	{
    	    		$annuleUser=$annuleUser+intval($commande->prix_ttc_final);
    	    	}
    	    	if($commande->statut == 1 || $commande->statut == 2)
    	    	{
    	    		$dettesUser=$dettesUser+intval($commande->prix_ttc_final);
    	    	}	*/
    	    }
	    }

	    /*$totalSociete=0;
		$annuleSociete=0;
		$dettesSociete=0;
	    $commandesSociete = $this->reservation_model->commandes_societe($id);
	    foreach ($commandesSociete as $commandeSociete) {
	    	if($commandeSociete->statut == 3)
	    	{
	    		$totalSociete=$totalSociete+intval($commandeSociete->prix_ttc_final);
	    	}
	    	if($commandeSociete->statut == 0)
	    	{
	    		$annuleSociete=$annuleSociete+intval($commandeSociete->prix_ttc_final);
	    	}
	    	if($commandeSociete->statut == 1 || $commandeSociete->statut == 2)
	    	{
	    		$dettesSociete=$dettesSociete+intval($commandeSociete->prix_ttc_final);
	    	}
	    }*/

	    $contenu = array(
	        'client' => $client,
	        'commandes' => $commandes,
	        'totalUser' => $totalUser,
	        'annuleUser' => $annuleUser,
	        'dettesUser' => $dettesUser
	    );

	    $content = $this->load->view('admin/client/detail', $contenu, TRUE);
	    $this->load->view('admin/template/template', array('content' => $content));
	}
}
