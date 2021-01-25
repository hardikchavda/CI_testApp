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
			$this->load->view('login');
		} else {

			$name = $this->input->post('name');
			$pass = $this->input->post('pass');
			$result = $this->users_model->login($name, $pass);
			if ($result) {
				$this->session->set_userdata('user_id', $result);
				return redirect('dashboard');
			} else {
				$this->session->set_flashdata('loginfailed', 'Invalid Username / Password.');
				return redirect('login');
			}
		}
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

		$config = [
			'upload_path' => 'images',
			'allowed_types' => 'jpg|gif|png|jpeg',
		];
		var_dump($config);
		$this->load->library('upload', $config);
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|is_unique[users.name]');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]|matches[confirmPass]');
		$this->form_validation->set_rules('confirmPass', 'Confirm Password', 'required|min_length[4]|matches[pass]');

		if ($this->form_validation->run() == false && $this->file->upload->do_upload() == false) {
			$upload_error = $this->upload->display_errors();
			$this->load->view('registeruser', compact($upload_error));
		} else {
			$name = $this->input->post('name');
			$pass = $this->input->post('pass');
			$result = $this->users_model->insert([
				'name' => $name,
				'password' => $pass
			]);
			if ($result) {
				$this->session->set_flashdata('register', 'Registeration Complete');
				$this->session->set_flashdata('feedback_class', 'alert-success');
			} else {
				$this->session->set_flashdata('register', 'Something is wrong ');
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}
			return redirect('login/register');
		}
	}
}
