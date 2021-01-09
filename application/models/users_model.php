<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

	public function login($username, $password)
	{
		$q = $this->db
			->where(['name' => $username, 'password' => $password, 'status' => 1])
			->get('users');

		if ($q->num_rows()) {
			return $q->row()->id;
			//return true;
		} else {
			return false;
		}
	}

	// public function login($user_id = null)
	// {		
	// 	if (is_array($user_id)) {
	// 		$q = $this->db->get_where('users', $user_id);			
	// 	}
	// 	return $q->result_array();
	// }


	public function get($user_id = null)
	{
		if ($user_id == null) {
			$q = $this->db->get_where('users', ['status' => '1']);
		} else {
			$q = $this->db->get_where('users', ['id' => $user_id, 'status' => '1']);
		}
		return $q->result();
	}
	public function insert($data)
	{
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}
	public function update($data, $user_id)
	{

		$this->db->where(['id' => $user_id]);
		$this->db->update('users', $data);
		return $this->db->affected_rows();
	}
	public function delete($user_id)
	{
		$this->db->delete('users', ['id' => $user_id]);
		return $this->db->affected_rows();
	}
}
