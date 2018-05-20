<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentification_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    // -----------------------------------------------------------------------
    
    /**
     * Vérifie l'existence d'un utilisateur.
     *
     * @param   string  Un identifiant ou une adresse e-mail
     * @param   string  La table dans laquelle on va cherche l'utilisateur
     * @param   array  La liste des champs à récupérer
     * @param   array  La liste des champs sur lesquels on va chercher
     * 
     * @return  mixed  Un object contenant les informations de l'utilisateur ou FALSE
     */
    public function verifier_identifiant( $identifiant, $table, $champs, $where )
    {   
        $query = $this->db->select( $champs )
        ->where( 'LOWER( '.$where.' ) =', strtolower( $identifiant ) )
        ->limit(1)
        ->get( strtolower( $table ) );
        
        if( $query->num_rows() == 1 )
        {
            $row = $query->row_array();
            
            return (object) $row;
        }
        
        return FALSE;
    }
    
    // -----------------------------------------------------------------------
    
    /**
     * Vérifie la concordance des mots de passe.
     *
     * @param   string  Un mot de passe saisie par l'utilisateur
     * @param   string  Un mot de passe crypté
     * @return  boolean  TRUE si le mot de passe correspond, sinon FALSE
     */
    public function verifier_mot_de_passe( $mot_de_passe, $hash )
    {
        if( password_verify( $mot_de_passe, $hash ) ) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
    
    
    public function tous()
    {
        $query = $this->db->get('client');
        
        if( $query->num_rows() == 1 )
        {
            $row = $query->row_array();
            
            return $row;
        }
    }
}