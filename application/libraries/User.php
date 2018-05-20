<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User {

	/**
     * Le super objet CodeIgniter
     *
     * @var object
     * @access public
     */
    public $CI;
    
    /**
     * Le modèle Utilisateur
     *
     * @var object
     * @access public
     */
    public $utilisateur_model = 'utilisateur_model';

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
    public $utilisateur;

    // -----------------------------------------------------------------------

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load( 'ma_config/utilisateur' , TRUE );
        $this->CI->config->load( 'form_validation/utilisateur' , TRUE );
        $this->CI->load->model('utilisateur_model');
        $this->rules= config_item('form_validation/utilisateur');
        $this->user = config_item('ma_config/utilisateur');
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistre les données d'un utilisateur.
     *
     * @return  boolean  TRUE si l'utilisateur a été enregistré ou FALSE
     */
    public function ajouter()
    {
        $this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_rules($this->rules['ajouter_utilisateur']);

        if( $this->CI->form_validation->run() !== FALSE )
        {
            foreach( $this->user['utilisateur']['champs'] AS $key => $element )
            {
                if( !$this->CI->input->post($element) )
                {
                    $datas[$key] = NULL;
                }  
                
                $datas[$key] = $this->CI->input->post($element);
            }
            
            $date = date('Y-m-d H:i:s');
            
            $datas['mot_de_passe'] = password_hash( $this->CI->input->post('mot_de_passe'), PASSWORD_BCRYPT);
            $datas['date_creation'] = $date;
            $datas['date_modification'] = $date;

            if( $this->CI->utilisateur_model->ajouter($datas) )
            {
                $this->CI->session->set_flashdata('success', 'Votre utilisateur a bien été enregistré');
                return TRUE;
            }   
            
            $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
            return FALSE;
        }
        
        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * modifier les données d'un utilisateur.
     *
     * @return  boolean  TRUE si l'utilisateur a été modifié ou FALSE
     */

    public function modifier_utilisateur($id)
    {
        $this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_rules($this->rules['modifier_utilisateur']);

        if( $this->CI->form_validation->run() !== FALSE )
        {
            foreach( $this->user['utilisateur']['champs'] AS $key => $element )
            {
                if( !$this->CI->input->post($element) )
                {
                    $datas[$key] = NULL;
                }  
                
                $datas[$key] = $this->CI->input->post($element);
            }
            
            $date = date('Y-m-d H:i:s');
            $datas['date_modification'] = $date;
            
            /* Si le mot de passe est vide on ne le modifie pas */
            if( !empty($this->CI->input->post('mot_de_passe')) && !empty($this->CI->input->post('mot_de_passe_check')) )
            {
                $datas['mot_de_passe'] = password_hash( $this->CI->input->post('mot_de_passe'), PASSWORD_BCRYPT);
            }

            
            if( $this->CI->utilisateur_model->modifier_utilisateur($datas, $id) )
            {
                $this->CI->session->set_flashdata('success', 'Votre utilisateur a bien été enregistré');
                return TRUE;
            }   
            
            $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
            return FALSE;
        }
        
        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * supprimmer les données d'un utilisateur.
     *
     * @return  boolean  TRUE si l'utilisateur a été supprimé ou FALSE
     */

    public function supprimer_utilisateur($id)
    {
        if( $this->CI->utilisateur_model->supprimer_utilisateur($id) )
        {
            $this->CI->session->set_flashdata('success', 'Votre utilisateur a bien été supprimé');
            return TRUE;
        }
        
        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        return FALSE;
    }

}    