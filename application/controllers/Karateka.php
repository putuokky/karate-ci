<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karateka extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('Model_biodata', 'm_biodata');
		$this->load->model('Model_dojo', 'm_dojo');
		$this->load->model('Model_karate', 'm_karate');
		$this->load->model('Model_sabuk', 'm_sabuk');
	}

	public function index()
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Data Karateka';

		$data['biodata'] = $this->m_karate->getAllKarate();

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('karateka/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Form Tambah Karateka';

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$data['nama'] = $this->m_biodata->getBiodataByStatus();
		$data['sabuk'] = $this->m_sabuk->getAllSabuk();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('sabuk', 'Sabuk', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('karateka/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('nama');
			$nama = $this->input->post('nama');
			$sabuk = $this->input->post('sabuk');

			$data = [
				'biodata' => $nama,
				'sabuk' => $sabuk
			];

			$dt = [
				'status_karateka' => 1
			];

			$this->m_karate->tambahDataKarate($data);
			$this->m_biodata->ubahDataBioForStatus($dt, $id);
			$this->session->set_flashdata('message', 'ditambah');
			redirect('log/karateka');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Form Ubah Karateka';

		$data['biodata'] = $this->m_biodata->getBiodataById($id);
		$data['dojo'] = $this->m_dojo->getAllDojo();

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tglahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jnskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('dojo', 'Dojo', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('karateka/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$nama = $this->input->post('nama');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tglahir = date('Y-m-d', strtotime($this->input->post('tglahir')));
			$jnskelamin = $this->input->post('jnskelamin');
			$dojo = $this->input->post('dojo');

			$data = [
				'nama' => $nama,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tglahir,
				'jenis_kelamin' => $jnskelamin,
				'dojo' => $dojo
			];

			$this->m_biodata->ubahDataBiodata($data, $id);
			$this->session->set_flashdata('message', 'diubah');
			redirect('log/karateka');
		}
	}

	public function detail($id)
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Detail Karateka';

		$data['biodata'] = $this->m_biodata->getBiodataById($id);
		$data['karate'] = $this->m_karate->getKarateByIdBio($id);

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('karateka/tabel_detail', $data);
		$this->load->view('templates/footer', $data);
	}
}
