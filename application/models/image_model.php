<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

   

    public function imageproduits()
    {
   $query = $this->db->get('imageproduit');

        if($query->num_rows() >= 1)
        {
            return $query->result();
        }

        return FALSE;

  //     $this->db->from('imageproduit');  

  //  $query=$this->db->get();
  // $array= $query->result();
  //   return $array;
    // if ($query->num_rows()) {
    // foreach ($query->result_array() as $row) {
    
    //   $c_row=$row;
    //   return $c_row;
 // print_r($array);
         // exit;

  }
  
  
    }
