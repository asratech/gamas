<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perizinan extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model perizinan
    $this->load->model('model_perizinan');

    // load helper Date
    $this->load->helper('date');

    // Load Library pdf
    $this->load->library('pdf');
  }

  public function index()
  {
    // Load library pagination
    $this->load->library('pagination');

    // Pengaturan pagination
    $config['base_url'] = base_url('perizinan/index/');
    $config['total_rows'] = $this->model_perizinan->get()->num_rows();
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
    $this->form_validation->set_rules('email_vendor', 'Emaid ID', 'trim|required|valid_email');

    // Data untuk page index
    $data['pageTitle'] = 'Management Master Perizinan';
    $data['perizinan'] = $this->model_perizinan->get_offset($config['per_page'], $config['offset'])->result();
    $data['pageContent'] = $this->load->view('perizinan/perizinanList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama perizinan,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('jenis_perizinan', 'Jenis Perizinan', 'required');

      // Mengatur validasi data contact,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('wilayah', 'Wilayah', 'required');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {
        $kode_izin = $this->model_perizinan->buat_kode();
        $data = array(
          'kode_izin'=>$kode_izin,
          'wilayah' => $this->input->post('wilayah'),
          'jenis_perizinan' => $this->input->post('jenis_perizinan'),
          'createby' => $this->session->userdata('nama'),
          'createdate' =>mdate('%Y-%m-%d %H:%i:%s', now())
        );

        // Jalankan function insert pada model_vendor
        $query = $this->model_perizinan->insert($data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan master perizinan');
        else $message = array('status' => false, 'message' => 'Gagal menambahkan master perizinan');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('perizinan', 'refresh');
			} 
    }
    
    // Data untuk page perizinan/add
    $data['wilayah'] = $this->model_perizinan->getwilayah()->result();
    $data['pageTitle'] = 'Tambah Data Master perizinan';
    $data['pageContent'] = $this->load->view('perizinan/perizinanAdd', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function detail($kode_izin = null)
  {
    // Ambil data perizinan dari database
    $perizinan = $this->model_perizinan->get_where(array('kode_izin' => $kode_izin))->row();
    $kode_izin = $this->model_perizinan>buat_kode();
    
    // Jika data perizinan tidak ada maka show 404
    if (!$perizinan) show_404();

    // Data untuk page perizinan/detail
    $data['pageTitle'] = 'Detail Master perizinan';
    $data['perizinan'] = $perizinan;
    $data['pageContent'] = $this->load->view('perizinan/perizinanDetail', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function edit($kode_izin = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama perusahaan,

      // Mengatur validasi data contact,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('jenis_perizinan', 'Jenis perizinan', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'jenis_perizinan' => $this->input->post('jenis_perizinan'),
          'updateby' => $this->session->userdata('nama'),
          'updatedate' =>mdate('%Y-%m-%d %H:%i:%s', now())
        );

        // Jalankan function update pada model_vendor
        $query = $this->model_perizinan->update($kode_izin, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui data perizinan');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui data perizinan');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('perizinan'.$kode_izin, 'refresh');
			} 
    }
    
    // Ambil data perizinan dari database
    $perizinan = $this->model_perizinan->get_where(array('kode_izin' => $kode_izin))->row();

    // Jika data perizinan tidak ada maka show 404
    if (!$perizinan) show_404();

    // Jika data perizinan diedit oleh user lain maka show 404
    //if ($perizinan->username !== $this->session->userdata('username')) show_404();

    // Data untuk page perizinan/add
    $data['pageTitle'] = 'Edit Data Master perizinan';
    $data['perizinan'] = $perizinan;
    $data['pageContent'] = $this->load->view('perizinan/perizinanEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($kode_izin)
  {
    // Ambil data perizinan dari database
    $perizinan = $this->model_perizinan->get_where(array('kode_izin' => $kode_izin))->row();

    // Jika data perizinan tidak ada maka show 404
    if (!$perizinan) show_404();

    // Jika data perizinan didelete oleh user lain maka show 404
    //if ($perizinan->username !== $this->session->userdata('username')) show_404();

    // Jalankan function delete pada model_vendor
    $query = $this->model_perizinan->delete($kode_izin);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Data Master perizinan');
    else $message = array('status' => true, 'message' => 'Gagal menghapus data master perizinan');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('perizinan', 'refresh');
  }

  // Laporan PDF
  public function laporanvendor(){
  $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Laporan Data perizinan',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Master Data perizinan PT. Sejahtera Buana Trada',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'Kode perizinan',1,0);
        $pdf->Cell(27,6,'NAMA perizinan',1,0);
        $pdf->Cell(90,6,'Alamat',1,0);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(25,6,'Telpon',1,1);
        $pdf->Cell(25,6, 'Email',1,1);
        $pdf->SetFont('Arial','',10);
        $perizinan = $this->db->get('mst_vendor')->result();
        foreach ($perizinan as $row){
            $pdf->Cell(20,6,$row->kode_vendor,1,0);
            $pdf->Cell(27,6,$row->nama_vendor,1,0);
            $pdf->Cell(90,6,$row->alamat_vendor,1,0);
            $pdf->Cell(25,6,$row->telepon_vendor,1,1); 
            $pdf->Cell(25,6,$row->email_vendor,1,1); 
        }
        $pdf->Output();
    }
}