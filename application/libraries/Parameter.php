<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter {

	/**
     * Le super objet CodeIgniter
     *
     * @var object
     * @access public
     */
    public $CI;

    /**
     * Un tableau avec tous les regles
     *
     * @var array
     * @access public
     */
    public $rules;


    /**
     * Un tableau à 2 dimension avec tous les donnée relatif au parametre
     *
     * @var array
     * @access public
     */
    public $parameter;

    // -----------------------------------------------------------------------

    /**
     * Class constructor
     */
    public function __construct($params)
    {
        $this->CI =& get_instance();

        $this->CI->config-> load( $params['maConfig'] , TRUE );
        $this->parameter = config_item($params['maConfig']);

        $this->CI->config-> load( $params['validationRules'] , TRUE );
        $this->rules= config_item($params['validationRules']);

        $this->CI->load->model($params['model']);
        $this->CI->load->model('produit_model');
        $this->target= $params['target'];
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistre un parametre.
     *
     * @return  boolean  TRUE si catégorie a été enregistrée ou FALSE
     */
    public function ajouter()
    {
    	$this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');

        $this->CI->form_validation->set_rules($this->rules[$this->target]['ajouter']);

        $config['upload_path']          = './assets/images/'.$this->target.'/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 2048; // 2Mb
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;

        $this->CI->load->library('upload', $config);

        if( $this->CI->form_validation->run() !== FALSE )
        {
        	foreach( $this->parameter[$this->target]['ajouter'] AS $key => $element )
        	{
        	    if( !$this->CI->input->post($element) )
        	    {
        	        $datas[$key] = NULL;
        	    }

        	    $datas[$key] = $this->CI->input->post($element);
        	}

        	/* Si l'upload fonctionne on ajoute en BD sinon on met à NULL */
        	if( ! $this->CI->upload->do_upload('image') )
        	{
                $datas['image'] = NULL;
                $this->CI->session->set_flashdata('error', 'Votre image doit être au format JPG ou PNG, sa taille doit être 1024 x 1024 px maximum et son poids 2Mb maximum');
                return FALSE;
        	}
        	else
        	{
        	    $datas['image'] = $this->CI->upload->data('file_name');
        	}


        	switch ($this->target) {
                case 'priorite':
                    if($this->CI->priorite_model->ajouter($datas))
                    {
                        $enregistrement = TRUE;
                    }
                    break;

                case 'utilisation':
                    if($this->CI->utilisation_model->ajouter($datas))
                    {
                        $enregistrement = TRUE;
                    }
                    break;

                default:
                    $enregistrement = FALSE;
                    break;
            }


        	if( $enregistrement )
        	{
        	    $this->CI->session->set_flashdata('success', 'Votre '.$this->target.' a bien été enregistré');
        	    return TRUE;
        	}

        	$this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        	return FALSE;
    	}

    	return FALSE;
    }


    // -----------------------------------------------------------------------

    /**
     * Modifier un parametre.
     *
     * @return  boolean  TRUE si surface a été supprimée ou FALSE
     */
    public function modifier()
    {
        $this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_rules($this->rules[$this->target]['modifier']);

        $config['upload_path']          = './assets/images/'.$this->target.'/';
        $config['allowed_types']        = 'jpg|png';
        $config['overwrite']            = FALSE;
        $config['max_size']             = 2048; // 2Mb
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;

        $this->CI->load->library('upload', $config);

        if( $this->CI->form_validation->run() !== FALSE )
        {
            foreach( $this->parameter[$this->target]['ajouter'] AS $key => $element )
            {
                if( !$this->CI->input->post($element) )
                {
                    $datas[$key] = NULL;
                }

                $datas[$key] = $this->CI->input->post($element);
            }



            /* On essaye d'upload l'image, si c'est OK on supprime l'ancienne sinon on la garde */
            if($this->CI->upload->do_upload('image') )
            {
                unlink( './assets/images/'.$this->target.'/'.$this->CI->input->post($this->parameter[$this->target]['modifier']['ancienne_image']) );
                $datas['image'] = $this->CI->upload->data('file_name');
            }
            else
            {
                $datas['image'] = $this->CI->input->post($this->parameter[$this->target]['modifier']['ancienne_image']);
            }


            $id = $this->CI->input->post($this->parameter[$this->target]['modifier']['id']);

            switch ($this->target) {
                case 'priorite':
                    if($this->CI->priorite_model->modifier( $datas, $id))
                    {
                        $modification = TRUE;
                    }
                    break;

                case 'utilisation':
                    if($this->CI->utilisation_model->modifier($datas, $id))
                    {
                        $modification = TRUE;
                    }
                    break;

                default:
                    $modification = FALSE;
                    break;
            }


            if( $modification )
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

        return FALSE;
    }

    // -----------------------------------------------------------------------

    /**
     * Supprimer un parametre.
     *
     * @return  boolean  TRUE si le parametre a été supprimée ou FALSE
     */
    public function supprimer($id)
    {
        switch ($this->target) {
            case 'priorite':
                $priorite = $this->CI->priorite_model->priorite($id);

                if($this->CI->priorite_model->supprimer($id))
                {
                    unlink( './assets/images/'.$this->target.'/'.$priorite->image );
                    $this->CI->produit_model->supprimer_priorite($id);
                    $suppression = TRUE;
                }
                break;

          case 'utilisation':
              $utilisation = $this->CI->utilisation_model->utilisation($id);

              if($this->CI->utilisation_model->supprimer($id))
              {
                  unlink( './assets/images/'.$this->target.'/'.$utilisation->image );
                  $this->CI->produit_model->supprimer_utilisation($id);
                  $suppression = TRUE;
              }
              break;

          default:
              $suppression = FALSE;
              break;
        }

        if( $suppression )
        {
            $this->CI->session->set_flashdata('success', 'Votre '.$this->target.' a bien été supprimé');
            return TRUE;
        }

        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        return FALSE;
    }


}
