<?php
class user_model extends CI_Model{
	public function __construct(){
		$this->table = 'user';
		$this->id = 'username';
	}

	public function insert($data){
		$this->db->insert($this->table, $data);
	}

	public function select($key=null){
		if($key != null){
			$this->db->where($key);
		}
		// return $this->db->get($this->table)->result_array();
		return $this->db->get('user')->result_array();
	}

	public function update($key, $data){
		$this->db->where($key);
		$this->db->update('user', $data);
	}

	public function delete($id_produk) {
		$this->db->where('username', $id_produk);
		$this->db->delete('user');
	}
}
