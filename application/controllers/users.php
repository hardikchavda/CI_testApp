
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function login()
	{

		//print_r($_POST);
		$name = $this->input->post('name');
		$pass = $this->input->post('pass');

		$result = $this->users_model->login([
			'name' => $name,
			'password' => $pass,
			'status' => 1
		]);
		//print_r($result[0]->id);
		$this->output->set_content_type('application_json');
		if ($result) {
			$this->session->set_userdata([
				'user_id' => $result[0]->id
			]);
			$this->output->set_output(json_encode(['result' => 1]));
			return false;
		}
		$this->output->set_output(json_encode(['result' => 0]));
	}
	public function register()
	{


		$this->output->set_content_type('application_json');

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|is_unique[users.name]');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]|matches[confirmPass]');

		if ($this->form_validation->run() == false) {
			echo validation_errors();
			$this->output->set_output(json_encode(['result' => 0]));
			return false;
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
