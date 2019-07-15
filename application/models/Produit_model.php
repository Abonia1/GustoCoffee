<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère la liste des produits
     *
     * @return  mixed  Un objet contenant les produits ou FALSE
     */
    public function produits()
    {
        $query = $this->db->get('produit');

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }


    /**
     * Récupère la liste des produits
     *
     * @return  mixed  Un objet contenant les produits ou FALSE
     */
    public function produits_accueil()
    {
        $this->db->select('nom, description_courte, image');
        $query = $this->db->get('produit');

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }


    /**
     * Récupère la liste des produits
     *
     * @return  mixed  Un objet contenant les produits ou FALSE
     */
    public function produits_liste()
    {
        $this->db->select('nom, description_courte, description_longue,image');
        $this->db->from('produit');
        $query = $this->db->get();

        if( $query->num_rows() >= 1 )
        {
            return $query->result();
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère un produit
     *
     * @param   int    ID du produit
     * @return  mixed  Un object contenant le produit ou FALSE
     */
    public function produit($id)
    {
        $query = $this->db->where(array('id' => $id))->get('produit');

        if( $query->num_rows() >= 1 )
        {
            $row = $query->row_array();
            return (object) $row;
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère un produit via le slug (-> au niveau du site)
     *
     * @param   string    slug du produit
     * @return  mixed  Un object contenant le produit ou FALSE
     */
      public function produit_detail($slug)
      {
          $query = $this->db->where(array('slug' => $slug))->get('produit');

          if( $query->num_rows() >= 1 )
          {
              $row = $query->row_array();
              return (object) $row;
          }

          return FALSE;
      }



         // -----------------------------------------------------------------------

        /**
         * Modifier un pictogramme
         *
         * @param  array   informations à mettre à jour
         * @param  int     ID du pictogramme
         *
         * @return boolean TRUE si modification réussie, sinon FALSE
         */
        public function modifier_produit($data, $id)
        {
            return $this->db->update('produit', $data, array('id' => $id));
        }

        //--------------------------------------------------------------------------

        /**
         * Supprimer un produit
         *
         * @param int $id id du produit
         * @return boolean true si delete réussi, sinon false
         */
        public function supprimer($id)
        {
            return $this->db->delete('produit', array('id' => $id));
        }

        // -----------------------------------------------------------------------

        /**
         * Supprimer les priorités d'un produit
         *
         * @param  int     ID du produit
         * @return boolean true si delete réussi, sinon false
         */
        public function supprimer_produit_priorite($produit)
        {
            return $this->db->delete('produit_priorite', array('produit' => $produit));
        }

        // -----------------------------------------------------------------------

        /**
         * Supprimer les utilisation d'un produit
         *
         * @param  int     ID du produit
         * @return boolean true si delete réussi, sinon false
         */
        public function supprimer_produit_utilisation($produit)
        {
            return $this->db->delete('produit_utilisation', array('produit' => $produit));
        }

        // -----------------------------------------------------------------------

        /**
         * Supprimer les caractéristique d'un produit
         *
         * @param  int     ID du produit
         * @return boolean true si delete réussi, sinon false
         */
        public function supprimer_produit_caracteristique($produit)
        {
            return $this->db->delete('produit_caracteristique', array('produit' => $produit));
        }

        // -----------------------------------------------------------------------

        /**
         * Supprimer une utilisation d'un produit
         *
         * @param  int     ID de l'utilisation
         * @return boolean true si delete réussi, sinon false
         */
        public function supprimer_utilisation($utilisation)
        {
            return $this->db->delete('produit_utilisation', array('utilisation' => $utilisation));
        }

        // -----------------------------------------------------------------------

        /**
         * Supprimer une priorite d'un produit
         *
         * @param  int     ID de la priorité
         * @return boolean true si delete réussi, sinon false
         */
        public function supprimer_priorite($priorite)
        {
            return $this->db->delete('produit_priorite', array('priorite' => $priorite));
        }

        // -----------------------------------------------------------------------

        /**
         * Modifier un produit
         *
         * @param array $data informations à mettre à jour
         * @param int $id id du produit
         * @return boolean true si update réussi, sinon false
         */
        public function modifier($data, $id)
        {
            return $this->db->update('produit', $data, array('id' => $id));
        }

        // -----------------------------------------------------------------------

        /**
         * Enregistrer un produit.
         *
         * @param   array  tableau de donnée contenant les information à insérer dans la table
         * @return  boolean  TRUE si le produit est enregistrée ou FALSE
         */
        public function ajouter($data)
        {
            $this->db->insert('produit', $data);
            return $this->db->insert_id();
        }

        // -----------------------------------------------------------------------

        /**
         * Enregistrer une liste de priorités correspondant à un produit.
         *
         * @param   array  tableau de données contenant les information à insérer dans la table
         * @return  boolean  TRUE si les priorité sont enregistrées ou FALSE
         */
        public function ajouter_produit_priorite($data)
        {
            return $this->db->insert_batch('produit_priorite', $data);
        }

        // -----------------------------------------------------------------------

        /**
         * Enregistrer une liste de caracteristiques correspondant à un produit.
         *
         * @param   array  tableau de données contenant les information à insérer dans la table
         * @return  boolean  TRUE si les caracteristiques sont enregistrées ou FALSE
         */
        public function ajouter_produit_caracteristique($data)
        {
            return $this->db->insert_batch('produit_caracteristique', $data);
        }

        // -----------------------------------------------------------------------

        /**
         * Enregistrer une liste des utilisations correspondant à un produit.
         *
         * @param   array  tableau de données contenant les information à insérer dans la table
         * @return  boolean  TRUE si les utilisations sont enregistrées ou FALSE
         */
        public function ajouter_produit_utilisation($data)
        {
            return $this->db->insert_batch('produit_utilisation', $data);
        }

        // -----------------------------------------------------------------------

        /**
         * Rechercher un produit par son nom.
         *
         * @param   string   Nom du produit à rechercher
         * @return  mixed    La liste des produits sinon FALSE
         */
        public function rechercher_produit($name)
        {
            $this->db->like(array('nom' => $name));
            $query = $this->db->get('produit');

            if($query->num_rows() >= 1) {
                return $query->result();
            } else {
                return false;
            }
        }
}
