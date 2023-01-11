<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Test_model');
		$this->load->model('Questions_model');
	}

	public function index()
	{

		$usertype = $this->session->userdata('usertype');
		if($usertype == 'admin'){
			redirect('panel/admin');
		}
		else if($usertype == 'student') {
			redirect('panel/student');
		}
		else {
			redirect('/welcome');
		}
	}

	public function student(){

		$test = $this->Test_model->get_test();

		$data = [
			'res' => $test
		];

		// session
		$usertype= $this->session->usertype;

		
		if($usertype == 'student'){
			$this->load->view('header');
			$this->load->view('student_panel',$data);
			$this->load->view('footer');
		}
		else {
			redirect('/');
		}

		
	}

	public function admin(){
		
		$res = $this->Test_model->get_test();

		$data = [
			'res' => $res
		];

		// session 
		$usertype = $this->session->usertype;
		if($usertype=='admin'){
			$this->load->view('header');
			$this->load->view('admin_panel',$data);
			$this->load->view('footer');
		}
		else {
			redirect('/');
		}

	}

	public function questions($id){
		
		// get questions 
		$res = $this->Questions_model->get_questions($id);

		$data = [ 'res' => $res, 'id'=>$id ];

		$this->load->view('header');
		$this->load->view('questions',$data);
		$this->load->view('footer');
	}

	public function add_question($id){

		$data = [
			'id' => $id
		];

		$this->load->view('header');
		$this->load->view('add_question', $data);
		$this->load->view('footer');
	}

	public function insertqest($id){
		$quest = $this->input->post('question');
		$ans = $this->input->post('answers');
		$correct_ans = $this->input->post('correctans');

		$data = [
			'testid'=> $id,
			'question' => $quest,
			'options' => $ans,
			'correctans' => $correct_ans
		];

		$this->Questions_model->add_questions($data);

		redirect("panel/questions/$id");
	}

	public function student_test($id){

		$quest = $this->Questions_model->get_test_questions($id);

		$data = [
			'id' => $id,
			'res' => $quest
		];

		$this->load->view('header');
		$this->load->view('student_questions', $data);
		$this->load->view('footer');
	}

	public function student_ans($id){
		$form = $this->input->post();
		$res = $this->Questions_model->get_test_answers($id);

		$correct_answer = 0;
		foreach($form as $key=>$value){
			foreach($res as $result){
				if($result['id'] == $key && $result['correctans'] == $value){
					$correct_answer++;
					continue;
				}
			}
			
		}
		$incorrect_answer = count($form)-$correct_answer;

		$data = [
			'correct_ans'=> $correct_answer,
			'incorrect_ans'=> $incorrect_answer
		];
	
		$this->load->view('header');
		$this->load->view('student_answers',$data);
		$this->load->view('footer');
	}

	public function select_questions(){
		$test = $this->Test_model->get_test();

		$data = [
			'res' => $test
		];
		$this->load->view('header');
		$this->load->view('select_question',$data);
		$this->load->view('footer');
	}

	public function quiz($id=-1,$current_quest=-1){

		if($id== -1){
			redirect('panel/admin');
		}

		//get questions
		$res = $this->Questions_model->get_questions($id);

		// batch
		$batch = $this->input->post('batch');

		$total_questions = count($res);

		$current_quest++;
		if($total_questions > $current_quest){
			$winner = rand(1,2);

			if($winner == 1){
				$winner = 'A';
			}
			else {
				$winner = 'B';
			}

			$this->session->set_userdata('winner', $winner);

			$points = $this->Questions_model->get_points([
				'testid' =>$res[$current_quest]['testid'],
				'batch' => $batch,
			]);

			$data = [ 
				'res' => $res[$current_quest],
				'id'=>$id,
				'current_quest' => $current_quest,
				'a' => $points[0]['a'] ?? 0,
				'b'=> $points[0]['b'] ?? 0
			];

			$this->load->view('header');
			$this->load->view('quiz',$data);
			$this->load->view('footer');
		}
		else {
			$this->load->view('header');
			$this->load->view('quiz_result');
			$this->load->view('footer');
		}
	}

	public function get_result(){

		$testid = $this->input->post('testid');
		$batch = $this->input->post('batch');

		$points = $this->Questions_model->get_points([
			'testid' =>$testid,
			'batch' => $batch,
		]);
		
		$a = 0;
		$b = 0;

		foreach($points as $point){
			$a+=(int)$point['a'];
			$b+=(int)$point['b'];
		}

		$data = [
			'winner' => $a > $b ? 'A' : 'B'
		];

		echo json_encode($data);
		
	}

	public function check_answer(){

		$testid = $this->input->post('testid');
		$id = $this->input->post('id');
		$ans = $this->input->post('ans');
		$batch = $this->input->post('batch');

		$result = $this->Questions_model->get_single_answer($testid, $id);

		if($ans == $result[0]['correctans']){
			// check quiz 
			$quiz = $this->Questions_model->check_quiz($testid, $batch);

			if(count($quiz) > 0){
					if($this->session->winner == "A"){
						$score = (int)$quiz[0]['a'];
						$score++;
	
						$where=[
							'testid'=> $testid,
							'batch'=>$batch
						];
	
						$data = [
							'a' => "$score",
						];
						$this->Questions_model->update_winner($where,$data);
					}
					else {
						$score = (int)$quiz[0]['b'];
						$score++;
						
						$where=[
							'testid'=> $testid,
							'batch'=>$batch
						];

						$data = [
							'b' => "$score",
						];
						$this->Questions_model->update_winner($where,$data);
					}	
			}
			else {
						
				if($this->session->winner == "A"){
					$data = [
						'testid' => $testid,
						'batch'=> $batch,
						'a' => '1',
						'b' => '0',
					];
					$this->Questions_model->insert_winner($data);
				}
				else {
					$data = [
						'testid' => $testid,
						'batch'=> $batch,
						'a' => '0',
						'b' => '1',
					];
					$this->Questions_model->insert_winner($data);
				}
			}

			$winner = $this->session->winner;

			$out = [
				'turns' => $winner,
				'response' => 1,
			];
			echo json_encode($out);	
		}
		else {
			if($this->session->userdata('winner') == "A"){
				$this->session->set_userdata('winner', 'B');
			}
			else {
				$this->session->set_userdata('winner', 'A');
			}

			$winner = $this->session->winner;

			$out = [
				'turns' => $winner,
				'response' => 0,
			];
			echo json_encode($out);
			
		}
	}

	public function add_test(){
		$testname = $this->input->post('testname');
		$teachername= $this->input->post('teachername');

		$data = [
			'testname' => $testname,
			'teachername' => $teachername,
		];

		$res = $this->Test_model->add_test($data);

		if($res){
			redirect('panel/admin');
		}
	}

	public function edit_test(){
		
		$testname = $this->input->post('testname');
		$teachername = $this->input->post('teachername');
		$id = $this->input->post('test_id');

		$data = [
			'testname' => $testname,
			'teachername' => $teachername,
			'updated_at' => date('Y-m-d H:i:s'),
		];

		$res = $this->Test_model->update_test($id,$data);

		if($res){
			redirect('panel/admin');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

	
}