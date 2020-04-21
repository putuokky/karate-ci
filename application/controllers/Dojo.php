<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dojo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_dojo', 'm_dojo');
		$this->load->model('model_user', 'm_user');
	}

	public function index()
	{
		$data['judul'] = 'Dojo';
		$data['subjudul'] = 'Data Dojo';

		$data['dojo'] = $this->m_dojo->getAllDojo();

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dojo/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Dojo';
		$data['subjudul'] = 'Form Tambah Dojo';

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->form_validation->set_rules('namadojo', 'Nama Dojo', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dojo/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$namadojo = $this->input->post('namadojo');

			$data = [
				'nama_dojo' => $namadojo
			];

			$this->m_dojo->tambahDataDojo($data);
			$this->session->set_flashdata('message', 'ditambah');
			redirect('log/dojo');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Dojo';
		$data['subjudul'] = 'Form Ubah Dojo';

		$data['dojo'] = $this->m_dojo->getDojoById($id);

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->form_validation->set_rules('namadojo', 'Nama Dojo', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dojo/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$namadojo = $this->input->post('namadojo');

			$data = [
				'nama_dojo' => $namadojo
			];

			$this->m_dojo->ubahDataDojo($data, $id);
			$this->session->set_flashdata('message', 'diubah');
			redirect('log/dojo');
		}
	}
}
