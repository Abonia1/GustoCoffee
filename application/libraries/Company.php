<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company{

	/**
     * Le super objet CodeIgniter
     *
     * @var object
     * @access public
     */
    public $CI;

    /**
     * Le modèle mention
     *
     * @var object
     * @access public
     */
    public $mention_model = 'mention_model';

    /**
     * Un tableau avec tous les regles
     *
     * @var array
     * @access public
     */
    public $rules;


    /**
     * Un tableau à 2 dimension avec tous les donnée relatif au mention
     *
     * @var array
     * @access public
     */
    public $mention;

 

    public function __construct($params)
    {
        $this->CI =& get_instance();

        $this->CI->config-> load( $params['maConfig'] , TRUE );
        $this->mention = config_item($params['maConfig']);

        $this->CI->config-> load( $params['validationRules'] , TRUE );
        $this->rules= config_item($params['validationRules']);

        $this->CI->load->model($params['model']);

        $this->target= $params['target'];
    }
    public function modifier()
    {
        $this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_rules($this->rules[$this->target]['modifier']);






        if( $this->CI->form_validation->run() !== FALSE )
        {
            foreach( $this->mention[$this->target]['modifier'] AS $key => $element )
            {
                if( !$this->CI->input->post($element) )
                {
                    $datas[$key] = NULL;
                }

                $datas[$key] = $this->CI->input->post($element);
            }

             $id = $this->CI->input->post($this->mention[$this->target]['modifier']['id']);

            switch ($this->target) {
                case 'mention':
                    if($this->CI->mention_model->modifier( $datas, $id))
                    {
                        $modification = TRUE;
                    }
                    break;
                    default:
                    $modification = FALSE;
                    break;
            }


            if( $modification===TRUE )
            {
                $this->CI->session->set_flashdata('success', 'Votre '.$this->target.' a bien été modifié');
                return TRUE;
            }
            else
            {
                $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
                return FALSE;
            }
        }
        
           

    }

}




