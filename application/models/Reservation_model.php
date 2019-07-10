<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des reservations
     *
     * @return  mixed  Un object contenant les reservations ou FALSE
     */
    public function reservations()
    {
        $this->db->select('reservation.*,  c1.prenom AS prenom, c1.nom AS nom');
        $this->db->from('reservation');
        $this->db->join('client AS c1', 'c1.id = reservation.c_id', 'left');
        $query = $this->db->get();

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des reservations d'un client
     *
     * @return  mixed  Un object contenant les reservations ou FALSE
     */
    public function reservation_liste($id)
    {
        $this->db->select('reservation.*,  c1.prenom AS prenom, c1.nom AS nom');
        $this->db->from('reservation');
        $this->db->join('client AS c1', 'c1.id = reservation.c_id', 'left');
        $this->db->where(array('c1.id' =>$id));
        $query = $this->db->get();

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }

    // ------------------------------------------------------------------------

    /**
     * Récupère une reservation
     *
     * @param   int    ID de la reservation
     * @return  mixed  Un object contenant la reservation ou FALSE
     */
    public function reservation($id)
    {
        $this->db->select('reservation.*, c1.prenom AS prenom, c1.nom AS nom, reservation.id AS reservation, c1.adresse, a1.adresse, a1.code_postal, a1.ville, a1.pays');
        $this->db->from('reservation');
        $this->db->join('client AS c1', 'c1.id = reservation.c_id', 'left');
        $this->db->join('adresse AS a1', 'a1.id = c1.adresse', 'left');
        $this->db->where( array('reservation.id' => $id) );
        $query = $this->db->get();

        if( $query->num_rows() == 1 )
        {
            return $query->row();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Supprimer une reservation
     *
     * @param int $id id de la reservation
     * @return boolean true si delete réussi, sinon false
     */
    public function supprimer($id)
    {
        return $this->db->delete('reservation', array('id' => $id));
    }

    // -----------------------------------------------------------------------

    /**
     * Modifier une reservation
     *
     * @param array $data informations à mettre à jour
     * @param int $id id de la reservation
     * @return boolean true si update réussi, sinon false
     */
    public function modifier($data, $id)
    {
        return $this->db->update('reservation', $data, array('id' => $id));
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistrer une reservation.
     *
     * @param   array  tableau de donnée contenant les information à insérer dans la table
     * @return  boolean  TRUE si la reservation est enregistrée ou FALSE
     */
    public function ajouter($data)
    {
        $this->db->insert('reservation', $data);
        return $this->db->insert_id();
    }


    public function compare($date,$time,$person) {
        //$today = date('Y-m-d');  
        $query = $this->db->query(
            "SELECT tbnumber FROM reservation WHERE date = '{$date}' AND time = '{$time}' AND  quantity= '{$person}'");
        return $query;
    }
    // -----------------------------------------------------------------------

    /**
     * Enregistrer une liste de produits correspondant à une reservation.
     *
     * @param   array    tableau de données contenant les information à insérer dans la table
     * @return  boolean  TRUE si les produits sont enregistrées ou FALSE
     */
    public function ajouter_produit_reservation($data)
    {
        return $this->db->insert_batch('reservation_produit', $data);
    }

    // -----------------------------------------------------------------------

    /**
     * Supprime les produits d'une reservation
     *
     * @param   int      ID de la reservation
     * @return  boolean  TRUE si les produits sont supprimés ou FALSE
     */
    public function supprimer_produit_reservation($id)
    {
        return $this->db->delete('reservation_produit', array('reservation' => $id));
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des reservations d'un client
     *
     * @param   int    ID du client
     * @return  mixed  Un object contenant les reservations ou FALSE
     */
    public function reservations_client($id)
    {
        $this->db->select('reservation.*, c1.prenom AS prenom, c1.nom AS nom');
        $this->db->from('reservation');
        $this->db->join('client AS c1', 'c1.id = reservation.c_id', 'left');
        $this->db->where(array('c1.id' => $id));
        $query = $this->db->get();

        if( $query->num_rows() >= 1)
        {
            return $query->result();
        }
        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Retourne le nombre de reservations
     *
     * @return  int Le nombre de reservations trouvés
     */
    public function nombre_reservation()
    {
        $this->db->select('count(*) AS nombre');
        $this->db->from('reservation');
        $query = $this->db->get();

        if($query->num_rows() >= 1) {
            $row = $query->row_array();
            return (object) $row;
        } else {
            return false;
        }
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des reservations d'une société
     *
     * @param   array  identifiant du client
     *
     * @return  mixed  Un object contenant toute les reservation des utilisateur d'une même société ou FALSE
     */
    public function reservations_societe($client =NULL)
    {
        if($client != NULL)
        {
            $this->db->select('siret');
            $this->db->from('client');
            $this->db->where(array('id' => $client));
            $query = $this->db->get();

            if( $query->num_rows() == 1)
            {
                $siret=$query->row();
            }
            else
            {
                $siret=FALSE;
            }

            if($siret)
            {
                $this->db->select('id');
                $this->db->from('client');
                $this->db->where(array('siret' => $siret->siret));
                $query = $this->db->get();

                if( $query->num_rows() >= 1)
                {
                    $idClient=$query->result();
                }
                else
                {
                    return NULL;
                }
            }
            $Lquery;
            foreach ($idClient as $key => $value)
            {
                $this->db->select('id, prix_ttc_final, statut, valide');
                $this->db->from('reservation');
                $this->db->where(array('client' => $value->id));
                $Lquery= $this->db->get();
            }
            if( $Lquery->num_rows() >= 1)
            {
                return $Lquery->result();
            }
            else
            {
                return $Lquery->row();
            }
        }
        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des produits d'une reservation
     *
     * @return  mixed  Un object contenant la liste des produits ou FALSE
     */
    public function reservation_produit($id)
    {
        $this->db->select('reservation_produit.*, p1.id AS produit_id, p1.nom AS produit_name');
        $this->db->from('reservation_produit');
        $this->db->join('produit AS p1', 'p1.id = reservation_produit.produit', 'left');
        $this->db->where(array('reservation_produit.reservation' => $id));
        $query = $this->db->get();

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

}
