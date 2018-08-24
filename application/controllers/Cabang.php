<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah event sudah login
    $this->cekLogin();

    // Load model cabang
    $this->load->model('model_cabang');
  }

  public function index()
  {
    // Load library pagination
    $this->load->library('pagination');

    // Pengaturan pagination
    $config['base_url'] = base_url('cabang/index/');
    $config['total_rows'] = $this->model_cabang->get()->num_rows();
    $config['per_page'] = 5;
    $config['offset'] = $this->uri->segment(3);

    // Styling pagination
    $config['first_link'] = false;
    $config['last_link'] = false;

    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';

    $config['num_tag_open'] = '<li class="waves-effect">';
    $config['num_tag_close'] = '</li>';

    $config['prev_tag_open'] = '<li class="waves-effect">';
    $config['prev_tag_close'] = '</li>';

    $config['next_tag_open'] = '<li class="waves-effect">';
    $config['next_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $this->pagination->initialize($config);

    // Data untuk page index
    $data['pageTitle'] = 'Master Cabang';
    $data['cabang'] = $this->model_cabang->get_offset($config['per_page'], $config['offset'])->result();
    $data['pageContent'] = $this->load->view('cabang/cabangList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama event,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('namacabang', 'Nama Cabang', 'required');
      $this->form_validation->set_rules('wilayah', 'Wilayah', 'required');
      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s wajib diisi!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'namacabang' => $this->input->post('namacabang'),
          'wilayah' => $this->input->post('wilayah'),
          'createdby' => $this->session->userdata('nama'),

        );

        // Jalankan function insert pada model_events
        $query = $this->model_cabang->insert($data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan cabang');
        else $message = array('status' => true, 'message' => 'Gagal menambahkan cabang');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('cabang', 'refresh');
			} 
    }
    
    // Data untuk page events/add
    $data['pageTitle'] = 'Tambah Data Cabang';
    $data['pageContent'] = $this->load->view('cabang/cabangAdd', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function edit($id_cabang = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama event,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('namacabang', 'Nama Cabang', 'required');

      // Mengatur validasi data contact,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('wilayah', 'Wilayah', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'namacabang' => $this->input->post('namacabang'),
          'wilayah' => $this->input->post('wilayah')
        );

        // Jalankan function insert pada model_events
        $query = $this->model_cabang->update($id_cabang, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui master cabang');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui master cabang');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('cabang', 'refresh');
			} 
    }
    
    // Ambil data event dari database
    $cabang= $this->model_cabang->get_where(array('id_cabang' => $id_cabang))->row();


    // Jika data event tidak ada maka show 404
    if (!$cabang) show_404();

    // Data untuk page events/add
    $data['pageTitle'] = 'Edit Data Cabang';
    $data['cabang'] = $cabang;
    $data['pageContent'] = $this->load->view('cabang/cabangEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($id_cabang)
  {
    // Ambil data event dari database
    $cabang= $this->model_cabang->get_where(array('id_cabang' => $id_cabang))->row();

    // Jika data event tidak ada maka show 404
    if (!$cabang) show_404();

    // Jalankan function delete pada model_events
    $query = $this->model_cabang->delete($id_cabang);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus master cabang');
    else $message = array('status' => true, 'message' => 'Gagal menghapus master cabang');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('cabang', 'refresh');
  }
}