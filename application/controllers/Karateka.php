<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karateka extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('Model_biodata', 'm_biodata');
		$this->load->model('Model_dojo', 'm_dojo');
		$this->load->model('Model_sabuk', 'm_sabuk');
		$this->load->model('Model_karate', 'm_karate');
	}

	public function index()
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Data Karateka';

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
		$this->load->view('karate/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Form Tambah Karateka';

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
			$this->load->view('karate/formtambah', $data);
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
			redirect('log/karateka');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Form Ubah Karateka';

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
			$this->load->view('karate/formubah', $data);
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
			redirect('log/karateka');
		}
	}

	public function detail($id)
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Detail Karateka';

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
		$data['karate'] = $this->m_karate->getKarateByIdBio($id);
		$data['dojo'] = $this->m_biodata->getBioDojoById($id);
		$data['sabuk'] = $this->m_karate->getKarateByIdBio($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('karate/tabel_detail', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambahsabuk($id)
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Form Tambah Sabuk Karateka';

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

		$data['nama'] = $this->m_biodata->getAllBiodata();


		$data['biodata'] = $this->m_biodata->getBiodataById($id);
		$data['sabuk'] = $this->m_sabuk->getAllSabuk();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('sabuk', 'Sabuk', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('karate/formtambahsabuk', $data);
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

	public function ujian($id)
	{
		$data['judul'] = 'Karateka';
		$data['subjudul'] = 'Detail Ujian';

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

		$data['karate'] = $this->m_karate->getKarateById($id);

		$this->form_validation->set_rules('tglujian', 'Tanggal Ujian', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('karate/ujian', $data);
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
			$this->load->view('karate/ijasah', $data);
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
