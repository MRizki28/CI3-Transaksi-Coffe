<?php
class Pembelian_model extends CI_Model{

	public function __construct(){
		$this->table = 'tb_pembelian';
		$this->id = 'id_pembelian';
	}
	public function insert_detail($data){
		$this->db->insert('tb_detail_pembelian', $data);
	}
	public function insert($data){
		$this->db->insert($this->table, $data);
	}


	public function select_detail($key=null){
		if($key != null){
			$this->db->where($key);
		}
		// $this->db->select('id_detail_pembelian','nama_coffe','sum(jumlah)as jumlah');
		// $this->db->select('id_detail_pembelian','harga','sum(jumlah)as jumlah');
		// $this->db->group_by('tb_coffe.id');
		$this->db->join('tb_coffe','tb_coffe.id = tb_detail_pembelian.id_coffe');
		// return $this->db->get($this->table)->result_array();
		return $this->db->get('tb_detail_pembelian')->result_array();
	}
	public function select($key=null){
		if($key != null){
			$this->db->where($key);
		}
		// return $this->db->get($this->table)->result_array();
		return $this->db->get('tb_pembelian')->result_array();
	}

	public function delete_detail($id_produk) {
		$this->db->where('id_detail_pembelian', $id_produk);
		$this->db->delete('tb_detail_pembelian');
	}

/////

	public function update($key, $data){
		$this->db->where($key);
		$this->db->update($this->table, $data);
	}

	public function delete($id_produk) {
		$this->db->where('id_pembelian', $id_produk);
		$this->db->delete('tb_pembelian');
	}
}
