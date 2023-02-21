<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_model extends CI_Model {
    
    function add($data){
        
        $this->db->insert('game',$data);
        return true;
    }

    function get(){
        $this->db->select("*");
        $this->db->from('game');
        $this->db->join('tests', 'tests.id = game.quiz_id');
        return $this->db->get()->result();
    }

    function get_details($class_code){
        $this->db->where('class_code', $class_code);
        return $this->db->get('game')->result();
    }

    function get_quiz($class_code){
        $this->db->where('batch', $class_code);
        return $this->db->get('quiz')->result();
    }
    
    function start($data){

        $winner = $data['winner'];

        unset($data['winner']);
        unset($data['studentid']);
        unset($data['a']);
        unset($data['b']);

        $res = $this->db->where($data)->get('quiz')->num_rows();

        if($res == 0){
            $data['toss_winner'] = $winner;
            $data['currentques'] = 0;
            $data['turns'] = $winner;
            $this->db->insert('quiz', $data);
            return $winner;
        }
        else {
            $this->db->select('toss_winner');
            $this->db->where($data);
            $res =  $this->db->get('quiz')->result();
            return $res[0]->toss_winner;
        }
        
        return true;
    }

    function update_ans($winner, $class_code){

        $this->db->where('batch', $class_code);
        $res = $this->db->get('quiz')->result();

        $a = $res[0]->a;
        $b = $res[0]->b;
        $currentques = $res[0]->currentques;

        if($winner == 0){
            $a++;
            $currentques++;
            $data = ['a' => $a, 'toss_winner' => 1, 'currentques' => $currentques];
        }
        else {
            $b++;
            $currentques++;
            $data = ['b' => $b, 'toss_winner' => 0, 'currentques' => $currentques];
        }

        $this->db->where('batch', $class_code);
        $this->db->update('quiz',$data);
        return true;
    }

    function reduce_ans($loser, $class_code){
        $this->db->where('batch', $class_code);
        $res = $this->db->get('quiz')->result();
        
        $a_wrong = $res[0]->a_wrong;
        $b_wrong = $res[0]->b_wrong;

        $a = $res[0]->a;
        $b = $res[0]->b;

        if($winner == 0){
            if($a_wrong != 0){
                $a_wrong++;
            }
            
            if($a != 0){
                $a--;
            }
            

            $data = ['a_wrong' => $a_wrong, 'a'=> $a, 'toss_winner' => 1];
        }
        else {
            if($b_wrong != 0){
                $b_wrong++;
            }

            if($b != 0){
                $b--;
            }
            
            $data = ['b_wrong' => $b_wrong, 'b'=> $b, 'toss_winner' => 0];

        }


        $this->db->where('batch', $class_code);
        $this->db->update('quiz',$data);

        
    }
}