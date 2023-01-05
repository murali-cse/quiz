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
		redirect('/welcome');
	}

	public function student(){
		$this->load->view('header');
		$this->load->view('student_panel');
		$this->load->view('footer');
	}

	public function admin(){
		
		$res = $this->Test_model->get_test();

		$data = [
			'res' => $res
		];

		$this->load->view('header');
		$this->load->view('admin_panel',$data);
		$this->load->view('footer');
	}

	public function questions($id){
		
		// get questions 
		$res = $this->Questions_model->get_questions($id);

		$data = [ 'res' => $res ];

		$this->load->view('header');
		$this->load->view('questions',$data);
		$this->load->view('footer');
	}

	public function student_test($id){
		$this->load->view('header');
		$this->load->view('student_questions');
		$this->load->view('footer');
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

	
}