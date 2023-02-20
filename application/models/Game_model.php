<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_model extends CI_Model {
    
    function add($data){
        $this->db->insert('game',$data);
        return true;
    }

    
}