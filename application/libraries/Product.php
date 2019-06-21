<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product {

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
     * Un tableau à 2 dimension avec tous les donnée relatif au client
     *
     * @var array
     * @access public
     */
    public $produit;

    // -----------------------------------------------------------------------

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config-> load( 'form_validation/produit' , TRUE );
        $this->rules= config_item('form_validation/produit');
        $this->CI->load->model('produit_model');
    }



    // -----------------------------------------------------------------------

    /**
     * Ajoute un produit et ses attributs
     *
     * @return  boolean  TRUE si tout a été inséré correctement sinon FALSE
     */
    public function ajouter()
    {
    	$this->CI->load->helper(array('form', 'text'));
        $this->CI->load->library('form_validation');

        $this->CI->form_validation->set_rules($this->rules['ajouter']);

        $config['upload_path']          = './assets/images/produit/';
        $config['allowed_types']        = 'jpg|png';
        $config['overwrite']            = FALSE;
        $config['max_size']             = 2048; // 2Mb
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;

        $config2['upload_path']          = './assets/images/produit/accueil/';
        $config2['allowed_types']        = 'jpg|png';
        $config2['overwrite']            = FALSE;
        $config2['max_size']             = 2048; // 2Mb
        $config2['max_width']            = 1024;
        $config2['max_height']           = 1024;

        $config4['upload_path']          = './assets/images/produit/header/';
        $config4['allowed_types']        = 'jpg|png';
        $config4['overwrite']            = FALSE;
        $config4['max_size']             = 2048; // 2Mb
        $config4['max_width']            = 1024;
        $config4['max_height']           = 1024;

        $config3['upload_path']   = './assets/fiche_technique/';
        $config3['allowed_types'] = 'pdf';
        $config3['overwrite']      = FALSE;
        $config3['max_size']      = 2048; // 2Mb
        $config3['max_width']     = 1024;
        $config3['max_height']    = 1024;

        if( $this->CI->form_validation->run() !== FALSE )
        {
            $datas = array();


            $datas['nom'] = $this->CI->input->post('nom');

            $datas['description_courte'] = $this->CI->input->post('description_courte');
            $datas['description_longue'] = $this->CI->input->post('description_longue');

            /* Si l'upload fonctionne on ajoute en BD sinon on met à NULL */
            $this->CI->load->library('upload', $config);
            if( ! $this->CI->upload->do_upload('bidon') )
            {
                $datas['bidon'] = NULL;

                // $this->CI->session->set_flashdata('error_bidon', 'Le champ Image est obligatoire (JPG, PNG, 1024px, 2Mo maximum)');
                // return FALSE;
            }
            else
            {
                $datas['bidon'] = $this->CI->upload->data('file_name');
            }

            /* Si l'upload fonctionne on ajoute en BD sinon on met à NULL */
            $this->CI->upload->initialize($config2);
            if( ! $this->CI->upload->do_upload('image') )
            {
                $datas['image'] = NULL;

                // $this->CI->session->set_flashdata('error_image', 'Le champ Image est obligatoire (JPG, PNG, 1024px, 2Mo maximum)');
                // return FALSE;
            }
            else
            {
                $datas['image'] = $this->CI->upload->data('file_name');
            }

            /* Si l'upload fonctionne on ajoute en BD sinon on met à NULL */
            $this->CI->upload->initialize($config4);
            if( ! $this->CI->upload->do_upload('image_header') )
            {
                $datas['image_header'] = NULL;

                // $this->CI->session->set_flashdata('error_image_header', 'Le champ Image est obligatoire (JPG, PNG, 1024px, 2Mo maximum)');
                // return FALSE;
            }
            else
            {
                $datas['image_header'] = $this->CI->upload->data('file_name');
            }

            /* Si l'upload fonctionne on ajoute en BD sinon on met à NULL */
            $this->CI->upload->initialize($config3);
            if( ! $this->CI->upload->do_upload('fiche_tech') )
            {
                $datas['fiche_tech'] = NULL;

                // $this->CI->session->set_flashdata('error_fiche_tech', 'Le champ fiche technique est obligatoire (PDF, 2Mo maximum)');
                // return FALSE;
            }
            else
            {
                $datas['fiche_tech'] = $this->CI->upload->data('file_name');
            }

            /* J'enregistre le produit et je retourne l'id du produit */
            if( $id_produit = $this->CI->produit_model->ajouter($datas) )
            {
                /* Ensuite je récupère la liste des priorité et je peux insérer toutes mes priorité en base */
                if( is_array( $this->CI->input->post('priorite') ) )
                {
                    $priorites = array();

                    foreach( $this->CI->input->post('priorite') AS $key => $val )
                    {
                        $priorites[] = array(
                            'produit' => $id_produit,
                            'priorite' => $this->CI->input->post('priorite')[$key],
                        );
                    }

                    if( !$this->CI->produit_model->ajouter_produit_priorite($priorites) )
                    {
                        $this->CI->produit_model->supprimer($id_produit);
                        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite votre produit n\'a pas pu être enregistré, veuillez réessayer ultérieurement');
                        return FALSE;
                    }
                }



                /* Ensuite je récupère la liste des caracteristique et je peux les insérer en base */
                if( is_array( $this->CI->input->post('caracteristique') ) )
                {
                    $caracteristiques = array();

                    foreach( $this->CI->input->post('caracteristique') AS $key => $val )
                    {
                        $caracteristiques[] = array(
                            'produit' => $id_produit,
                            'caracteristique' => $this->CI->input->post('caracteristique')[$key]
                        );
                    }

                    if( !$this->CI->produit_model->ajouter_produit_caracteristique($caracteristiques) )
                    {
                        $this->CI->produit_model->supprimer($id_produit);

                        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite votre produit n\'a pas pu être enregistré, veuillez réessayer ultérieurement');
                        return FALSE;
                    }
                }



                /* Ensuite je récupère la liste des utilisations et je peux les insérer en base */
                if( is_array( $this->CI->input->post('utilisation') ) )
                {
                    $utilisations = array();

                    foreach( $this->CI->input->post('utilisation') AS $key => $val )
                    {
                        $utilisations[] = array(
                            'produit' => $id_produit,
                            'utilisation' => $this->CI->input->post('utilisation')[$key]
                        );
                    }

                    if( !$this->CI->produit_model->ajouter_produit_utilisation($utilisations) )
                    {
                        $this->CI->produit_model->supprimer($id_produit);

                        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite votre produit n\'a pas pu être enregistré, veuillez réessayer ultérieurement');
                        return FALSE;
                    }
                }

                $this->CI->session->set_flashdata('success', 'Votre produit a bien été enregistré');
                return TRUE;
            }

            return FALSE;
        }
    }

    // -----------------------------------------------------------------------

  /**
   * Modifier un parametre.
   *
   * @param   int      ID du produit
   * @return  boolean  TRUE si le produit a bien été modifié ou FALSE
   *
   */

  public function modifier($id)
  {
      $this->CI->load->helper(array('form', 'text'));
      $this->CI->load->library('form_validation');
      $this->CI->form_validation->set_rules($this->rules['modifier']);

      $config['upload_path']          = './assets/images/produit/';
      $config['allowed_types']        = 'jpg|png';
      $config['overwrite']            = FALSE;
      $config['max_size']             = 2048; // 2Mb
      $config['max_width']            = 1024;
      $config['max_height']           = 1024;

      $config2['upload_path']          = './assets/images/produit/accueil/';
      $config2['allowed_types']        = 'jpg|png';
      $config2['overwrite']            = FALSE;
      $config2['max_size']             = 2048; // 2Mb
      $config2['max_width']            = 1024;
      $config2['max_height']           = 1024;

      $config4['upload_path']          = './assets/images/produit/header/';
      $config4['allowed_types']        = 'jpg|png';
      $config4['overwrite']            = FALSE;
      $config4['max_size']             = 2048; // 2Mb
      $config4['max_width']            = 1024;
      $config4['max_height']           = 1024;

      $config3['upload_path']   = './assets/fiche_technique/';
      $config3['allowed_types'] = 'pdf';
      $config3['overwrite']      = FALSE;
      $config3['max_size']      = 2048; // 2Mb
      $config3['max_width']     = 1024;
      $config3['max_height']    = 1024;

      if( $this->CI->form_validation->run() !== FALSE )
      {
        $datas = array();

        $datas['reference'] = $this->CI->input->post('reference');
        $datas['nom'] = $this->CI->input->post('nom');
        $datas['slug'] = convert_accented_characters(url_title($this->CI->input->post('nom'), 'dash', TRUE));
        $datas['description_courte'] = $this->CI->input->post('description_courte');
        $datas['description_longue'] = $this->CI->input->post('description_longue');
        $datas['prix_ht'] = $this->CI->input->post('prix_ht');
        $datas['remise'] = $this->CI->input->post('remise');
        $datas['stock'] = $this->CI->input->post('stock');
        $datas['date_modification'] = date('Y-m-d H:i:s');



          /* On essaye d'upload l'image du bidon, si c'est OK on supprime l'ancienne sinon on la garde */
          $this->CI->load->library('upload', $config);
          if($this->CI->upload->do_upload('bidon') )
          {
              unlink( './assets/images/produit/'.$this->CI->input->post('ancien_bidon') );
              $datas['bidon'] = $this->CI->upload->data('file_name');
          }
          else
          {
              $datas['bidon'] = $this->CI->input->post('ancien_bidon');
          }

          /* On essaye d'upload l'image, si c'est OK on supprime l'ancienne sinon on la garde */
          $this->CI->upload->initialize($config2);
          if($this->CI->upload->do_upload('image') )
          {
              unlink( './assets/images/produit/accueil/'.$this->CI->input->post('ancienne_image') );
              $datas['image'] = $this->CI->upload->data('file_name');
          }
          else
          {
              $datas['image'] = $this->CI->input->post('ancienne_image');
          }

          /* On essaye d'upload l'image, si c'est OK on supprime l'ancienne sinon on la garde */
          $this->CI->upload->initialize($config4);
          if($this->CI->upload->do_upload('image_header') )
          {
              unlink( './assets/images/produit/header/'.$this->CI->input->post('ancienne_image_header') );
              $datas['image_header'] = $this->CI->upload->data('file_name');
          }
          else
          {
              $datas['image_header'] = $this->CI->input->post('ancienne_image_header');
          }

          /* On essaye d'upload la fiche technique, si c'est OK on supprime l'ancienne sinon on la garde */
          $this->CI->upload->initialize($config3);
          if($this->CI->upload->do_upload('fiche_tech') )
          {
              unlink( './assets/fiche_technique/'.$this->CI->input->post('ancienne_fiche_tech') );
              $datas['fiche_tech'] = $this->CI->upload->data('file_name');
          }
          else
          {
              $datas['fiche_tech'] = $this->CI->input->post('ancienne_fiche_tech');
          }

          /* Je modifie les donnée de la table produit*/
          if($this->CI->produit_model->modifier_produit( $datas, $id))
          {
            $id_produit=$id;
            /* Ensuite je récupère la liste des priorité et je peux insérer toutes mes priorité en base */
            if( is_array( $this->CI->input->post('priorite') ) )
            {
                $priorites = array();
                /*Je supprime les ancienne donnée correspondant a ce produit*/
                $this->CI->produit_model->supprimer_produit_priorite($id_produit);
                foreach( $this->CI->input->post('priorite') AS $key => $val )
                {
                    $priorites[] = array(
                        'produit' => $id_produit,
                        'priorite' => $this->CI->input->post('priorite')[$key],
                    );
                }

                if( !$this->CI->produit_model->ajouter_produit_priorite($priorites) )
                {
                    $this->CI->produit_model->supprimer($id_produit);
                    $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite votre produit n\'a pas pu être enregistré, veuillez réessayer ultérieurement');
                    return FALSE;
                }
            }



            /* Ensuite je récupère la liste des caracteristique et je peux les insérer en base */
            if( is_array( $this->CI->input->post('caracteristique') ) )
            {
                $caracteristiques = array();
                /*Je supprime les ancienne donnée correspondant a ce produit*/
                $this->CI->produit_model->supprimer_produit_caracteristique($id_produit);
                foreach( $this->CI->input->post('caracteristique') AS $key => $val )
                {
                    $caracteristiques[] = array(
                        'produit' => $id_produit,
                        'caracteristique' => $this->CI->input->post('caracteristique')[$key]
                    );
                }

                if( !$this->CI->produit_model->ajouter_produit_caracteristique($caracteristiques) )
                {
                    $this->CI->produit_model->supprimer($id_produit);

                    $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite votre produit n\'a pas pu être enregistré, veuillez réessayer ultérieurement');
                    return FALSE;
                }
            }



            /* Ensuite je récupère la liste des utilisations et je peux les insérer en base */
            if( is_array( $this->CI->input->post('utilisation') ) )
            {
                $utilisations = array();
                /*Je supprime les ancienne donnée correspondant a ce produit*/
                $this->CI->produit_model->supprimer_produit_utilisation($id_produit);
                foreach( $this->CI->input->post('utilisation') AS $key => $val )
                {
                    $utilisations[] = array(
                        'produit' => $id_produit,
                        'utilisation' => $this->CI->input->post('utilisation')[$key]
                    );
                }

                if( !$this->CI->produit_model->ajouter_produit_utilisation($utilisations) )
                {
                    $this->CI->produit_model->supprimer($id_produit);

                    $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite votre produit n\'a pas pu être enregistré, veuillez réessayer ultérieurement');
                    return FALSE;
                }
            }
            $this->CI->session->set_flashdata('success', 'Votre produit a bien été modifié');
            return TRUE;
        }

        return FALSE;
    }
  }

  // -----------------------------------------------------------------------

    /**
     * Supprime un produit.
     *
     * @param   int      ID du produit
     * @return  boolean  TRUE si le produit a été supprimé ou FALSE
     */
    public function supprimer($id)
    {
        $produit = $this->CI->produit_model->produit($id);

        if( $this->CI->produit_model->supprimer($id) )
        {
            unlink( './web/img/produit/'.$produit->image );
            unlink( './web/img/fiche_technique/'.$produit->fiche_tech );

            $this->CI->session->set_flashdata('success', 'Votre produit a bien été supprimé');
            return TRUE;
        }

        $this->CI->session->set_flashdata('error', 'Une erreur s\'est produite, veuillez réessayer ultérieurement');
        return FALSE;
    }

    // -----------------------------------------------------------------------
}
