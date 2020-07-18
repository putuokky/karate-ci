<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_submenu', 'm_submenu');
		$this->load->model('model_menu', 'm_menu');
		$this->load->model('model_user', 'm_user');
	}

	public function index()
	{
		$data['judul'] = 'SubMenu Management';
		$data['subjudul'] = 'Data SubMenu Management';

		$data['submenu'] = $this->m_submenu->getAllSubMenu();

		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('submenu/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'SubMenu Management';
		$data['subjudul'] = 'Form Tambah SubMenu Management';

		$data['menu'] = $this->m_menu->getAllMenu();

		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);

		$this->form_validation->set_rules('submenu', 'SubMenu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required|valid_url');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('submenu/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$menu = $this->input->post('menu');
			$submenu = $this->input->post('submenu');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$urutan = $this->input->post('urutan');
			$status = $this->input->post('status');

			$data = [
				'menu_id' => $menu,
				'submenu' => $submenu,
				'url' => $url,
				'icon' => $icon,
				'is_active' => $status,
				'urutan_user_sub_menu' => $urutan
			];

			$this->m_submenu->tambahDataSubMenu($data);
			$this->session->set_flashdata('message', 'ditambah');
			redirect('log/submenu');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'SubMenu Management';
		$data['subjudul'] = 'Form Ubah SubMenu Management';

		$data['submenu'] = $this->m_submenu->getSubMenuById($id);
		$data['menu'] = $this->m_menu->getAllMenu();

		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);

		$this->form_validation->set_rules('submenu', 'SubMenu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('submenu/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id'); // tidak perlu ini diubah
			$menu = $this->input->post('menu');
			$submenu = $this->input->post('submenu');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$urutan = $this->input->post('urutan');
			$status = $this->input->post('status');

			$data = [
				'menu_id' => $menu,
				'submenu' => $submenu,
				'url' => $url,
				'icon' => $icon,
				'is_active' => $status,
				'urutan_user_sub_menu' => $urutan
			];

			$this->m_submenu->ubahDataSubMenu($data, $id);
			$this->session->set_flashdata('message', 'diubah');
			redirect('log/submenu');
		}
	}
}
