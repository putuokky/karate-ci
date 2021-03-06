<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sabuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('Model_sabuk', 'm_sabuk');
	}

	public function index()
	{
		$data['judul'] = 'Sabuk';
		$data['subjudul'] = 'Data Sabuk';

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

		$data['sabuk'] = $this->m_sabuk->getAllSabuk();

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
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('log/sabuk');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Sabuk';
		$data['subjudul'] = 'Form Ubah Sabuk';

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

		$data['sabuk'] = $this->m_sabuk->getSabukById($id);

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
			$this->session->set_flashdata('message', 'Diubah');
			redirect('log/sabuk');
		}
	}

	public function hapus($id)
	{
		$this->m_sabuk->hapusDataSabuk($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('log/sabuk');
	}
}
