<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('Model_biodata', 'm_biodata');
		$this->load->model('Model_dojo', 'm_dojo');
		$this->load->model('Model_sabuk', 'm_sabuk');
	}

	public function index()
	{
		$data['judul'] = 'Biodata';
		$data['subjudul'] = 'Data Biodata';

		// untuk session login wajib isi
		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);
		// end untuk session login wajib isi

		// konten default pada template wajib isi
		$data_config = $this->m_config->getConfig('brand');
		$data['brand'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('main_header');
		$data['main_header'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('version');
		$data['version'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('nama_pengembang');
		$data['nama_pengembang'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('link_pengembang');
		$data['link_pengembang'] = $data_config->config_value;
		// end konten default pada template wajib isi

		$data['biodata'] = $this->m_biodata->getAllBiodata();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('biodata/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Biodata';
		$data['subjudul'] = 'Form Tambah Biodata';

		// untuk session login wajib isi
		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);
		// end untuk session login wajib isi

		// konten default pada template wajib isi
		$data_config = $this->m_config->getConfig('brand');
		$data['brand'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('main_header');
		$data['main_header'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('version');
		$data['version'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('nama_pengembang');
		$data['nama_pengembang'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('link_pengembang');
		$data['link_pengembang'] = $data_config->config_value;
		// end konten default pada template wajib isi

		$data['dojo'] = $this->m_dojo->getAllDojo();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tglahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jnskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('dojo', 'Dojo', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('biodata/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
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

			$this->m_biodata->tambahDataBiodata($data);
			$this->session->set_flashdata('message', 'ditambah');
			redirect('log/biodata');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Biodata';
		$data['subjudul'] = 'Form Ubah Biodata';

		// untuk session login wajib isi
		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);
		// end untuk session login wajib isi

		// konten default pada template wajib isi
		$data_config = $this->m_config->getConfig('brand');
		$data['brand'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('main_header');
		$data['main_header'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('version');
		$data['version'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('nama_pengembang');
		$data['nama_pengembang'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('link_pengembang');
		$data['link_pengembang'] = $data_config->config_value;
		// end konten default pada template wajib isi

		$data['biodata'] = $this->m_biodata->getBiodataById($id);
		$data['dojo'] = $this->m_dojo->getAllDojo();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tglahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jnskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('dojo', 'Dojo', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('biodata/formubah', $data);
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
			redirect('log/biodata');
		}
	}
}
