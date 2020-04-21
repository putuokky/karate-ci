<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_menu', 'm_menu');
		$this->load->model('model_user', 'm_user');
	}

	public function index()
	{
		$data['judul'] = 'Menu Management';
		$data['subjudul'] = 'Data Menu Management';

		$data['menu'] = $this->m_menu->getAllMenu();

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Menu Management';
		$data['subjudul'] = 'Form Tambah Menu Management';

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$menu = $this->input->post('menu');
			$urutan = $this->input->post('urutan');
			$status = $this->input->post('status');

			$data = [
				'menu' => $menu,
				'is_active_menu' => $status,
				'urutan_user_menu' => $urutan
			];

			$this->m_menu->tambahDataMenu($data);
			$this->session->set_flashdata('message', 'ditambah');
			redirect('log/menu');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Menu Management';
		$data['subjudul'] = 'Form Ubah Menu Management';

		$data['menu'] = $this->m_menu->getMenuById($id);

		$maile = $this->session->userdata('email');
		$data['userlogin'] = $this->m_user->getUserByMail($maile);

		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$menu = $this->input->post('menu');
			$urutan = $this->input->post('urutan');
			$status = $this->input->post('status');

			$data = [
				'menu' => $menu,
				'is_active_menu' => $status,
				'urutan_user_menu' => $urutan
			];

			$this->m_menu->ubahDataMenu($data, $id);
			$this->session->set_flashdata('message', 'diubah');
			redirect('log/menu');
		}
	}
}
