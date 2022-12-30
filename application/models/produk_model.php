<?php
class Produk_model extends CI_Model{
	public function __construct(){
		$this->table = 'produk';
		$this->id = 'id';
	}

	public function insert($data){
		$this->db->insert($this->table, $data);
	}

	public function select($key=null){
		if($key != null){
			$this->db->where($key);
		}
		// return $this->db->get($this->table)->result_array();
		return $this->db->get('produk')->result_array();
	}

	public function update($key, $data){
		$this->db->where($key);
		$this->db->update('produk', $data);
	}

	public function delete($id_produk) {
		$this->db->where('id', $id_produk);
		$this->db->delete('produk');
	}
}