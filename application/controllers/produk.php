<?php
class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
	}

	function index(){
		if ($this->session->has_userdata('username')) {
			$produks = $this->produk_model->select();
		// $data['produks'] = $this->produk_model->select();
		$data['produks'] = null;
		foreach ($produks as $prd) {
			$prd['url'] = anchor('produk/edit/'.$prd['id'],'EDIT','class="btn btn-sm btn-warning"').
						anchor('produk/hapus/'.$prd['id'],'HAPUS','class="btn btn-sm btn-danger ms-2"');
			$data['produks'][]=$prd;
		}
		$konten['konten']=$this->load->view('produk',$data,true);
		$this->load->view('template',$konten);
		// $this->load->view('produk',$data);
		}else{
			$this->load->view('login');
		}
		
	}
	function login()
	{
		$this->load->model('user_model');
		$key['username']=$this->input->post('username');
		$key['password']=$this->input->post('password');
		$user = $this->user_model->select($key);
		if (count($user)>0) {
			$this->session->set_userdata('username',$this->input->post('username'));
			$this->index();
		}
	}
	function logout()
	{
		$this->session->unset_userdata('username');
		$this->index();
	}

	function edit($id){
		$key['id']=$id;
		$produk = $this->produk_model->select($key);
		$produks = $this->produk_model->select();

		$data['produk'] = $produk[0];

		$data['produks'] = null;
		foreach ($produks as $prd) {
			$prd['url'] = anchor('produk/edit/'. $prd['id'], 'EDIT', 'class="btn btn-sm btn-warning"').
						anchor('produk/hapus/'. $prd['id'], 'HAPUS', 'class="btn btn-sm btn-danger ms-2"');
			$data['produks'][]=$prd;
		}
		$konten['konten']=$this->load->view('produk',$data,true);
		$this->load->view('template',$konten);
	}

	function simpan(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('namaproduk', "NAMA PRODUK", 'required');
		$this->form_validation->set_rules('barcode', "BARCODE", 'required|numeric');

		$data['namaproduk'] = $this->input->post('namaproduk');
		$data['barcode'] = $this->input->post('barcode');
		if($this -> form_validation -> run()) {
			$data['namaproduk'] = $this -> input -> post ('namaproduk');
			$data['barcode'] = $this -> input -> post ('barcode');
			if ($this->input->post('update')!=null) {
				$key['id'] = $this->input->post('id');
				$this->produk_model->update($key, $data);
			} else {
				$this->produk_model->insert($data);
				return redirect('produk');
			}
		}
		$this->index();
	}

	function hapus($id) {
		$this->produk_model->delete($id);
		$this->index();
	}
}
