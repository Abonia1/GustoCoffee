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
        $this->db->select('nom, slug, description_courte, image');
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
        $this->db->select('p2.nom, p2.slug, p2.description_courte, p2.description_longue, p2.bidon');
        $this->db->from('produit AS p2');
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
       * Récupère le caracteristique d'un produit (-> au niveau du site)
       *
       * @param   int    ID du produit
       * @return  mixed  Un object contenant le produit ou FALSE
       */
        public function caracteristique_produit($id)
        {
            $this->db->select('pc.caracteristique');
            $this->db->from('produit_caracteristique AS pc');
            $this->db->where(array('pc.produit' => $id));
            $query = $this->db->get();

            if( $query->num_rows() >= 1 )
            {
                $row = $query->result();
                return (object) $row;
            }

            return FALSE;
        }

        // -----------------------------------------------------------------------

        /**
         * Récupère les utilisations d'un produit (-> au niveau du site)
         *
         * @param   int    ID du produit
         * @return  mixed  Un object contenant le produit ou FALSE
         */
        public function utilisation_produit($id)
        {
            $this->db->select('u.description, u.image');
            $this->db->from('utilisation AS u');
            $this->db->join('produit_utilisation AS pu', 'pu.utilisation = u.id', 'left');
            $this->db->where(array('pu.produit' => $id));
            $query = $this->db->get();

            if( $query->num_rows() >= 1 )
            {
                $row = $query->result();
                return (object) $row;
            }

            return FALSE;
        }

        // -----------------------------------------------------------------------

        /**
         * Récupère les priorités d'un produit (-> au niveau du site)
         *
         * @param   int    ID du produit
         * @return  mixed  Un object contenant le produit ou FALSE
         */
          public function priorite_produit($id)
          {
              $this->db->select('p.priorite, p.image, p.alt');
              $this->db->from('priorite AS p');
              $this->db->join('produit_priorite AS pp', 'pp.priorite = p.id', 'left');
              $this->db->where(array('pp.produit' => $id));
              $query = $this->db->get();

              if( $query->num_rows() >= 1 )
              {
                  $row = $query->result();
                  return (object) $row;
              }

              return FALSE;
          }


        // -----------------------------------------------------------------------

        /**
         * Récupère les priorites d'un produit
         *
         * @param   int    ID du produit
         * @return  mixed  Un object contenant les priorites ou FALSE
         */
        public function produit_priorite($id)
        {
            $this->db->select('produit_priorite.*, p1.priorite AS priorite, p1.image AS image, p1.id AS id_priorite');
            $this->db->from('produit_priorite');
            $this->db->join('priorite AS p1', 'p1.id = produit_priorite.priorite', 'left');
            $this->db->where(array('produit_priorite.produit' => $id));
            $query = $this->db->get();

            if( $query->num_rows() >= 1 )
            {
                $row = $query->result();
                return (object) $row;
            }

            return FALSE;
        }



        public function produit_priorite_liste($id)
        {
            $this->db->select('priorite')->where(array('produit'=>$id));
            $query = $this->db->get('produit_priorite');

            if( $query->num_rows() >= 1 )
            {
                return $query->result();
            }

            return FALSE;
        }

        // -----------------------------------------------------------------------

        /**
         * Récupère les utilisation d'un produit
         *
         * @param   int    ID du produit
         * @return  mixed  Un object contenant les priorites ou FALSE
         */
        public function produit_utilisation($id)
        {
            $this->db->select('produit_utilisation.*, u1.utilisation AS utilisation, u1.image AS image, u1.id AS id_utilisation');
            $this->db->from('produit_utilisation');
            $this->db->join('utilisation AS u1', 'u1.id = produit_utilisation.utilisation', 'left');
            $this->db->where(array('produit_utilisation.produit' => $id));
            $query = $this->db->get();

            if( $query->num_rows() >= 1 )
            {
                $row = $query->result();
                return (object) $row;
            }

            return FALSE;
        }



        public function produit_utilisation_liste($id)
        {
            $this->db->select('utilisation')->where(array('produit'=>$id));
            $query = $this->db->get('produit_utilisation');

            if( $query->num_rows() >= 1 )
            {
                return $query->result();
            }

            return FALSE;
        }

        // -----------------------------------------------------------------------

        /**
         * Récupère les caractéristique d'un produit
         *
         * @param   int    ID du produit
         * @return  mixed  Un object contenant les caractéristique ou FALSE
         */

         public function produit_caracteristique_liste($id)
         {
             $this->db->select('caracteristique')->where(array('produit'=>$id));
             $query = $this->db->get('produit_caracteristique');

             if( $query->num_rows() >= 1 )
             {
                 return $query->result();
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
