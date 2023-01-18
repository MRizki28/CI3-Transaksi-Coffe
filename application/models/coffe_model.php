<?php
class coffe_model extends CI_Model{

   private $table = 'tb_coffe';
   

   public function tampil_data()
   {
    return $this->db->get($this->table)->result();
   }

   public function simpan()
   {

    $this->load->library('form_validation');
    $this->form_validation->set_rules('nama_coffe','NAMA COFFE', 'required');
    $this->form_validation->set_rules('harga','HARGA', 'required');

    $nama_coffe = $this->input->post('nama_coffe');
    $harga = $this->input->post('harga');

    if ($this->form_validation->run()) {
        $nama_coffe = $this->input->post('nama_coffe');
        $harga = $this->input->post('harga');
        $data = array (
            'nama_coffe' => $nama_coffe,
            'harga' => $harga
        );
        $this->db->insert('tb_coffe' , $data);
    
    }else{
        echo "<script>alert('Ada data yang kosong!');history.go(-1);</script>";
    }

   

  
   }


   public function edit_coffe($where,$table)
   {
    return $this->db->get_where($table,$where);
   }

   public function update_coffe($where,$data,$table)
   {
    $this->db->where($where);
    $this->db->update('tb_coffe',$data);
   }
   
   public function hapus_coffe($where,$table)
   {
    $this->db->where($where);
    $this->db->delete($table);
   }



   public function select($key=null){
	if($key != null){
		$this->db->where($key);
	}
	// return $this->db->get($this->table)->result_array();
	return $this->db->get('tb_coffe')->result_array();
}
}
