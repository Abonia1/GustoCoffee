<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisation_model extends CI_Model {

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
    public function utilisations()
    {
        $query = $this->db->get('utilisation');

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
    public function utilisation($id)
    {
        $query = $this->db->where( array('id' => $id) )
        ->get('utilisation');

        if($query->num_rows() >= 1)
        {
            return $query->row();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistrer une utilisation.
     *
     * @param  array   tableau de données contenant les informations à insérer dans la table
     *
     * @return boolean TRUE si la utilisation est enregistrée ou FALSE
     */
    public function ajouter($data)
    {
        return $this->db->insert('utilisation', $data);
    }

    // -----------------------------------------------------------------------

    /**
     * Supprimer une utilisation
     *
     * @param  int     id de la utilisation
     *
     * @return boolean TRUE si suppression réussie, sinon FALSE
     */
    public function supprimer($id)
    {
      return $this->db->delete('utilisation', array('id' => $id));
    }

    // -----------------------------------------------------------------------

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
        return $this->db->update('utilisation', $data, array('id' => $id));
    }
}
