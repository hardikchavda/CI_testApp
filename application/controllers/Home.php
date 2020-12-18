<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function login()
	{
		$this->session->set_userdata([
			'user_id' => 1
		]);

		// $session = $this->session->all_userdata();
		// print_r($session);
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function get()
	{
		$result = $this->users_model->get();
		print_r($result);
		$this->output->enable_profiler(true);
	}
	public function insert()
	{
		$result = $this->users_model->insert([
			'name' => 'harsh'
		]);
		print_r($result);
	}
	public function update()
	{
		$result = $this->users_model->update([
			'name' => 'don'
		], 3);
		print_r($result);
	}
	public function delete($user_id)
	{
		$result = $this->users_model->delete($user_id);
		print_r($result);
	}
}
