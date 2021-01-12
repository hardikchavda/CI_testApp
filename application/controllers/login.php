<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index()
	{
		if ($this->session->userdata('user_id')) {
			return redirect('dashboard');
		}

		$this->load->helper('form');
		$this->load->view('login');
	}
	public function login_check()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|trim');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]|trim');

		if ($this->form_validation->run() == false) {
			// echo validation_errors();
			// $this->output->set_output(json_encode(['result' => 0]));
			// return false;
			$this->load->view('login');
		} else {
			//print_r($_POST);
			$name = $this->input->post('name');
			$pass = $this->input->post('pass');
			$result = $this->users_model->login($name, $pass);
			if ($result) {
				//echo "password match";				
				$this->session->set_userdata('user_id', $result);
				//$this->load->view('dashboard');
				return redirect('dashboard');
			} else {
				$this->session->set_flashdata('loginfailed', 'Invalid Username / Password.');
				return redirect('login');
			}

			//
		}
		// $result = $this->users_model->login([
		// 	'name' => $name,
		// 	'password' => $pass,
		// 	'status' => 1
		// ]);
		// //print_r($result[0]->id);
		// $this->output->set_content_type('application_json');
		// if ($result) {
		// 	$this->session->set_userdata(['user_id' => $result[0]['id']]);
		// 	$this->output->set_output(json_encode(['result' => 1]));
		// 	return false;
		// }
		// $this->output->set_output(json_encode(['result' => 0]));
	}

	public function admin_login()
	{
		$this->load->library('form_validation');
	}

	public function register()
	{

		$this->load->view('registeruser');
	}
	public function register_check()
	{
		$this->output->set_content_type('application_json');

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|is_unique[users.name]');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]|matches[confirmPass]');

		if ($this->form_validation->run() == false) {
			// echo validation_errors();
			// $this->output->set_output(json_encode(['result' => 0]));
			// return false;
			$this->load->view('login');
		} else {
			$this->load->view('dashboard');
		}
		//print_r($_POST);
		$name = $this->input->post('name');
		$pass = $this->input->post('pass');
		$name = $this->input->post('confirmPass');


		$result = $this->users_model->insert([
			'name' => $name,
			'password' => $pass
		]);

		echo $result;
		die('not ready');
		//print_r($result[0]->id);

		if ($result) {
			$this->session->set_userdata([
				'user_id' => $result[0]->id
			]);
			$this->output->set_output(json_encode(['result' => 1]));
			return false;
		}
		$this->output->set_output(json_encode(['result' => 0]));
	}
}
