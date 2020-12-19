
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
		$this->output->set_content_type('application_json');
		if ($result) {
			$this->session->set_userdata(['user_id' => $result[0]['user_id']]);
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
