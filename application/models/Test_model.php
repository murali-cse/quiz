<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {

    public function add_test($data){

        $res= $this->db->insert('tests',$data);    
        return $res;
        
    }

    public function get_test(){
        
        $res = $this->db->select("*")->from('tests')->get();

        return $res->result_array();
        // return null;
    }

    public function update_test($id,$data){
        
        $this->db->where('id',$id);
        $res = $this->db->update('tests',$data);
        return $res;
    }

}