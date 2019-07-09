<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commande extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('order');
        $this->load->model('commande_model');
        $this->output->enable_profiler(FALSE);
    }


    /*
     * Liste des commandes
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
            $commandes = $this->commande_model->commande_liste($id);
        }
        else
        {
          $commandes = $this->commande_model->commandes();
        }


        $content = $this->load->view('admin/commande/liste', array('commandes' => $commandes), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }


    /*
     * Ajouter une commande
     */
    public function ajouter($id=0)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->order->ajouter() )
        {
            redirect('/admin/commande/liste');
            exit;
        }
        if($id !=0)
        {
          $this->load->model('client_model');
          $data=$this->client_model->recuperer_client_name($id);
        }
        else {
          $data=NULL;
        }

        $this->load->helper('form');

        $content = $this->load->view('admin/commande/ajouter', array('data'=>$data), TRUE);
        $this->load->view('admin/template/template', array( 'content' => $content, 'js_files' => array('jquery-ui.min.js', 'commande.js') ));

    }


    /*
     * Modifier une commande
     */
    public function modifier($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->order->modifier($id) )
        {
            redirect('/admin/commande/liste');
            exit;
        }

        $this->load->helper('form');

        $commande = $this->commande_model->commande($id);
        $produits = $this->commande_model->commande_produit($id);

        $content = $this->load->view('admin/commande/modifier', array('commande' => $commande, 'produits' => $produits), TRUE);
        $this->load->view('admin/template/template', array( 'content' => $content, 'js_files' => array('jquery-ui.min.js', 'commande_modifier.js') ));
    }


    /*
     * Recherche produit autocomplétion Ajax
     */
    public function recherche_produit_ajax()
    {
        if($this->input->get('term') != NULL) {
            $this->load->model('produit_model');
            $produits = $this->produit_model->rechercher_produit($this->input->get('term'));

            $data = array();

            if(is_array($produits) && !empty($produits)) {
                foreach($produits AS $key => $produit) {
                    $data[$key]["label"] = $produit->nom;
                    $data[$key]["value"] = $produit->nom;
                    $data[$key]["prix"] = $produit->prix_ht;
                    $data[$key]["tva"] = $produit->tva;
                    $data[$key]["remise"] = $produit->remise;
                    $data[$key]["id"] = $produit->id;
                }
            } else {
                $data['label'] = "Aucun produit n'a été trouvé";
            }

            echo json_encode( $data );
        }
    }


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
     * Détail commande
     */
    public function detail($id)
    {
       if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        $commande = $this->commande_model->commande($id);
        $produits = $this->commande_model->commande_produit($id);

        $content = $this->load->view('admin/commande/detail', array('commande' => $commande, 'produits' => $produits), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }



    /*
     * Supprimer une commande
     */
    public function supprimer($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->order->supprimer($id) )
        {
            redirect('/admin/commande/liste');
            exit;
        }
    }
}
