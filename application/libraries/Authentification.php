<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentification {

    /**
     * Le super objet CodeIgniter
     *
     * @var object
     * @access public
     */
    public $CI;

    /**
     * Le modèle Authentification
     *
     * @var object
     * @access public
     */
    public $authentification_model = 'authentification_model';

    /**
     * Un tableau avec tous les rôles utilisateur où la clé est le niveau (int) et la valeur est le nom du rôle (string)
     *
     * @var array
     * @access public
     */
    public $roles;

    /**
     * Un tableau avec tous les champs à sélectionner dans une table
     *
     * @var array
     * @access public
     */
    public $champs;

    /**
     * Un tableau avec le champ identifiant pour chaque type
     *
     * @var array
     * @access public
     */
    public $where;

    // --------------------------------------------------------------

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->CI =& get_instance();

        $this->CI->load->model('authentification_model');

        $this->roles = config_item('levels_and_roles');
    }

    // -----------------------------------------------------------------------

    /**
     * Vérifie si la connexion d'un utilisateur est autorisée.
     *
     * @param   string  Un type d'utilisateur (client, commercial ou administrateur)
     * @return  boolean  TRUE si utilisateur connu ou FALSE
     */
    public function connexion( $type )
    {
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_rules( config_item('login_rules') );
        $this->champs = config_item('champs');
        $this->where = config_item('where');

        $identifiant  = $this->CI->input->post('identifiant');
        $mot_de_passe = $this->CI->input->post('mot_de_passe');

        if( ! is_null( $identifiant ) && ! is_null( $mot_de_passe ) )
        {
            if( $this->CI->form_validation->run() !== FALSE )
            {
                if( $donnees_utilisateur = $this->CI->authentification_model->verifier_identifiant( $identifiant, $type, $this->champs[$type], $this->where[$type] ) )
                {
                    if( $this->CI->authentification_model->verifier_mot_de_passe( $mot_de_passe, $donnees_utilisateur->mot_de_passe ) )
                    {
                        $session = $donnees_utilisateur;
                        $session->adresse_ip = $this->CI->input->server('REMOTE_ADDR');

                        $this->CI->session->set_userdata($type, $session);

                        if( !$this->CI->session->has_userdata('panier') )
                            $this->CI->session->set_userdata('panier');

                        $this->CI->session->set_flashdata('success', 'Vous êtes maintenant connecté !');

                        return TRUE;
                    }

                    $this->CI->session->set_flashdata('error', 'Votre mot de passe est incorrect');
                    return FALSE;
                }

                $this->CI->session->set_flashdata('error', 'Cet identifiant est inconnu');
                return FALSE;
            }

            $this->CI->session->set_flashdata('error', 'Validation formulaire incorrecte');
            return FALSE;
        }

        $this->CI->session->set_flashdata('error', 'Veuillez entrer un identifiant et un mot de passe');
        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Vérifier si un utilisateur est déjà connecté
     * On vérifie l'existence d'une session utilisateur et on compare l'adresse IP en session à l'actuelle
     *
     * @return  boolean  TRUE si l'utilisateur est connecté sinon FALSE
     */
    public function est_connecte( $type )
    {
        if( !empty( $this->CI->session->userdata( $type ) ) )
        {
            if( $this->CI->session->userdata( $type )->adresse_ip == $this->CI->input->server('REMOTE_ADDR') )
            {
                return TRUE;
            }

            return FALSE;
        }

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Déconnecte un utilisateur
     *
     * @return  boolean  TRUE si l'utilisateur est déconnecté sinon FALSE
     */
    public function deconnexion($type)
    {
        if( !empty( $this->CI->session->$type ) )
        {
            $this->CI->session->unset_userdata(array($type, 'panier'));
            return TRUE;
        }

        return FALSE;
    }
}
