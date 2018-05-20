<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mention_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    // -----------------------------------------------------------------------

    /**
     * Récupérer tous les utilisations.
     *
     * @return mixed La liste des utilisations ou FALSE
     */
    public function mentions()
    {
        $query = $this->db->get('mention');

        if($query->num_rows() >= 1)
        {
            return $query->result();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Récupérer une utilisation.
     *
     * @param  int   ID utilisation
     *
     * @return mixed Les informations de la utilisation ou FALSE
     */
    public function mention($id)
    {
        $query = $this->db->where( array('id' => $id) )
        ->get('mention');

        if($query->num_rows() >= 1)
        {
            return $query->row();
        }

        return FALSE;
    }

   
   

    /**
     * Modifier un utilisation
     *
     * @param  array   informations à mettre à jour
     * @param  int     ID de la priorité
     *
     * @return boolean TRUE si modification réussie, sinon FALSE
     */
    public function modifier($data, $id)
    {
        return $this->db->update('mention', $data, array('id' => $id));
    }
}
