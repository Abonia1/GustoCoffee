<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer {

	/**
     * Le super objet CodeIgniter
     *
     * @var object
     * @access public
     */
    public $CI;

    /**
     * Le modèle Client
     *
     * @var object
     * @access public
     */
    public $client_model = 'client_model';

    /**
     * Un tableau avec tous les regles
     *
     * @var array
     * @access public
     */
    public $rules;


    /**
     * Un tableau à 2 dimension avec tous les donnée relatif au client
     *
     * @var array
     * @access public
     */
    public $client;

    // -----------------------------------------------------------------------

    /**
     * Class constructor
     */
    public function __construct($params)
    {
        $this->CI =& get_instance();
        $this->target= $params['target'];

        //var_dump($this->target);
        $this->CI->config-> load( $params['maConfig'] , TRUE );
        $this->CI->config-> load( $params['validationRules'] , TRUE );
        $this->CI->load->model($params['model']);
        $this->rules= config_item($params['validationRules']);
        $this->client = config_item($params['maConfig']);
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistre les données d'un client.
     *
     * @return  boolean  TRUE si client a été enregistrer ou FALSE
     */

    public function ajouter()
    {
    	$this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_rules($this->rules[$this->target]['ajouter_rules']);

        if( $this->CI->form_validation->run() !== FALSE )
        {
            if(!$this->CI->input->post('accept')){
                echo "<script type='text/javascript'>window.alert('Veuillez lire et accepter nos termes et conditions.');</script>";
                //$this->CI->session->keep_flashdata('message', 'Veuillez lire et accepter nos termes et conditions.');

                return FALSE;
            }
        	foreach( $this->client[$this->target]['champs_client'] AS $key => $element )
        	{
        	    if( !$this->CI->input->post($element) )
        	    {
        	        $datas[$key] = NULL;
        	    }

        	    $datas[$key] = $this->CI->input->post($element);
        	}


        	//Voir pour vérif si adresse == adresse_autre
        	$id_adresse = $this->ajouter_adresse( $this->client[$this->target]['champs_adresse'] );


        	$datas['adresse'] = $id_adresse;
        	$datas['adresse_autre'] = NULL;
        	$datas['mot_de_passe'] = password_hash( $this->CI->input->post('mot_de_passe'), PASSWORD_BCRYPT);

        	$datas['statut'] = 1;
        	$datas['date_creation'] = date('Y-m-d H:i:s');
        	$datas['date_modification'] = date('Y-m-d H:i:s');

        	if( $this->CI->client_model->ajouter($datas) )
        	{
        	    $this->CI->session->set_flashdata('success', $this->client[$this->target]['success']);
        	    return TRUE;
        	}

        	$this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        	return FALSE;
    	}

    	return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Ajoute une adresse
     *
     * @param array Une liste de champs adresse
     * @return int Identifiant de l'adresse insérée ou NULL
     */
    public function ajouter_adresse(array $adresse)
    {
        if( !empty( $this->CI->input->post( $adresse['adresse']) )
            && !empty( $this->CI->input->post( $adresse['code_postal'] ) )
            && !empty( $this->CI->input->post( $adresse['ville'] ) )
            && !empty( $this->CI->input->post( $adresse['pays'] ) )
        )
        {
            $datas = array(
                'adresse' => $this->CI->input->post( $adresse['adresse'] ),
                'complement' => $this->CI->input->post( $adresse['complement'] ),
                'code_postal' => $this->CI->input->post( $adresse['code_postal'] ),
                'ville' => $this->CI->input->post( $adresse['ville'] ),
                'pays' => $this->CI->input->post( $adresse['pays'] )
            );

            $id_adresse = $this->CI->client_model->ajouter_adresse($datas);
        }
        else
        {
            $id_adresse = NULL;
        }

        return $id_adresse;
    }

    // -----------------------------------------------------------------------

    /**
     * Vérifier une adresse
     *
     * @param array Une liste de champs adresse
     * @return int Identifiant de l'adresse insérée ou NULL
     */
    public function verifier_adresse(array $adresse)
    {
        if( !empty( $this->CI->input->post( $adresse['adresse']) )
            && !empty( $this->CI->input->post( $adresse['code_postal'] ) )
            && !empty( $this->CI->input->post( $adresse['ville'] ) )
            && !empty( $this->CI->input->post( $adresse['pays'] ) )
            )
        {
            $datas = array(
                'adresse' => $this->CI->input->post( $adresse['adresse'] ),
                'code_postal' => $this->CI->input->post( $adresse['code_postal'] ),
                'ville' => $this->CI->input->post( $adresse['ville'] ),
                'pays' => $this->CI->input->post( $adresse['pays'] )
            );

            $id_adresse = $this->CI->client_model->verifier_adresse($datas);
        }
        else
        {
            $id_adresse = NULL;
        }

        return $id_adresse;
    }

    // -----------------------------------------------------------------------

    /**
     * Modifier les données d'un client.
     *
     * @return  boolean  TRUE si client a été enregistrer ou FALSE
     */

    public function modifier_client($id)
    {
        $this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_rules($this->rules[$this->target]['modifier_rules']);

        if( $this->CI->form_validation->run() !== FALSE )
        {
            foreach( $this->client[$this->target]['champs_client_modifier'] AS $key => $element )
            {
                if( $key != 'mot_de_passe' && !$this->CI->input->post($element) )
                {
                    $datas[$key] = NULL;
                }
                if(!empty($this->CI->input->post('mot_de_passe')))
                {
                  $datas['mot_de_passe'] = password_hash( $this->CI->input->post('mot_de_passe'), PASSWORD_BCRYPT);
                }
                if( $key != 'mot_de_passe')
                {
                  $datas[$key] = $this->CI->input->post($element);
                }

            }


            /* Si l'adresse n'existe pas on l'ajoute sinon on récupère son ID */
            if( !$id_adresse = $this->verifier_adresse($this->client[$this->target]['champs_adresse']) )
            {
                $id_adresse = $this->ajouter_adresse( $this->client[$this->target]['champs_adresse'] );
            }

            /* Idem avec l'adresse autre */
            if( !$id_adresse_autre = $this->verifier_adresse($this->client[$this->target]['champs_adresse_autre']) )
            {
                $id_adresse_autre = $this->ajouter_adresse( $this->client[$this->target]['champs_adresse_autre'] );
            }


            /* Si le mot de passe est vide on ne le modifie pas */
            if( !empty($this->CI->input->post('mot_de_passe')) && !empty($this->CI->input->post('mot_de_passe_check')) )
            {
                $datas['mot_de_passe'] = password_hash( $this->CI->input->post('mot_de_passe'), PASSWORD_BCRYPT);
            }


            $date = date('Y-m-d H:i:s');

            $datas['adresse'] = $id_adresse;
            $datas['adresse_autre'] = $id_adresse_autre;
            $datas['date_modification'] = $date;

            if( $this->CI->client_model->modifier($datas, $id) )
            {
                $this->CI->session->set_flashdata('success', 'Votre client a bien été modifié');
                return TRUE;
            }

            $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
            return FALSE;
        }

        return FALSE;
    }


    public function supprimer_client($id)
    {
        if( $this->CI->client_model->supprimer($id) )
        {
          $this->CI->client_model->supprimer_produit_caracteristique($id);
          $this->CI->client_model->supprimer_produit_priorite($id);
          $this->CI->client_model->supprimer_produit_utilisation($id);
          $this->CI->session->set_flashdata('success', 'Votre client a bien été supprimé');
          return TRUE;
        }

        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        return FALSE;
    }

}
