<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commande_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des commandes
     *
     * @return  mixed  Un object contenant les commandes ou FALSE
     */
    public function commandes()
    {
        $this->db->select('commande.*, c1.prenom AS prenom, c1.nom AS nom');
        $this->db->from('commande');
        $this->db->join('client AS c1', 'c1.id = commande.client', 'left');
        $query = $this->db->get();

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des commandes d'un client
     *
     * @return  mixed  Un object contenant les commandes ou FALSE
     */
    public function commande_liste($id)
    {
        $this->db->select('commande.*, c1.prenom AS prenom, c1.nom AS nom');
        $this->db->from('commande');
        $this->db->join('client AS c1', 'c1.id = commande.client', 'left');
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
     * Récupère une commande
     *
     * @param   int    ID de la commande
     * @return  mixed  Un object contenant la commande ou FALSE
     */
    public function commande($id)
    {
        $this->db->select('commande.*, c1.prenom AS prenom, c1.nom AS nom, commande.id AS commande, c1.adresse, a1.adresse, a1.code_postal, a1.ville, a1.pays');
        $this->db->from('commande');
        $this->db->join('client AS c1', 'c1.id = commande.client', 'left');
        $this->db->join('adresse AS a1', 'a1.id = c1.adresse', 'left');
        $this->db->where( array('commande.id' => $id) );
        $query = $this->db->get();

        if( $query->num_rows() == 1 )
        {
            return $query->row();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Supprimer une commande
     *
     * @param int $id id de la commande
     * @return boolean true si delete réussi, sinon false
     */
    public function supprimer($id)
    {
        return $this->db->delete('commande', array('id' => $id));
    }

    // -----------------------------------------------------------------------

    /**
     * Modifier une commande
     *
     * @param array $data informations à mettre à jour
     * @param int $id id de la commande
     * @return boolean true si update réussi, sinon false
     */
    public function modifier($data, $id)
    {
        return $this->db->update('commande', $data, array('id' => $id));
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistrer une commande.
     *
     * @param   array  tableau de donnée contenant les information à insérer dans la table
     * @return  boolean  TRUE si la commande est enregistrée ou FALSE
     */
    public function ajouter($data)
    {
        $this->db->insert('commande', $data);
        return $this->db->insert_id();
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistrer une liste de produits correspondant à une commande.
     *
     * @param   array    tableau de données contenant les information à insérer dans la table
     * @return  boolean  TRUE si les produits sont enregistrées ou FALSE
     */
    public function ajouter_produit_commande($data)
    {
        return $this->db->insert_batch('commande_produit', $data);
    }

    // -----------------------------------------------------------------------

    /**
     * Supprime les produits d'une commande
     *
     * @param   int      ID de la commande
     * @return  boolean  TRUE si les produits sont supprimés ou FALSE
     */
    public function supprimer_produit_commande($id)
    {
        return $this->db->delete('commande_produit', array('commande' => $id));
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des commandes d'un client
     *
     * @param   int    ID du client
     * @return  mixed  Un object contenant les commandes ou FALSE
     */
    public function commandes_client($id)
    {
        $this->db->select('commande.*, c1.prenom AS prenom, c1.nom AS nom');
        $this->db->from('commande');
        $this->db->join('client AS c1', 'c1.id = commande.client', 'left');
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
     * Retourne le nombre de commandes
     *
     * @return  int Le nombre de commandes trouvés
     */
    public function nombre_commande()
    {
        $this->db->select('count(*) AS nombre');
        $this->db->from('commande');
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
     * Récupère la liste des commandes d'une société
     *
     * @param   array  identifiant du client
     *
     * @return  mixed  Un object contenant toute les commande des utilisateur d'une même société ou FALSE
     */
    public function commandes_societe($client =NULL)
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
                $this->db->from('commande');
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
     * Récupère la liste des produits d'une commande
     *
     * @return  mixed  Un object contenant la liste des produits ou FALSE
     */
    public function commande_produit($id)
    {
        $this->db->select('commande_produit.*, p1.id AS produit_id, p1.nom AS produit_name');
        $this->db->from('commande_produit');
        $this->db->join('produit AS p1', 'p1.id = commande_produit.produit', 'left');
        $this->db->where(array('commande_produit.commande' => $id));
        $query = $this->db->get();

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

}
