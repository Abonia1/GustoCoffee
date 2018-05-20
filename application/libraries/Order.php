<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order {

	/**
     * Le super objet CodeIgniter
     *
     * @var object
     * @access public
     */
    public $CI;

    /**
     * Un tableau avec tous les regles
     *
     * @var array
     * @access public
     */
    public $rules;


    /**
     * Un tableau à 2 dimension avec tous les donnée relatif au client
     *
     * @var array
     * @access public
     */
    public $commande;

    // -----------------------------------------------------------------------

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->CI =& get_instance();
        
        /*$this->CI->config-> load( 'ma_config/commande' , TRUE );
        $this->commande = config_item('ma_config/commande');*/
        
        $this->CI->config-> load( 'form_validation/commande' , TRUE );
        $this->rules= config_item('form_validation/commande');
        
        $this->CI->load->model('commande_model');   
    }

    // -----------------------------------------------------------------------
    
    /* Statut commande : 0 = Annulée, 1 = En cours, 2 = En attente, 3 = Terminée */

    /**
     * Enregistre une commande.
     *
     * @return  boolean  TRUE si une commande a été enregistrée ou FALSE
     */
    public function ajouter()
    {
    	$this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        
        $this->CI->form_validation->set_rules($this->rules['ajouter']);
           	
        if( $this->CI->form_validation->run() !== FALSE )
        {
        	/*foreach( $this->categorie['categorie']['ajouter'] AS $key => $element )
        	{
        	    if( !$this->CI->input->post($element) )
        	    {
        	        $datas[$key] = NULL;
        	    }
        	    
        	    $datas[$key] = $this->CI->input->post($element);
        	}*/
        
            $datas = array();
        
            $datas['client'] = $this->CI->input->post('id_client');
            $datas['reference'] = $this->CI->input->post('reference');
            $datas['prix_ht_final'] = $this->CI->input->post('prix_ht_final');
            $datas['prix_ht_remise'] = $this->CI->input->post('prix_ht_remise');
            $datas['prix_ttc_final'] = $this->CI->input->post('prix_ttc_final');
            $datas['date_creation'] = date('Y-m-d H:i:s');
            $datas['statut'] = '2';
            $datas['valide'] = '0';
            $datas['bon_livraison'] = 'bon.pdf';
            
            /* J'enregistre la commande et je retourne l'id de la commande */
            if( $id_commande = $this->CI->commande_model->ajouter($datas) )
            {
                /* Ensuite je récupère la liste des produits et je peux insérer tout mes produits en base */
                if( is_array( $this->CI->input->post('produit') ) )
                {
                    $produits = array();
                    
                    foreach( $this->CI->input->post('produit') AS $key => $val )
                    {
                        $produits[] =
                        array(
                            'commande' => $id_commande,
                            'produit' => $this->CI->input->post('id_produit')[$key],
                            'prix_ht' => $this->CI->input->post('prix_ht')[$key],
                            'remise' => $this->CI->input->post('remise')[$key],
                            'quantite' => $this->CI->input->post('quantite')[$key],
                            'total_ht' => $this->CI->input->post('total_ht')[$key]
                        ); 
                    }
                    
                    if( $this->CI->commande_model->ajouter_produit_commande($produits) )
                    {
                        return TRUE;
                    }
                    else
                    {
                        return FALSE;
                    }
                    
                    //var_dump($produits);
                }
                
                return FALSE;
                
                //peut être voir pour supprimer la commande précédemment enregistrée
            }
            
            return FALSE;
            
            
        	
        	
        	/*if( $this->CI->categorie_model->ajouter($datas) )
        	{
        	    $this->CI->session->set_flashdata('success', 'Votre catégorie a bien été enregistrée');
        	    return TRUE;
        	}	
        	
        	$this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        	return FALSE;*/
    	}
        
    	return FALSE;
    }
    
    
    
    
    // -----------------------------------------------------------------------
    
    /* Statut commande : 0 = Annulée, 1 = En cours, 2 = En attente, 3 = Terminée */
    
    /**
     * Modifier une commande.
     *
     * @return  boolean  TRUE si une commande a été modifiée ou FALSE
     */
    public function modifier($id)
    {
        $this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        
        $this->CI->form_validation->set_rules($this->rules['modifier']);
        
        if( $this->CI->form_validation->run() !== FALSE )
        {   
            $datas = array();
            
            $datas['client'] = $this->CI->input->post('id_client');
            $datas['reference'] = $this->CI->input->post('reference');
            $datas['prix_ht_final'] = $this->CI->input->post('prix_ht_final');
            $datas['prix_ht_remise'] = $this->CI->input->post('prix_ht_remise');
            $datas['prix_ttc_final'] = $this->CI->input->post('prix_ttc_final');
            $datas['date_modification'] = date('Y-m-d H:i:s');
            $datas['statut'] = $this->CI->input->post('statut');
            $datas['valide'] = $this->CI->input->post('valide');

            /* Voir gestion du PDF */
            
            /* J'enregistre la commande et je retourne l'id de la commande */
            if( $this->CI->commande_model->modifier($datas, $id) )
            {
                /* Ensuite je récupère la liste des produits et je peux insérer tout mes produits en base */
                if( is_array( $this->CI->input->post('produit') ) )
                {
                    $this->CI->commande_model->supprimer_produit_commande($id);
                    
                    $produits = array();
                    
                    foreach( $this->CI->input->post('produit') AS $key => $val )
                    {
                        $produits[] =
                        array(
                            'commande' => $id,
                            'produit' => $this->CI->input->post('id_produit')[$key],
                            'prix_ht' => $this->CI->input->post('prix_ht')[$key],
                            'remise' => $this->CI->input->post('remise')[$key],
                            'quantite' => $this->CI->input->post('quantite')[$key],
                            'total_ht' => $this->CI->input->post('total_ht')[$key]
                        );
                    }
                    
                    if( $this->CI->commande_model->ajouter_produit_commande($produits) )
                    {
                        return TRUE;
                    }
                    else
                    {
                        return FALSE;
                    }
                }
                
                return FALSE;
                
                //peut être voir pour supprimer la commande précédemment enregistrée
            }
            
            return FALSE;
        }
        
        return FALSE;
    }

    
    // -----------------------------------------------------------------------
    
    /**
     * Supprime une commande.
     *
     * @return  boolean  TRUE si une commande a été supprimée ou FALSE
     */
    public function supprimer($id)
    {
        if( $this->CI->commande_model->supprimer($id) )
        {
            $this->CI->commande_model->supprimer_produit_commande($id);
            $this->CI->session->set_flashdata('success', 'Votre commande a bien été supprimée');
            return TRUE;
        }
        
        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        return FALSE;
    }
    
    
    

   
}




              
        