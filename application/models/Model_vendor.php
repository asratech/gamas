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
    
  }