<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		redirect('/welcome');
	}

	public function student(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function admin(){
		$this->load->view('header');
		$this->load->view('admin_login');
		$this->load->view('footer');
	}

	

}