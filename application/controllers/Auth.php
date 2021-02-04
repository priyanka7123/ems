<?php
class Auth extends CI_Controller
{
	public function login()
	{
		$this->load->view('login');
	}
	public function login_function()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		echo $username;
		echo $password;
		if ($this->form_validation->run()) {

			if ($this->datawork->login($username, $password) === TRUE) {
				$loginid = $this->datawork->getsession($username);
				$this->session->set_userdata('login_details', $loginid);
				$this->session->set_flashdata('alert', "<div class='alert bg-success text-white bg-gradient'>Login successfull</div>");
				redirect('home');
			} else {
				$this->session->set_flashdata('alert', "<div class='alert bg-danger text-white bg-gradient'>Incorrect Username & Password</div>");
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('alert', "<div class='alert bg-danger text-white bg-gradient'>Please provide all details</div>");
			redirect('auth/login');
		}
	}
}
