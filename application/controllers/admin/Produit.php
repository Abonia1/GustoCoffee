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

        $produit = $this->produit_model->produit($id);
        
        
        $content = $this->load->view('admin/produit/modifier', array('produit' => $produit), TRUE);
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
        

        $content = $this->load->view('admin/produit/detail', array('produit' => $produit), TRUE);
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

}





?>
