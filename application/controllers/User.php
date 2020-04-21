<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_roleuser', 'm_roleuser');
	}

	public function index()
	{
		$data['judul'] = 'User';
		$data['subjudul'] = 'Data User';

		if ($this->session->userdata('role_id') == 1) {
			$data['users'] = $this->m_user->getAllUsers();
		} else {
			$data['users'] = $this->m_user->getAllUser();
		}

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'User';
		$data['subjudul'] = 'Form Tambah User';

		if ($this->session->userdata('role_id') == 1) {
			$data['role'] = $this->m_roleuser->getAllRoleusers();
		} else {
			$data['role'] = $this->m_roleuser->getAllRoleuser();
		}

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('mail', 'Email', 'required|valid_email|is_unique[user.email]', [
			'is_unique' => 'This Email has already registered!'
		]);
		$this->form_validation->set_rules('passwrd', 'Password', 'required');
		$this->form_validation->set_rules('roleusr', 'Role User', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('users/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$nama = $this->input->post('nama');
			$mail = $this->input->post('mail');
			$passwrd = password_hash($this->input->post('passwrd'), PASSWORD_DEFAULT);
			$roleusr = $this->input->post('roleusr');
			$status = $this->input->post('status');

			$data = [
				'name' => $nama,
				'email' => $mail,
				'password' => $passwrd,
				'role_id' => $roleusr,
				'is_active' => $status,
				'date_user' => time()
			];

			$this->m_user->tambahDataUsers($data);
			$this->session->set_flashdata('message', 'ditambah');
			redirect('log/user');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'User';
		$data['subjudul'] = 'Form Ubah User';

		$data['user'] = $this->m_user->getUsersById($id);
		if ($this->session->userdata('role_id') == 1) {
			$data['role'] = $this->m_roleuser->getAllRoleusers();
		} else {
			$data['role'] = $this->m_roleuser->getAllRoleuser();
		}

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('roleusr', 'Role User', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('users/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$nama = $this->input->post('nama');
			$roleusr = $this->input->post('roleusr');
			$status = $this->input->post('status');

			$data = [
				'name' => $nama,
				'role_id' => $roleusr,
				'is_active' => $status,
				'date_user' => time()
			];

			$this->m_user->ubahDataUsers($data, $id);
			$this->session->set_flashdata('message', 'diubah');
			redirect('log/user');
		}
	}
}
