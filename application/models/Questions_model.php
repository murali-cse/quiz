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

    public function get_single_answer($testid, $id){
        $res = $this->db->select('correctans')->from('questions')->where(['testid' => $testid, 'id' => $id ])->get();
        return $res->result_array();
    }

    public function insert_winner($data){
        $res = $this->db->insert('quiz',$data);
        return $res;
    }

    public function update_winner($testid,$data){
        $this->db->where('testid',$testid);
        $res = $this->db->update('quiz',$data);
        return $res;
    }

    public function check_quiz($testid){
        $res = $this->db->select("*")->from('quiz')->where('testid',$testid)->get();
        return $res->result_array();
    }

}