<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class services extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des types de services
     *
     * @return  mixed  Un objet contenant les produits ou FALSE
     */
    public function services_type_liste()
    {
        $this->db->select('s_type_id, s_nom, s_image');
        $this->db->from('services_type');
        $query = $this->db->get();

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }
    public function service_liste($id)
    {
        $this->db->select('service_type_id, service_nom, service_image, service_prix');
        $this->db->from('services');
        $this->db->where('service_type_id', $id);
        $query = $this->db->get();

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }
}
