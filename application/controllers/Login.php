<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$usertype = $this->session->userdata('usertype');

		if($usertype == 'admin'){
			redirect('panel/admin');
		}
		else if($usertype == 'student'){
			redirect('panel/student');
		}
		else {
			redirect('/welcome');
		}
	}

	public function student(){

		$usertype = $this->session->userdata('usertype');

		if($usertype == 'admin'){
			redirect('panel/admin');
		}
		else if($usertype == 'student'){
			redirect('panel/student');
		}
		
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function admin(){

		$usertype = $this->session->userdata('usertype');

		if($usertype == 'admin'){
			redirect('panel/admin');
		}
		else if($usertype == 'student'){
			redirect('panel/student');
		}
		
		$this->load->view('header');
		$this->load->view('admin_login');
		$this->load->view('footer');
	}

	

}