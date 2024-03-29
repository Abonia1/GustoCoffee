<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "gustorestapi";

    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }
    }

    public function login($username,$password)
    {
        $q  = $this->db->select('mot_de_passe,id')->from('client')->where('email',$username)->get()->row();
       
        if($q == ""){
            return array('status' => 204,'message' => 'Username not found.');
        } else {
            $hashed_password = $q->mot_de_passe;
            $id              = $q->id;
             echo $hashed_password ." ".$password;
        //exit;
            if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
               $last_login = date('Y-m-d H:i:s');
               $token = crypt(substr( md5(rand()), 0, 7));
               $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
               $this->db->trans_start();
               //$this->db->where('id',$id)->update('administrateur',array('last_login' => $last_login));
               $this->db->insert('client_authentication',array('client_id' => $id,'token' => $token,'expired_at' => $expired_at));
               if ($this->db->trans_status() === FALSE){
                  $this->db->trans_rollback();
                  return array('status' => 500,'message' => 'Internal server error.');
               } else {
                  $this->db->trans_commit();
                  return array('status' => 200,'message' => 'Successfully login.','id' => $id, 'token' => $token);
               }
            } else {
                echo "Wrong password";
                exit();
               return array('status' => 204,'message' => 'Wrong password.');
            }
        }
    }

    public function logout()
    {
        $client_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('client_id',$client_id)->where('token',$token)->delete('client_authentication');
        return array('status' => 200,'message' => 'Successfully logout.');
    }

    public function auth()
    {
        $client_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $q  = $this->db->select('expired_at')->from('client_authentication')->where('client_id',$client_id)->where('token',$token)->get()->row();
        if($q == ""){
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        } else {
            if($q->expired_at < date('Y-m-d H:i:s')){
                return json_output(401,array('status' => 401,'message' => 'Your session has been expired.'));
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->where('client_id',$client_id)->where('token',$token)->update('client_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }
    // public function reservation_all_data()
    //  {
    //      return $this->db->select('reservation_id,date,time,c_id')->from('reservation')->where('c_id',$id)->order_by('reservation_id','desc')->get()->result();
    //  }
    public function reservation_all_data()
    {
        $client_id  = $this->input->get_request_header('User-ID', TRUE);
        return $this->db->select('reservation_id,date,time,status,tbnumber,c_id')->from('reservation')->where('c_id',$client_id )->order_by('c_id','desc')->get()->result();
    }
    
    public function reservation_detail_data($id)
    {
        return $this->db->select('reservation_id,date,time,c_id')->from('reservation')->where('c_id',$id )->order_by('c_id','desc')->get()->row();
    }

    public function reservation_create_data($data)
    {
        
        $this->db->insert('reservation',$data);
        return array('status' => 201,'message' => 'Data has been created.');
    }

    public function reservation_update_data($id,$data)
    {
        //$this->db->select('reservation_id,date,time,c_id')
        $this->db->where('reservation_id',$id)->update('reservation',$data);
        return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function reservation_delete_data($id)
    {
        $this->db->where('reservation_id',$id)->delete('reservation');
        return array('status' => 200,'message' => 'Data has been deleted.');
    }

}
