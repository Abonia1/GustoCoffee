<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('reservationorder');
        $this->load->model('reservation_model');
        $this->output->enable_profiler(FALSE);
    }


    /*
     * Liste des reservations
     */
    public function liste($id=NULL)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if($id != NULL)
        {
            $reservations = $this->reservation_model->reservation_liste($id);
        }
        else
        {
          $reservations = $this->reservation_model->reservations();
        }


        $content = $this->load->view('admin/reservation/liste', array('reservations' => $reservations), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }


    /*
     * Ajouter une reservation
     */
    public function ajouter($id=0)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->reservationorder->ajouter() )
        {
            redirect('/admin/reservation/liste');
            exit;
        }
        //$id = $this->input->post('id_client');
        if($id !=0)
        {
          $this->load->model('client_model');
          $data=$this->client_model->recuperer_client_name($id);
        }
        else {
          $data=NULL;
        }

        $this->load->helper('form');

        $content = $this->load->view('admin/reservation/ajouter', array('data'=>$data), TRUE);
        $this->load->view('admin/template/template', array( 'content' => $content, 'js_files' => array('jquery-ui.min.js', 'reservation.js') ));

    }


    /*
     * Modifier une reservation
     */
    public function modifier($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->reservationorder->modifier($id) )
        {
            redirect('/admin/reservation/liste');
            exit;
        }

        $this->load->helper('form');

        $reservation = $this->reservation_model->reservation($id);
        //$produits = $this->reservation_model->reservation_produit($id);

        $content = $this->load->view('admin/reservation/modifier', array('reservation' => $reservation), TRUE);
        $this->load->view('admin/template/template', array( 'content' => $content, 'js_files' => array('jquery-ui.min.js', 'reservation_modifier.js') ));
    }


    // /*
    //  * Recherche produit autocomplétion Ajax
    //  */
    // public function recherche_produit_ajax()
    // {
    //     if($this->input->get('recherche') != NULL) {
    //         $this->load->model('produit_model');
    //         $produits = $this->produit_model->rechercher_produit($this->input->get('recherche'));

    //         $data = array();

    //         if(is_array($produits) && !empty($produits)) {
    //             foreach($produits AS $key => $produit) {
    //                 $data[$key]["label"] = $produit->nom;
    //                 $data[$key]["value"] = $produit->nom;
 
    //             }
    //         } else {
    //             $data['label'] = "Aucun service n'a été trouvé";
    //         }

    //         echo json_encode( $data );
    //     }
    // }


    /*
     * Recherche client autocomplétion Ajax
     */
    public function recherche_client_ajax()
    {
        if($this->input->get('term') != NULL) {
            $this->load->model('client_model');
            $clients = $this->client_model->rechercher_client($this->input->get('term'));

            $data = array();

            if(is_array($clients) && !empty($clients)) {
                foreach($clients AS $key => $client) {
                    $data[$key]["label"] = $client->prenom.' '.$client->nom;
                    $data[$key]["value"] = $client->prenom.' '.$client->nom;
                    $data[$key]["id"] = $client->id;
                    $data[$key]["prenom"] = $client->prenom;
                    $data[$key]["nom"] = $client->nom;
                }
            } else {
                $data['label'] = "Aucun client n'a été trouvé";
            }

            echo json_encode( $data );
        }
    }


    /*
     * Détail reservation
     */
    public function detail($id)
    {
       if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        $reservation = $this->reservation_model->reservation($id);
        //$produits = $this->reservation_model->reservation_produit($id);

        $content = $this->load->view('admin/reservation/detail', array('reservation' => $reservation), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }



    /*
     * Supprimer une reservation
     */
    public function supprimer($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->reservationorder->supprimer($id) )
        {
            redirect('/admin/reservation/liste');
            exit;
        }
    }
}
