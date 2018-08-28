<?php
  class Model_vendor extends CI_Model {

      public $table = 'mst_vendor';

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

    public function update($id_vendor, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_vendor', $id_vendor)
        ->update($this->table, $data);
      
      // Return hasil query
      return $query;
    }

    public function delete($id_vendor)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_vendor', $id_vendor)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }
    public function buat_kode()   {
		  $this->db->select('RIGHT(mst_vendor.kode_vendor,4) as kode', FALSE);
		  $this->db->order_by('kode_vendor','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('mst_vendor');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "VDR-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	  }
}