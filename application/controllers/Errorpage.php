<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errorpage extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
	}

	public function index()
	{
		$data['judul'] = '404 Page Not Found';
		$data['subjudul'] = '404 Error Page';
		$data['konten'] = 'Kami tidak dapat menemukan halaman yang Anda cari.';
		$data['kontenBreak'] = 'Sementara itu, kamu mungkin';

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('errorpage/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
