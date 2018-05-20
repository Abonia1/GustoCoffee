<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    // -----------------------------------------------------------------------

    /**
     * Récupérer tous les priorites.
     *
     * @return mixed La liste des priorites ou FALSE
     */
    public function stocks()
    {
        $query = $this->db->get('stock');

        if($query->num_rows() >= 1)
        {
            return $query->result();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Récupérer une priorite.
     *
     * @param  int   ID priorite
     *
     * @return mixed Les informations de la priorite ou FALSE
     */
    public function stock($id)
    {
        $query = $this->db->where( array('id' => $id) )
        ->get('stock');

        if($query->num_rows() >= 1)
        {
            return $query->row();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistrer une priorite.
     *
     * @param  array   tableau de données contenant les informations à insérer dans la table
     *
     * @return boolean TRUE si la priorite est enregistrée ou FALSE
     */
    public function ajouter($data)
    {
        return $this->db->insert('stock', $data);
    }

    // -----------------------------------------------------------------------

    /**
     * Supprimer une priorite
     *
     * @param  int     id de la priorite
     *
     * @return boolean TRUE si suppression réussie, sinon FALSE
     */
    public function supprimer($id)
    {
      return $this->db->delete('stock', array('id' => $id));
    }

    // -----------------------------------------------------------------------

    /**
     * Modifier un priorite
     *
     * @param  array   informations à mettre à jour
     * @param  int     ID de la priorité
     *
     * @return boolean TRUE si modification réussie, sinon FALSE
     */
    public function modifier($data, $id)
    {
        return $this->db->update('stock', $data, array('id' => $id));
    }
}
