<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mention extends CI_Controller {

    public function __construct()
    {
        
        parent::__construct();
        $params=array(
            'maConfig'          => 'ma_config/mention',
            'validationRules'   => 'form_validation/mention',
            'model'             => 'mention_model',
            'target'            => 'mention'
        );
        $this->load->library('company', $params);
        $this->output->enable_profiler(FALSE);
    }



	
	public function liste()
    {
        if( !$this->authentification->est_connecte('administrateur') )
        {
            redirect('/admin/connexion');
            exit;
        }

        $mentions = $this->mention_model->mentions();

        $content = $this->load->view('admin/mention/liste', array('mentions' => $mentions), TRUE);
        $this->load->view('admin/template/template', array('content' => $content));
    }




	public function modifier($id)
	{
	    if( !$this->authentification->est_connecte('administrateur') )
	    {
	        redirect('/admin/connexion');
	        exit;
	    }

	   

	    if( $this->company->modifier() )
	    {
	        redirect('/admin/mention/liste');
	        exit;
	    }


	    //for to show modification form
	    $this->load->helper('form');


        $mention = $this->mention_model->mention($id);
	   

	    $content = $this->load->view('admin/mention/modifier',array('mention' => $mention) , TRUE);
	    $this->load->view('admin/template/template', array('content' => $content));
	}
}