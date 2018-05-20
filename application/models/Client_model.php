<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

/**********************Variable**********************************/

    /**
     * Selection des champs
     *
     * @var string
     * @access private
     */
    private $select;

    /**
     * Ajouter un client
     *
     * @var boolen
     * @access public
     */
    public $ajouter;

    /**
     * Tableau regroupant les config de client
     *
     * @var object
     * @access private
     */
    private $client;


/**********************Methode**********************************/

    public function __construct()
    {
        $this->load->database();
        // $this->config-> load( 'ma_config/client' , TRUE );
        // $this->client = config_item('ma_config/client');
    }



    // -----------------------------------------------------------------------

    /**
     * Enregistrer un client.
     *
     * @param   array  tableau de donnée contenant les information
     *à insérer dans la table
     *
     * @return  boolean  TRUE si le client enregistré ou FALSE
     */
    public function ajouter($data)
    {
        return $this->db->insert('client', $data);
    }

    // -----------------------------------------------------------------------

    /**
     * Modifier un client
     *
     * @param array $data informations à mettre à jour
     * @param int $id id du client
     * @return boolean true si update réussi, sinon false
     */
    public function modifier($data, $id)
    {
        return $this->db->update('client', $data, array('id' => $id));
    }

    // -----------------------------------------------------------------------

    /**
     * Supprimer un client
     *
     * @param int $id id du client
     * @return boolean true si delete réussi, sinon false
     */
    public function supprimer($id)
    {
        return $this->db->delete('client', array('id' => $id));
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistrer une adresse.
     *
     * @param   array  tableau de donnée contenant les informations
     *à insérer dans la table
     *
     * @return  integer  Retourne l'id crée suite a l'insertion si
     *l'insertion a eu lieu sinon retourne -1
     */
    public function ajouter_adresse($data)
    {
        if( $this->db->insert('adresse', $data) )
        {
            return $this->db->insert_id();
        }
        else
        {
            return NULL;
        }
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère tous les clients
     *
     * @return  object  les informations des clients
     */
    public function recuperer_clients()
    {
        $this->db->select('client.*, a1.adresse AS adresse, a1.code_postal AS code_postal, a1.ville AS ville');
        $this->db->from('client');
        $this->db->join('adresse AS a1', 'a1.id = client.adresse', 'left');
        $query = $this->db->get();

        if($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    // -----------------------------------------------------------------------

    /**
     * Récupère un client
     *
     * @return  object  les informations du client
     */
    public function recuperer_client($id)
    {
        $this->db->select('client.*, client.id AS client, a1.adresse AS adresse, a1.complement AS complement, a1.code_postal AS code_postal, a1.ville AS ville, a1.pays AS pays, a2.adresse AS adresse_autre, a2.complement AS complement_autre, a2.code_postal AS code_postal_autre, a2.ville AS ville_autre, a2.pays AS pays_autre');
        $this->db->from('client');
        $this->db->join('adresse AS a1', 'a1.id = client.adresse', 'left');
        $this->db->join('adresse AS a2', 'a2.id = client.adresse_autre', 'left');
        $this->db->where('client.id', $id);
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
     * Récupère le nom d'un client
     *
     * @return  object  les informations du client
     */
    public function recuperer_client_name($id)
    {
        $this->db->select('id, nom, prenom');
        $this->db->from('client');
        $this->db->where('id', $id);
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
     * Récupère le nom d'un client
     *
     * @return  object  les informations du client
     */
    public function recuperer_adresses($id)
    {
        $this->db->select('a1.adresse AS adresse, a1.complement AS complement, a1.code_postal AS code_postal, a1.ville AS ville, a1.pays AS pays, a2.adresse AS adresse_autre, a2.complement AS complement_autre, a2.code_postal AS code_postal_autre, a2.ville AS ville_autre, a2.pays AS pays_autre');
        $this->db->from('client');
        $this->db->join('adresse AS a1', 'a1.id = client.adresse', 'left');
        $this->db->join('adresse AS a2', 'a2.id = client.adresse_autre', 'left');
        $this->db->where('client.id', $id);
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
     * Retourne le nombre de clients
     *
     * @return  int Le nombre de client trouvés
     */
    public function nombre_client()
    {
        $this->db->select('count(*) AS nombre');
        $this->db->from('client');
        $query = $this->db->get();

        if($query->num_rows() >= 1) {
            $row = $query->row_array();
            return (object) $row;
        } else {
            return false;
        }
    }


    public function liste_pays()
    {
        $this->db->select('id, nom_fr_fr');
        $this->db->order_by('nom_fr_fr', 'ASC');
        $query = $this->db->get('pays');

        if($query->num_rows() >= 1) {
            $pays = array();
            foreach( $query->result() AS $val )
            {
                $pays[$val->nom_fr_fr] = $val->nom_fr_fr;
            }
            return $pays;
        } else {
            return false;
        }
    }

    // -----------------------------------------------------------------------

    /**
     * Vérifier si une adresse existe déjà
     *
     * @param array $data informations de l'adresse
     * @return les informations de l'adresse si elle existe, false si elle n'existe pas
     */
    public function verifier_adresse($data)
    {
        $this->db->where(array('adresse' => $data['adresse'], 'code_postal' => $data['code_postal'], 'ville' => $data['ville'], 'pays' => $data['pays']));
        $query = $this->db->get('adresse');

        if($query->num_rows() >= 1) {
            $row = $query->row();
            return $row->id;
        } else {
            return FALSE;
        }
    }

    public function rechercher_client($term)
  {
      $this->db->like(array('prenom' => $term));
      $this->db->or_like(array('nom' => $term));
      $query = $this->db->get('client');

      if($query->num_rows() >= 1) {
          return $query->result();
      } else {
          return false;
      }
  }

}
