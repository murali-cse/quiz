<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions_model extends CI_Model {

    public function get_questions($id){
        $res = $this->db->select('*')->from('questions')->where('testid',$id)->get();

        return $res->result_array();
    }

    public function add_questions($data){
        $res = $this->db->insert('questions',$data);
        return $res;
    }

    public function get_test_questions($id){
        $res= $this->db->select('id,testid,question,options')->from('questions')->where('testid',$id)->get();
        return $res->result_array();
    }

    public function get_test_answers($id){
        $res = $this->db->select('id,correctans')->from('questions')->where('testid',$id)->get();
        return $res->result_array();
    }

}