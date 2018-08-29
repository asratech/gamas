<?php
  class Model_perizinan extends CI_Model {

      public $table = 'mst_perizinan';

    public function get()
    {
      // Jalankan query
      $query = $this->db->get($this->table);

      // Return hasil query
      return $query;
    }

    public function get_offset($limit, $offset)
    {
      // Jalankan query
      $query = $this->db
        ->limit($limit, $offset)
        ->get($this->table);

      // Return hasil query
      return $query;
    }

    public function get_where($where)
    {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get($this->table);

      // Return hasil query
      return $query;
    }

    public function insert($data)
    {
      // Jalankan query
      $query = $this->db->insert($this->table, $data);

      // Return hasil query
      return $query;
    }

    public function update($kode_izin, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('kode_izin', $kode_izin)
        ->update($this->table, $data);
      
      // Return hasil query
      return $query;
    }

    public function delete($kode_izin)
    {
      // Jalankan query
      $query = $this->db
        ->where('kode_izin', $kode_izin)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }
    public function buat_kode()   {
		  $this->db->select('RIGHT(mst_perizinan.kode_izin,4) as kode', FALSE);
		  $this->db->order_by('kode_izin','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('mst_perizinan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "M.IZIN-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
    }
    // Mengambil data wilayah
    function getwilayah(){
      $this->db->order_by('id_wilayah','ASC');
      return $this->db->get('mst_wilayah');
    }
}