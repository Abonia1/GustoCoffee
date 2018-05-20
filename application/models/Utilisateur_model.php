<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    // -----------------------------------------------------------------------
    
    /**
     * Récupère la liste des utilisateurs
     * 
     * @return  mixed  Un object contenant les utilisateurs ou FALSE
     */
    public function liste($id = NULL)
    {
        if($id != NULL)
        {
            $query = $this->db->where(array('id' => $id))
            ->get('administrateur');
            
             if($query->num_rows() === 1)
            {
                return $query->row();
            }
            return NULL;
        }    

        $query = $this->db->get('administrateur');
        
        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }
        
        return FALSE;
    }

    // -----------------------------------------------------------------------
    
    /**
     * Enregistrer un utilisateur.
     *
     * @param   array  tableau de donnée contenant les information à insérer dans la table
     * @return  boolean  TRUE si l'utilisateur est enregistré ou FALSE
     */
    public function ajouter($data)
    {
        return $this->db->insert('administrateur', $data);
    }
    
    // -----------------------------------------------------------------------
    
    /**
     * Récupère tous les utilisateurs
     *
     * @return  object  les informations des utilisateurs
     */
    public function afficher_utilisateur($id = NULL)
    {
        if( !is_null($id) )
        {
            $this->db->select('*')->where(array('id' => $id))->from('administrateur');
            $query = $this->db->get();
            
            if($query->num_rows() === 1)
            {
                return $query->row();
            }
            return NULL; 
        }
        
        $this->db->select('nom, prenom, identifiant, email, role, id')->from('administrateur');
        $query = $this->db->get();
            
        if($query->num_rows() >= 1)
        {
            return $query->result();
        } 
        return NULL;  
    }
    
    // -----------------------------------------------------------------------
    
    /**
     * Modifier un utilisateur
     *
     * @param array $data informations à mettre à jour
     * @param int $id id de l'utilisateur
     * @return boolean true si update réussi, sinon false
     */
    public function modifier_utilisateur($data, $id)
    {
        return $this->db->update('administrateur', $data, array('id' => $id));
    }
    
    // -----------------------------------------------------------------------
    
    /**
     * Supprimer un utilisateur
     *
     * @param int $id id de l'utilisateur
     * @return boolean true si delete réussi, sinon false
     */
    public function supprimer_utilisateur($id)
    {
        return $this->db->delete('administrateur', array('id' => $id));
    }
    
    // -----------------------------------------------------------------------
}    
    