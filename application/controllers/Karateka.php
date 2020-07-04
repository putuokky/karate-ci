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
				'sabuk' => $sabuk,
				'is_active' => 1
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

	public function detail($id)
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Detail Karateka';

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$data['biodata'] = $this->m_biodata->getBiodataById($id);
		$data['karate'] = $this->m_karate->getKarateByIdBio($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('karateka/tabel_detail', $data);
		$this->load->view('templates/footer', $data);
	}

	public function ujian($id)
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Detail Ujian';

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$data['karate'] = $this->m_karate->getKarateById($id);

		$this->form_validation->set_rules('tglujian', 'Tanggal Ujian', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('karateka/ujian', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id'); // tidak perlu ini diubah
			$idbio = $this->input->post('idbio'); // tidak perlu ini diubah
			$tglujian = date('Y-m-d', strtotime($this->input->post('tglujian')));

			$data = [
				'tgl_ujian' => $tglujian
			];

			$this->m_karate->ubahDataKarate($data, $id);
			$this->session->set_flashdata('message', 'ditambah');
			redirect('log/karateka/detail/' . $idbio);
		}
	}

	public function ijasah($id)
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Detail Ijasah';

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$data['karate'] = $this->m_karate->getKarateById($id);
		$data['bio'] = $this->m_biodata->getAllBiodata();
		$data['sabuk'] = $this->m_sabuk->getAllSabuk();

		$this->form_validation->set_rules('tglijasah', 'Tanggal Ijasah', 'required');
		$this->form_validation->set_rules('noijasah', 'No. Ijasah', 'required');
		$this->form_validation->set_rules('nilairata', 'Nilai Rata', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('karateka/ijasah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id'); // tidak perlu ini diubah
			$idbio = $this->input->post('idbio'); // tidak perlu ini diubah
			$tglijasah = date('Y-m-d', strtotime($this->input->post('tglijasah')));
			$noijasah = $this->input->post('noijasah');
			$nilairata = str_replace(',', '.', $this->input->post('nilairata'));
			$sabukbaru = $this->input->post('sabukbaru');

			$data = [
				'tgl_ijasah' => $tglijasah,
				'no_ijasah' => $noijasah,
				'nilai_rata' => $nilairata,
				'is_active' => 0
			];

			$dt = [
				'biodata' => $idbio,
				'sabuk' => $sabukbaru,
				'is_active' => 1
			];

			$this->m_karate->ubahDataKarate($data, $id);
			$this->m_karate->tambahDataKarateNewSabuk($dt);
			$this->session->set_flashdata('message', 'ditambah');
			redirect('log/karateka/detail/' . $idbio);
		}
	}
}
