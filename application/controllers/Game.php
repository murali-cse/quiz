<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('Game_model');
		$this->load->model('Questions_model');
	}

	public function add_game(){

		$classcode = $this->input->post("classCode");
		$quiz = $this->input->post("quiz");
		$playerOne = $this->input->post("playerOne");
		$playerTwo = $this->input->post("playerTwo");

		$data = [
			'class_code' => $classcode,
			'quiz_id' => $quiz,
			'player_one' => $playerOne,
			'player_two' => $playerTwo
		];

		$res = $this->Game_model->get_details($classcode);

		if(count($res)==0){
			$res = $this->Game_model->add($data);
			if($res){
				$this->session->set_flashdata('message', 'success');
				redirect('/panel/select_questions');
			}
			else{
				$this->session->set_flashdata('message','error');
				redirect('/panel/select_questions');
			}
		}
		else {
			$this->session->set_flashdata('message','already_exists');
			redirect('/panel/select_questions');
		}

	 	
	}

	public function play(){
		try {
			$classCode = $this->input->get('classCode');

			$user = $this->session->userdata();
			$studentid = $user['studentid'];
			$out = $this->Game_model->get_details($classCode);
			
			if($out){
				$quiz = $this->Game_model->get_quiz($classCode);
				$questions = $this->Questions_model->get_questions($out[0]->quiz_id);
				
				$playerOne = $out[0]->player_one;
				$playerTwo = $out[0]->player_two;

				if($studentid == $playerOne || $studentid == $playerTwo){

					$winner = rand(0,1);

					$winner_res = $this->Game_model->start([
						'batch' => $classCode,
						'testid'=> $out[0]->quiz_id,
						'player_one' => $playerOne,
						'player_two' => $playerTwo,
						'studentid' => $studentid,
						'a'=> 0,
						'b'=> 0,
						'winner' => $winner,
						'date'=> time(),
					]);

					$a_goal = 0;
					$b_goal = 0;

					
					if($quiz[0]->a >= 4){
						$a_goal = $quiz[0]->a%4 == 0 ? $quiz[0]->a/4 : 1;
					}
					else if($quiz[0]->b >= 4){
						$b_goal = $quiz[0]->b%4  == 0 ? $quiz[0]->b/4 : 1;
					}

					if($quiz[0]->a_wrong > 1){
						$b_goal = $b_goal > 0 ? $b_goal+1 : 1;
					}
					else if($quiz[0]->b_wrong > 1){
						$a_goal = $a_goal > 0 ? $a_goal+1 : 1;
					}
					
					

					$data = [
						'res' => $questions,
						'playerOne' => $playerOne,
						'playerTwo' => $playerTwo,
						'classCode' => $classCode,
						'winner' => $winner_res,
						'studentid' => $studentid,
						'currentques' => $quiz[0]->currentques ?? 0,
						'turns' => $out[0]->turns ?? $winner_res,
						'playerOneScore' => $quiz[0]->a ?? 0,
						'playerTwoScore' => $quiz[0]->b ?? 0,
						'a_goal' => $a_goal,
						'b_goal' => $b_goal

					];

					$this->load->view('header');
					$this->load->view('game', $data);
					$this->load->view('footer');
				}
				else {
					$this->load->view('game_error');
				}
			}
			else {
				$this->load->view('game_error');
			}
		}
		catch(e){
			$this->load->view('game_error');
		}
		
	}

	public function update(){

		$winner = $this->input->post('winner');
		$class_code = $this->input->post('classCode');

		$this->Game_model->update_ans($winner, $class_code);

		echo json_encode([
			'status' => 'ok',
		]);
	}

	public function reduce(){
		$loser = $this->input->post('loser');
		$class_code = $this->input->post('classCode');

		$this->Game_model->reduce_ans($winner, $class_code);

		echo json_encode([
			'status' => 'ok',
		]);

	}

}