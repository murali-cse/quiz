<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		redirect('/welcome');
	}

	public function student(){
		$this->load->view('header');
		$this->load->view('student_register');
		$this->load->view('footer');
	}

	public function admin(){
		$this->load->view('header');
		$this->load->view('admin_register');
		$this->load->view('footer');
	}

	public function admin_register(){
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		$data = [
			'firstname' => $fname,
			'lastname' => $lname,
			'email' => $email,
			'pass' => md5($pass),
		];

		$res = $this->Auth_model->reg_admin($data);

		if($res){
			redirect('login/admin');
		}
	}

	public function admin_login(){
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		$data = [
			'email' => $email,
			'pass' => md5($pass),
		];

		$res = $this->Auth_model->admin_login($data);

		if(count($res) == 0){
			$this->session->set_flashdata('login_alert',true);
			$this->session->set_flashdata('adminlogin','Email/Password is incorrect');
			redirect('login/admin');
		}
		else{

			$data = [
				'id' => $res[0]->id,
				'fname' => $res[0]->firstname,
				'lname' => $res[0]->lastname,
				'email' => $res[0]->email,
				'usertype'=> 'admin'
			];
			
			$this->session->set_userdata($data);
			redirect('panel/admin');
		}
			
		
	}
	
}