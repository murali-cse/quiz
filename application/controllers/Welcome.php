<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$usertype = $this->session->usertype;
		if($usertype == 'admin'){
			redirect('panel/admin');
		}
		else if($usertype == 'student'){
			redirect('panel/student');
		}
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('welcome_message');
		$this->load->view('footer');
	}
}