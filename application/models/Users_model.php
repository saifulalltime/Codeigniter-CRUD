<?php

/**
 * Created by PhpStorm.
 * User: ambidextrousbd
 * Date: 9/8/15
 * Time: 1:49 PM
 */
class Users_model extends CI_Model
{
    public function insert_registration($data){

        $result = $this->db->insert('users_reg', $data);

        return $result;
    }

    public function user_show(){
        //$this->load->library("database");
        $query = $this->db->get("users_reg");
        if($query->num_rows() > 0){
            return $query->result();
        }
        return array();
    }

    public function update_show($data){
        $this->db->where('id', $data);
        $query = $this->db->get("users_reg");
        if($query->num_rows() > 0){
            return $query->result();
        }
        return array();
    }

    public function data_update($id,$data){
        $this->db->where('id', $id);
        $result = $this->db->update('users_reg', $data);
        return $result;

    }

    public function delete_id($id){
        $this->db->where('id', $id);
        $result = $this->db->delete('users_reg');
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function login_data($data) {
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        $query = $this->db->get('users_reg');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function read_user_information($sess_array) {
        $this->db->where('email',$sess_array['email']);
        $query = $this->db->get('users_reg');
        if ($query->num_rows() >0) {
            return $query->result();
        } else {
            return false;
        }
    }
}