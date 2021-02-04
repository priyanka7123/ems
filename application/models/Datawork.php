<?php
class Datawork extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insertdata($table, $fields)
	{
		$data = $this->db->insert($table, $fields);
		return $data;
	}

	public function callingdata($table, $cond = null)
	{
		if ($cond == null) {
			$data = $this->db->get($table);
		} else {
			$data = $this->db->where($cond)->get($table);
		}
		return $data->result();
	}
	public function checkdata($table, $cond)
	{
		$data = $this->db->where($cond)
			->get($table);
		$count = $data->num_rows();
		if ($count > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function deletedata($table, $cond)
	{
		$query = $this->db->delete($table, $cond);
		return true;
	}
	public function updatedata($table, $fields, $cond)
	{
		$this->db->update($table, $fields, $cond);
		return true;
	}
	public function callingSingle($table, $cond = null)
	{

		$data = $this->db->where($cond)->get($table);

		return $data->row();
	}

	// VERIFY CRM LOGIN
	public function login($username, $password)
	{
		$query = $this->db->select('*')
			->from('login_details')
			->where("(user_name = '$username')")
			->where("(password='$password')");
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	// SET CRM SESSION
	public function getsession($username)
	{
		$query = $this->db->select('*')
			->from('login_details')
			->where("(user_name = '$username')");
		$query = $this->db->get();
		$data = $query->row_array();
		$loginid = $data['id'];
		return $loginid;
	}
}
