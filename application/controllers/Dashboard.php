<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('Model_sabuk', 'm_sabuk');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['subjudul'] = 'Data Menu Management';

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$data['sabuk'] = $this->m_sabuk->getAllSabuk();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
