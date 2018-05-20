<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Priorite extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $params=array(
            'maConfig'          => 'ma_config/parameter',
            'validationRules'   => 'form_validation/parameter',
            'model'             => 'priorite_model',
            'target'            => 'priorite'
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

        $priorites = $this->priorite_model->priorites();

        $content = $this->load->view('admin/priorite/liste', array('priorites' => $priorites), TRUE);
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
            redirect('/admin/priorite/liste');
            exit;
        }

        $this->load->helper('form');

        $content = $this->load->view('admin/priorite/ajouter', array(), TRUE);
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
            redirect('/admin/priorite/liste');
            exit;
        }

        $this->load->helper('form');
        $priorite = $this->priorite_model->priorite($id);

        $content = $this->load->view('admin/priorite/modifier',array('priorite' => $priorite) , TRUE);
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
            redirect('/admin/priorite/liste');
            exit;
        }
    }

}
