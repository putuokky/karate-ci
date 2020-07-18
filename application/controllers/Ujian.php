<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
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
		$data['judul'] = 'Ujian';
		$data['subjudul'] = 'Data Ujian';

		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);

		$data['karate'] = $this->m_karate->getKarateByTglUjian();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('ujian/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
