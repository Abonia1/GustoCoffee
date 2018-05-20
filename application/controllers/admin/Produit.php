<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('product');
        $this->load->model('produit_model');
        $this->output->enable_profiler(FALSE);
    }

    public function liste()
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        $produits = $this->produit_model->produits();

        $content = $this->load->view('admin/produit/liste', array('produits' => $produits), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }


    public function ajouter()
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        $this->load->helper(array('form', 'text'));

        if( $this->product->ajouter() )
        {
            redirect('/admin/produit/liste');
            exit;
        }

        $this->load->model('utilisation_model');
        $this->load->model('priorite_model');

        $priorites = $this->priorite_model->priorites();
        $utilisations = $this->utilisation_model->utilisations();

        $content = $this->load->view('admin/produit/ajouter', array('priorites' => $priorites, 'utilisations' => $utilisations), TRUE);
        $this->load->view('admin/template/template', array('content' => $content, 'js_files' => array('produit.js')));
    }


     public function modifier($id)
     {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->product->modifier($id) )
        {
          redirect('/admin/produit/liste');
          exit;
        }

        $this->load->helper('form');

        $this->load->model( array('utilisation_model', 'priorite_model') );

        $produit = $this->produit_model->produit($id);
        $priorites = $this->priorite_model->priorites();
        $utilisations = $this->utilisation_model->utilisations();
        $priorites_produit = $this->produit_model->produit_priorite_liste($id);
        $utilisations_produit = $this->produit_model->produit_utilisation_liste($id);
        $caracteristiques_produit = $this->produit_model->produit_caracteristique_liste($id);
        
        $content = $this->load->view('admin/produit/modifier', array('produit' => $produit, 'priorites' => $priorites, 'priorites_produit' => $priorites_produit, 'utilisations' => $utilisations, 'utilisations_produit' => $utilisations_produit, 'caracteristiques_produit' => $caracteristiques_produit), TRUE);
        $this->load->view('admin/template/template', array('content' => $content, 'js_files' => array('produit.js')));

     }

    public function detail($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        $produit = $this->produit_model->produit($id);
        $priorites_produit = $this->produit_model->produit_priorite($id);
        $utilisations_produit = $this->produit_model->produit_utilisation($id);
        $caracteristiques_produit = $this->produit_model->caracteristique_produit($id);

        $content = $this->load->view('admin/produit/detail', array('produit' => $produit, 'priorites' => $priorites_produit, 'utilisations' => $utilisations_produit, 'caracteristiques' => $caracteristiques_produit), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));

    }


    public function supprimer($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->product->supprimer($id) )
        {
            redirect('/admin/produit/liste');
            exit;
        }
    }



    public function charger_utilisation_ajax()
    {
      $this->load->model('utilisation_model');

      $utilisations = $this->utilisation_model->utilisations();
      foreach ($utilisations as $key => $utilisation)
      {
        $data.='<option value="'.$utilisation->id.'">'.$utilisation->utilisation.'</option>';
      }

      echo $data;
      // $utilisations='<option value="1">Vaporiser</option>'.'<option value="2">Frotter</option>'.'<option value="3">Rincer</option>';
      // echo $utilisations;
    }

}





?>
