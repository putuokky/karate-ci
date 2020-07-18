<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sabuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_sabuk', 'm_sabuk');
		$this->load->model('model_user', 'm_user');
	}

	public function index()
	{
		$data['judul'] = 'Sabuk';
		$data['subjudul'] = 'Data Sabuk';

		$data['sabuk'] = $this->m_sabuk->getAllSabuk();

		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('sabuk/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Sabuk';
		$data['subjudul'] = 'Form Tambah Sabuk';

		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);

		$this->form_validation->set_rules('namasabuk', 'Nama Sabuk', 'required');
		$this->form_validation->set_rules('warnasabuk', 'Warna Sabuk', 'required');
		$this->form_validation->set_rules('warnatulisan', 'Warna Tulisan', 'required');
		$this->form_validation->set_rules('tingkatsabuk', 'Tingkatan Sabuk', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('sabuk/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$namasabuk = $this->input->post('namasabuk');
			$warnasabuk = $this->input->post('warnasabuk');
			$warnatulisan = $this->input->post('warnatulisan');
			$tingkatsabuk = $this->input->post('tingkatsabuk');

			$data = [
				'nama_sabuk' => $namasabuk,
				'warna_sabuk' => $warnasabuk,
				'warna_tulisan' => $warnatulisan,
				'tingkatan_sabuk' => $tingkatsabuk
			];

			$this->m_sabuk->tambahDataSabuk($data);
			$this->session->set_flashdata('message', 'ditambah');
			redirect('log/sabuk');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Sabuk';
		$data['subjudul'] = 'Form Ubah Sabuk';

		$data['sabuk'] = $this->m_sabuk->getSabukById($id);

		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);

		$this->form_validation->set_rules('namasabuk', 'Nama Sabuk', 'required');
		$this->form_validation->set_rules('warnasabuk', 'Warna Sabuk', 'required');
		$this->form_validation->set_rules('warnatulisan', 'Warna Tulisan', 'required');
		$this->form_validation->set_rules('tingkatsabuk', 'Tingkatan Sabuk', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('sabuk/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$namasabuk = $this->input->post('namasabuk');
			$warnasabuk = $this->input->post('warnasabuk');
			$warnatulisan = $this->input->post('warnatulisan');
			$tingkatsabuk = $this->input->post('tingkatsabuk');

			$data = [
				'nama_sabuk' => $namasabuk,
				'warna_sabuk' => $warnasabuk,
				'warna_tulisan' => $warnatulisan,
				'tingkatan_sabuk' => $tingkatsabuk
			];

			$this->m_sabuk->ubahDataSabuk($data, $id);
			$this->session->set_flashdata('message', 'diubah');
			redirect('log/sabuk');
		}
	}
}
