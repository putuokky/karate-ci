<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('Model_sabuk', 'm_sabuk');
		$this->load->model('Model_karate', 'm_karate');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['subjudul'] = 'Data Menu Management';

		// untuk session login wajib isi
		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);
		// end untuk session login wajib isi

		// konten default pada template wajib isi
		$data_config = $this->m_config->getConfig('brand');
		$data['brand'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('main_header');
		$data['main_header'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('main_footer');
		$data['main_footer'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('version');
		$data['version'] = $data_config->config_value;
		// end konten default pada template wajib isi

		$data['sabuk'] = $this->m_sabuk->getJumlahSabuk();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
