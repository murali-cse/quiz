<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions_model extends CI_Model {

    public function get_questions($id){
        $res = $this->db->select('*')->from('questions')->where('testid',$id)->get();

        return $res->result_array();
    }
}