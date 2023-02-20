<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('Game_model');
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

		$this->Game_model->add($data);
	}
}