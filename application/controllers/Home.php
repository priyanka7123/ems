<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_details')) {
			header('location:' . base_url('auth/login'));
		}
	}

	function logout()
	{
		$this->session->unset_userdata('login_details');
		header('location:' . base_url() . 'auth/login');
	}


	public function index()
	{

		$data['views'] = $this->datawork->callingdata('emp_details');

		$this->load->view('index', $data);
	}
	public function insert()
	{
		$timeF = time();
		$hash = md5($timeF);

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
		$this->form_validation->set_rules('designation', 'designation', 'required');
		$this->form_validation->set_rules('salary', 'salary', 'required');


		if ($this->form_validation->run()) {
			if (isset($_FILES['image'])) {
				$encode1 = substr($hash, 0, 15);
				$config2['upload_path']      = './assets/';
				$config2['allowed_types']    = 'jpg|jpeg|png';
				$config2['file_name']        = "emp_" . $encode1;

				$this->load->library('upload', $config2);
				$this->upload->initialize($config2);
				if ($this->upload->do_upload('image')) {
					$data = $this->upload->data();

					$config2['image_library']    = 'gd2';
					$config2['source_image']     = './assets/' . $data["file_name"];
					$config2['create_thumb']     = FALSE;
					$config2['maintain_ratio']   = FALSE;
					$config2['quality']          = '60%';
					$config2['new_image']        = './assets/' . $data["file_name"];
					$this->load->library('image_lib', $config2);
					$this->image_lib->initialize($config2);
					$this->image_lib->resize();
					$image1 = $data['file_name'];
				} else {
					$image1 = "";
				}
			}

			$data = [
				'name' => $_POST['name'],
				'address' => $_POST['address'],
				'designation' => $_POST['designation'],
				'picture' => $image1,
				'salary' => $_POST['salary']
			];
			$this->datawork->insertdata('emp_details', $data);
			$this->session->set_flashdata('msg', "<div class='alert bg-success text-white bg-gradient'>Employee added successfully</div>");

			redirect('home/index');
		} else {
			$this->load->view('add');
		}
	}
	public function delete_data($id = null)
	{
		if ($id != null) {
			$this->datawork->deletedata('emp_details', array('id' => $id));
			$this->session->set_flashdata('msgs', "<div class='alert bg-danger text-white bg-gradient'>Employee removed successfully</div>");

			redirect('home/index');
		}
	}
	public function update_data()
	{
		$id = $_POST['id'];
		$timeF = time();
		$hash = md5($timeF);

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
		$this->form_validation->set_rules('designation', 'designation', 'required');
		$this->form_validation->set_rules('salary', 'salary', 'required');


		if ($this->form_validation->run()) {
			if (isset($_FILES['image'])) {
				$encode1 = substr($hash, 0, 15);
				$config2['upload_path']      = './assets/';
				$config2['allowed_types']    = 'jpg|jpeg|png';
				$config2['file_name']        = "emp_" . $encode1;

				$this->load->library('upload', $config2);
				$this->upload->initialize($config2);
				if ($this->upload->do_upload('image')) {
					$data = $this->upload->data();

					$config2['image_library']    = 'gd2';
					$config2['source_image']     = './assets/' . $data["file_name"];
					$config2['create_thumb']     = FALSE;
					$config2['maintain_ratio']   = FALSE;
					$config2['quality']          = '60%';
					$config2['new_image']        = './assets/' . $data["file_name"];
					$this->load->library('image_lib', $config2);
					$this->image_lib->initialize($config2);
					$this->image_lib->resize();
					$image1 = $data['file_name'];
				} else {
					$image1 = "";
				}
			}

			$data = [
				'name' => $_POST['name'],
				'address' => $_POST['address'],
				'designation' => $_POST['designation'],
				'picture' => $image1,
				'salary' => $_POST['salary']
			];
			$this->datawork->updatedata('emp_details', $data, array('id' => $id));
			$this->session->set_flashdata('msgss', "<div class='alert bg-warning text-white bg-gradient'>Updated successfully</div>");

			redirect('home/index');
		} else {
			redirect('home/update' . $id);
		}
	}
	public function update($id = null)
	{
		$data['del'] = $this->datawork->callingSingle('emp_details', array('id' => $id));

		$this->load->view('update', $data);
	}
}
