<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			$this->logout();
		} else {
			$this->load->model('users_model');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/login');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('dashboard/index'),
			'per_page' => 5,
			'total_rows' => $this->users_model->num_rows(),
			'full_tag_open' => '<ul class="pagination justify-content-center">',
			'full_tag_close' => '</ul>',
			'next_tag_open' => '<li class="page-item page-link">',
			'next_tag_close' => '</a></li>',
			'first_link' => 'Prev',
			'last_link' => 'Next',
			'first_tag_open' => '<li class="page-item page-link">',
			'first_tag_close' => '</a></li>',
			'last_tag_open' => '<li class="page-item page-link">',
			'last_tag_close' => '</a></li>',
			'prev_tag_open' => '<li class="page-item page-link">',
			'prev_tag_close' => '</a></li>',
			'num_tag_open' => '<li class="page-item page-link">',
			'num_tag_close' => '</li>',
			'cur_tag_open' => '<li class="active page-item page-link">',
			'cur_tag_close' => '</li>',
		];
		$this->pagination->initialize($config);
		$result = $this->users_model->getAllUsers($config['per_page'], $this->uri->segment(3));
		$this->load->view('dashboard', ['result' => $result]);
	}

	public function edit_user($id)
	{
		$result = $this->users_model->dashEditFind($id);
		//print_r($result);
		$this->load->view('dashboardedit', ['data' => $result]);
	}
	public function update_user($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]|matches[confirmPass]');
		$this->form_validation->set_rules('confirmPass', 'Confirm Password', 'required|min_length[4]|matches[pass]');

		if ($this->form_validation->run() == false) {
			$this->edit_user($id);
		} else {
			$name = $this->input->post('name');
			$pass = $this->input->post('pass');
			$result = $this->users_model->update($id, $name, $pass);
			if ($result == 1) {
				$this->session->set_flashdata('edit', 'Records Updated Successfully');
				$this->session->set_flashdata('feedback_class', 'alert-success');
			} else if ($result == 0) {
				$this->session->set_flashdata('edit', 'Nothing is Changed. ');
				$this->session->set_flashdata('feedback_class', 'alert-info');
			} else {
				$this->session->set_flashdata('edit', 'Nothing is Changed. ');
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}
			return redirect('dashboard/edit_user/' . $id);
		}
	}
	public function delete_user()
	{
		$id = $this->input->post('id');
		$result = $this->users_model->delete($id);
		if ($result) {
			$this->session->set_flashdata('delete', 'Records Deleted Successfully');
			$this->session->set_flashdata('feedback_class', 'alert-info');
		} else {
			$this->session->set_flashdata('delete', 'Something is wrong ');
			$this->session->set_flashdata('feedback_class', 'alert-danger');
		}
		return redirect('dashboard');
	}
}
