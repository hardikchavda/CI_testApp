<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function admin_login()
	{
		$this->load->library('form_validation');
	}

	public function register()
	{
		$this->load->view('header');
		$this->load->view('registeruser');
		$this->load->view('footer');
	}
}
