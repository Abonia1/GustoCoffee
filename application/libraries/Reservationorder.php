<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservationorder {

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
    public $reservation;

    // -----------------------------------------------------------------------

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->CI =& get_instance();
        
        /*$this->CI->config-> load( 'ma_config/reservation' , TRUE );
        $this->reservation = config_item('ma_config/reservation');*/
        
        $this->CI->config-> load( 'form_validation/reservation' , TRUE );
        $this->rules= config_item('form_validation/reservation');
        
        $this->CI->load->model('reservation_model');   
    }

    // -----------------------------------------------------------------------
    
    /* Statut reservation : 0 = Annulée, 1 = En cours, 2 = En attente, 3 = Terminée */

    /**
     * Enregistre une reservation.
     *
     * @return  boolean  TRUE si une reservation a été enregistrée ou FALSE
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
            
            /* J'enregistre la reservation et je retourne l'id de la reservation */
            if( $id_reservation = $this->CI->reservation_model->ajouter($datas) )
            {
                /* Ensuite je récupère la liste des produits et je peux insérer tout mes produits en base */
                if( is_array( $this->CI->input->post('produit') ) )
                {
                    $produits = array();
                    
                    foreach( $this->CI->input->post('produit') AS $key => $val )
                    {
                        $produits[] =
                        array(
                            'reservation' => $id_reservation,
                            'produit' => $this->CI->input->post('id_produit')[$key],
                            'prix_ht' => $this->CI->input->post('prix_ht')[$key],
                            'remise' => $this->CI->input->post('remise')[$key],
                            'quantite' => $this->CI->input->post('quantite')[$key],
                            'total_ht' => $this->CI->input->post('total_ht')[$key]
                        ); 
                    }
                    
                    if( $this->CI->reservation_model->ajouter_produit_reservation($produits) )
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
                
                //peut être voir pour supprimer la reservation précédemment enregistrée
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
    
    /* Statut reservation : 0 = Annulée, 1 = En cours, 2 = En attente, 3 = Terminée */
    
    /**
     * Modifier une reservation.
     *
     * @return  boolean  TRUE si une reservation a été modifiée ou FALSE
     */
    public function modifier($id)
    {
        $this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        
        $this->CI->form_validation->set_rules($this->rules['modifier']);
        
        if( $this->CI->form_validation->run() !== FALSE )
        {   
            $datas = array();
            
            $datas['c_id'] = $this->CI->input->post('id_client');
            //$datas['reference'] = $this->CI->input->post('reference');
            $datas['date'] = $this->CI->input->post('Date');
            $datas['time'] = $this->CI->input->post('Time');
            $datas['quantity'] = $this->CI->input->post('quantity');
            $datas['tbnumber'] = $this->CI->input->post('tbnumber');
            $datas['payment'] = $this->CI->input->post('payment');
            $datas['status'] = $this->CI->input->post('statut');
            $datas['c_status'] = $this->CI->input->post('valide');

            /* Voir gestion du PDF */
            
            /* J'enregistre la reservation et je retourne l'id de la reservation */
           

            if( $this->CI->reservation_model->modifier($datas, $id) )
            {
                $this->CI->session->set_flashdata('success', 'Votre reservation a bien été modifié');
                return TRUE;
            }

            $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
            return FALSE;

            
            
        }
        
        return FALSE;
    }

    
    // -----------------------------------------------------------------------
    
    /**
     * Supprime une reservation.
     *
     * @return  boolean  TRUE si une reservation a été supprimée ou FALSE
     */
    public function supprimer($id)
    {
        if( $this->CI->reservation_model->supprimer($id) )
        {
            //$this->CI->reservation_model->supprimer_produit_reservation($id);
            $this->CI->session->set_flashdata('success', 'Votre reservation a bien été supprimée');
            return TRUE;
        }
        
        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        return FALSE;
    }
    
    
    

   
}




              
        