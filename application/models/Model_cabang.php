<?php
  class Model_cabang extends CI_Model {
    // Tabel pada database
    public $table = 'mst_cabang';

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

    public function update($id_cabang, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_cabang', $id_cabang)
        ->update($this->table, $data);
      
      // Return hasil query
      return $query;
    }

    public function delete($id_cabang)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_cabang', $id_cabang)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }
    
  }