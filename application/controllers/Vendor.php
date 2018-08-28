<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    
    // Cek apakah user sudah login
    $this->cekLogin();

    // Load model vendor
    $this->load->model('model_vendor');

    // Load Library pdf
    $this->load->library('pdf');
  }

  public function index()
  {
    // Load library pagination
    $this->load->library('pagination');

    // Pengaturan pagination
    $config['base_url'] = base_url('vendor/index/');
    $config['total_rows'] = $this->model_vendor->get()->num_rows();
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
    $data['pageTitle'] = 'Management Vendor Perizinan';
    $data['vendor'] = $this->model_vendor->get_offset($config['per_page'], $config['offset'])->result();
    $data['pageContent'] = $this->load->view('vendor/vendorList', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama vendor,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama_vendor', 'Nama Vendor', 'required');

      // Mengatur validasi data contact,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('alamat_vendor', 'Alamat Vendor', 'required');

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('telepon_vendor', 'Telepon Vendor', 'required');

      // Mengatur validasi data posisi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama_pic', 'Nama PIC', 'required');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {
        $kode_vendor = $this->model_vendor->buat_kode();
        $data = array(
          'kode_vendor'=>$kode_vendor,
          'nama_vendor' => $this->input->post('nama_vendor'),
          'alamat_vendor' => $this->input->post('alamat_vendor'),
          'telepon_vendor' => $this->input->post('telepon_vendor'),
          'email_vendor' => $this->input->post('email_vendor'),
          'nama_pic' => $this->input->post('nama_pic'),
          'createby' => $this->session->userdata('nama'),
        );

        // Jalankan function insert pada model_vendor
        $query = $this->model_vendor->insert($data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan master Vendor');
        else $message = array('status' => false, 'message' => 'Gagal menambahkan master Vendor');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('vendor', 'refresh');
			} 
    }
    
    // Data untuk page vendor/add
    $data['pageTitle'] = 'Tambah Data Master Vendor';
    $data['pageContent'] = $this->load->view('vendor/vendorAdd', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function detail($id_vendor = null)
  {
    // Ambil data vendor dari database
    $vendor = $this->model_vendor->get_where(array('id_vendor' => $id_vendor))->row();
    $kode_vendor = $this->model_vendor->buat_kode();
    
    // Jika data vendor tidak ada maka show 404
    if (!$vendor) show_404();

    // Data untuk page vendor/detail
    $data['pageTitle'] = 'Detail Master Vendor';
    $data['vendor'] = $vendor;
    $data['pageContent'] = $this->load->view('vendor/vendorDetail', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function edit($id_vendor = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data nama perusahaan,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama_vendor', 'Nama Vendor', 'required');

      // Mengatur validasi data contact,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('alamat_vendor', 'Alamat Vendor', 'required');

      // Mengatur validasi data tanggal berakhir,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('telepon_vendor', 'Telepon Vendor', 'required');
      

      // Mengatur validasi data posisi,
      // # required = tidak boleh kosong
      $this->form_validation->set_rules('nama_pic', 'Nama PIC', 'required');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
			if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nama_vendor' => $this->input->post('nama_vendor'),
          'alamat_vendor' => $this->input->post('alamat_vendor'),
          'telepon_vendor' => $this->input->post('telepon_vendor'),
          'email_vendor' => $this->input->post('email_vendor'),
          'nama_pic' => $this->input->post('nama_pic')
        );

        // Jalankan function update pada model_vendor
        $query = $this->model_vendor->update($id_vendor, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui data vendor');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui data vendor');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('vendor'.$id, 'refresh');
			} 
    }
    
    // Ambil data vendor dari database
    $vendor = $this->model_vendor->get_where(array('id_vendor' => $id_vendor))->row();

    // Jika data vendor tidak ada maka show 404
    if (!$vendor) show_404();

    // Jika data vendor diedit oleh user lain maka show 404
    //if ($vendor->username !== $this->session->userdata('username')) show_404();

    // Data untuk page vendor/add
    $data['pageTitle'] = 'Edit Data Master Vendor';
    $data['vendor'] = $vendor;
    $data['pageContent'] = $this->load->view('vendor/vendorEdit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($id_vendor)
  {
    // Ambil data vendor dari database
    $vendor = $this->model_vendor->get_where(array('id_vendor' => $id_vendor))->row();

    // Jika data vendor tidak ada maka show 404
    if (!$vendor) show_404();

    // Jika data vendor didelete oleh user lain maka show 404
    //if ($vendor->username !== $this->session->userdata('username')) show_404();

    // Jalankan function delete pada model_vendor
    $query = $this->model_vendor->delete($id_vendor);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Data Master Vendor');
    else $message = array('status' => true, 'message' => 'Gagal menghapus data master vendor');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('vendor', 'refresh');
  }

  // Laporan PDF
  public function laporanvendor(){
  $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Laporan Data Vendor',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Master Data Vendor PT. Sejahtera Buana Trada',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'Kode Vendor',1,0);
        $pdf->Cell(27,6,'NAMA Vendor',1,0);
        $pdf->Cell(90,6,'Alamat',1,0);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(25,6,'Telpon',1,1);
        $pdf->Cell(25,6, 'Email',1,1);
        $pdf->SetFont('Arial','',10);
        $vendor = $this->db->get('mst_vendor')->result();
        foreach ($vendor as $row){
            $pdf->Cell(20,6,$row->kode_vendor,1,0);
            $pdf->Cell(27,6,$row->nama_vendor,1,0);
            $pdf->Cell(90,6,$row->alamat_vendor,1,0);
            $pdf->Cell(25,6,$row->telepon_vendor,1,1); 
            $pdf->Cell(25,6,$row->email_vendor,1,1); 
        }
        $pdf->Output();
    }
}