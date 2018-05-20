<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $params=array(
            'maConfig'          => 'ma_config/stock',
            'validationRules'   => 'form_validation/stock',
            'model'             => 'stock_model',
            'target'            => 'stock'
        );
        $this->load->library('inventory', $params);
        $this->output->enable_profiler(FALSE);
    }

    public function liste()
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        $stocks = $this->stock_model->stocks();

        $content = $this->load->view('admin/stock/liste', array('stocks' => $stocks), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }


    public function ajouter()
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->inventory->ajouter() )
        {
            redirect('/admin/stock/liste');
            exit;
        }

        $this->load->helper('form');

        $content = $this->load->view('admin/stock/ajouter', array(), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }



    public function modifier($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->inventory->modifier($id) )
        {
            redirect('/admin/stock/liste');
            exit;
        }

        $this->load->helper('form');
        $stock = $this->stock_model->stock($id);

        $content = $this->load->view('admin/stock/modifier',array('stock' => $stock) , TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }



    public function supprimer($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->stock->supprimer($id) )
        {
            redirect('/admin/stock/liste');
            exit;
        }
    }

}
