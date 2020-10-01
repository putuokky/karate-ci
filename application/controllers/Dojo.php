<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dojo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('Model_dojo', 'm_dojo');
	}

	public function index()
	{
		$data['judul'] = 'Dojo';
		$data['subjudul'] = 'Data Dojo';

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
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('log/dojo');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Dojo';
		$data['subjudul'] = 'Form Ubah Dojo';

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

		$data['dojo'] = $this->m_dojo->getDojoById($id);

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
			$this->session->set_flashdata('message', 'Diubah');
			redirect('log/dojo');
		}
	}

	public function hapus($id)
	{
		$this->m_dojo->hapusDataDojo($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('log/dojo');
	}
}
