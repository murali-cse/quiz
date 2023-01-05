<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function reg_admin($data){
        $this->db->insert('admin',$data);
        return true;
    }

    public function admin_login($data){
       $this->db->select("id,firstname,lastname,email");
       $this->db->from('admin');
       $this->db->where($data);

       $res = $this->db->get();

       return $res->result();
    }
}