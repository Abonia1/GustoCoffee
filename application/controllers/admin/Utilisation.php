<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $params=array(
            'maConfig'          => 'ma_config/parameter',
            'validationRules'   => 'form_validation/parameter',
            'model'             => 'utilisation_model',
            'target'            => 'utilisation'
        );
        $this->load->library('parameter', $params);
        $this->output->enable_profiler(FALSE);
    }

    public function liste()
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        $utilisations = $this->utilisation_model->utilisations();

        $content = $this->load->view('admin/utilisation/liste', array('utilisations' => $utilisations), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }


    public function ajouter()
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->parameter->ajouter() )
        {
            redirect('/admin/utilisation/liste');
            exit;
        }

        $this->load->helper('form');

        $content = $this->load->view('admin/utilisation/ajouter', array(), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }



    public function modifier($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->parameter->modifier() )
        {
            redirect('/admin/utilisation/liste');
            exit;
        }

        $this->load->helper('form');
        $utilisation = $this->utilisation_model->utilisation($id);

        $content = $this->load->view('admin/utilisation/modifier',array('utilisation' => $utilisation) , TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }



    public function supprimer($id)
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        if( $this->parameter->supprimer($id) )
        {
            redirect('/admin/utilisation/liste');
            exit;
        }
    }

}
