<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory {

	/**
     * Le super objet CodeIgniter
     *
     * @var object
     * @access public
     */
    public $CI;

    /**
     * Le modèle Client
     *
     * @var object
     * @access public
     */
    public $stock_model = 'stock_model';

    /**
     * Un tableau avec tous les regles
     *
     * @var array
     * @access public
     */
    public $rules;


    /**
     * Un tableau à 2 dimension avec tous les donnée relatif au client
     *
     * @var array
     * @access public
     */
    public $stock;

    // -----------------------------------------------------------------------

    /**
     * Class constructor
     */
    public function __construct($params)
    {
        $this->CI =& get_instance();
        $this->target= $params['target'];

        //var_dump($this->target);
        $this->CI->config-> load( $params['maConfig'] , TRUE );
        $this->CI->config-> load( $params['validationRules'] , TRUE );
        $this->CI->load->model($params['model']);
        $this->rules= config_item($params['validationRules']);
        $this->client = config_item($params['maConfig']);
    }

    // -----------------------------------------------------------------------

    /**
     * Enregistre les données d'un client.
     *
     * @return  boolean  TRUE si client a été enregistrer ou FALSE
     */

    public function ajouter()
    {
    	$this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_rules($this->rules[$this->target]['ajouter']);
        $config['upload_path']          = './assets/images/produit/';
        $config['allowed_types']        = 'jpg|png';
        $config['overwrite']            = FALSE;
        $config['max_size']             = 2048; // 2Mb
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;

        if( $this->CI->form_validation->run() !== FALSE )
        {
        	// foreach( $this->stock[$this->target]['ajouter'] AS $key => $element )
        	// {
        	//     if( !$this->CI->input->post($element) )
        	//     {
        	//         $datas[$key] = NULL;
        	//     }

        	//     $datas[$key] = $this->CI->input->post($element);
        	// }


        	// //Voir pour vérif si adresse == adresse_autre
        

        	// if( $this->CI->stock_model->ajouter($datas) )
        	// {
        	//     $this->CI->session->set_flashdata('success', $this->stock[$this->target]['success']);
        	//     return TRUE;
            // }
            $datas = array();
        
            $datas['id'] = $this->CI->input->post('product_id');
           // $datas['reference'] = $this->CI->input->post('reference');
            $datas['product'] = $this->CI->input->post('product');
            $datas['menu_type'] = $this->CI->input->post('menu');
            $datas['price'] = $this->CI->input->post('price');

                        /* Si l'upload fonctionne on ajoute en BD sinon on met à NULL */
                        $this->CI->load->library('upload', $config);
                        if( ! $this->CI->upload->do_upload('image') )
                        {
                            $datas['image'] = NULL;
            
                            // $this->CI->session->set_flashdata('error_bidon', 'Le champ Image est obligatoire (JPG, PNG, 1024px, 2Mo maximum)');
                            // return FALSE;
                        }
                        else
                        {
                            $datas['image'] = $this->CI->upload->data('file_name');
                        }
          

            
            
            /* J'enregistre la reservation et je retourne l'id de la reservation */
            if( $this->CI->stock_model->ajouter($datas) )
            {
                $this->CI->session->set_flashdata('success', 'Votre Stock a bien été modifié');
                return TRUE;
                //peut être voir pour supprimer la reservation précédemment enregistrée
            }


        	$this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        	return FALSE;
    	}

    	return FALSE;
    }

    
   
    /**
     * Modifier les données d'un client.
     *
     * @return  boolean  TRUE si client a été enregistrer ou FALSE
     */

    public function modifier($id)
    {
        $this->CI->load->helper(array('form'));
        $this->CI->load->library('form_validation');
        $this->CI->form_validation->set_rules($this->rules[$this->target]['modifier']);
        $config['upload_path']          = './assets/images/produit/';
        $config['allowed_types']        = 'jpg|png';
        $config['overwrite']            = FALSE;
        $config['max_size']             = 2048; // 2Mb
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;

        if( $this->CI->form_validation->run() !== FALSE )
        {
            //  foreach( $this->stock[$this->target]['modifier'] AS $key => $element )
            // {
            //     if( !$this->CI->input->post($element) )
            //     {
            //         $datas[$key] = NULL;
            //     }

            //     $datas[$key] = $this->CI->input->post($element);
            // }

            //  $id = $this->CI->input->post($this->stock[$this->target]['modifier']['id']);

            // switch ($this->target) {
            //     case 'stock':
            //         if($this->CI->stock_model->modifier( $datas, $id))
            //         {
            //             $modification = TRUE;
            //         }
            //         break;
            //         default:
            //         $modification = FALSE;
            //         break;
            // }


            // if( $modification===TRUE )
            // {
            //     $this->CI->session->set_flashdata('success', 'Votre stock  a bien été modifié');
            //     return TRUE;
            // }
            $datas = array();
        
            //$datas['id'] = $this->CI->input->post('product_id');
           // $datas['reference'] = $this->CI->input->post('reference');
            $datas['product'] = $this->CI->input->post('product');
            $datas['menu_type'] = $this->CI->input->post('menu');
            $datas['price'] = $this->CI->input->post('price');
             /* Si l'upload fonctionne on ajoute en BD sinon on met à NULL */
             $this->CI->load->library('upload', $config);
             if( ! $this->CI->upload->do_upload('image') )
             {
                 $datas['image'] = NULL;
 
                 // $this->CI->session->set_flashdata('error_bidon', 'Le champ Image est obligatoire (JPG, PNG, 1024px, 2Mo maximum)');
                 // return FALSE;
             }
             else
             {
                 $datas['image'] = $this->CI->upload->data('file_name');
             }


            
            
            /* J'enregistre la reservation et je retourne l'id de la reservation */
            if( $this->CI->stock_model->modifier($datas,$id) )
            {
                $this->CI->session->set_flashdata('success', 'Votre Stock a bien été modifié');
                return TRUE;
                //peut être voir pour supprimer la reservation précédemment enregistrée
            }

            $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
            return FALSE;
        }

        return FALSE;
    }


    public function supprimer($id)
    {
        if( $this->CI->stock_model->supprimer($id) )
        {
          $this->CI->stock_model->supprimer_stock($id);
         
          $this->CI->session->set_flashdata('success', 'Votre stock de produit a bien été supprimé');
          return TRUE;
        }

        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        return FALSE;
    }

}
