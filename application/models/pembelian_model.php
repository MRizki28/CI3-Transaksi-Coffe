<?php
class Pembelian_model extends CI_Model{

	// public function __construct(){
	// 	$this->table = 'pembelian';
	// 	$this->id = 'idpembelian';
	// }
	public function insert_detail($data){
		$this->db->insert('detailpembelian', $data);
	}

	public function select_detail($key=null){
		if($key != null){
			$this->db->where($key);
		}
		$this->db->join('produk','produk.id = detailpembelian.idproduk');
		// return $this->db->get($this->table)->result_array();
		return $this->db->get('detailpembelian')->result_array();
	}
	public function select($key=null){
		if($key != null){
			$this->db->where($key);
		}
		// return $this->db->get($this->table)->result_array();
		return $this->db->get('pembelian')->result_array();
	}

	public function delete_detail($idproduk) {
		$this->db->where('iddetailpembelian', $idproduk);
		$this->db->delete('detailpembelian');
	}

/////

	public function update($key, $data){
		$this->db->where($key);
		$this->db->update($this->table, $data);
	}

	public function delete($id_produk) {
		$this->db->where('idpembelian', $id_produk);
		$this->db->delete('pembelian');
	}
}
