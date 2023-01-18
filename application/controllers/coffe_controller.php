<?php
class coffe_controller extends CI_Controller {
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('coffe_model');
	// }


	public function __construct()
    {
        parent::__construct();
        $this->load->model('coffe_model');
        if ($this->session->userdata('status') != 'login')
        {
            redirect(site_url('login_controller/login'));
        }
    }

    public function index()
    {
        $data['tb_coffe'] = $this->coffe_model->tampil_data();
        $this->load->view('daftar_coffe',$data);
    }

    public function add()
    {
        $this->load->view('add_coffe');
    }

    public function save()
    {
        if ($this->input->post('save')) {
            $this->coffe_model->simpan();
            redirect('coffe_controller/index','refresh');

        }else{
            redirect('coffe_controller/add','refresh');
        }
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['tb_coffe'] = $this->coffe_model->edit_coffe($where, 'tb_coffe')->result();
        $this->load->view('edit_coffe',$data);
    }

    public function update_coffe_db()
    {
        $id_coffe = $this->input->post('id');
        $nama_coffe = $this->input->post('nama_coffe');
        $harga = $this->input->post('harga');
        $data = array(
            'nama_coffe' => $nama_coffe,
            'harga' => $harga
        );

        $where = array(
            'id' => $id_coffe
        );

        $this->coffe_model->update_coffe($where, $data, 'tb_coffe');
        redirect('coffe_controller/index');
    }

    public function hapus($id)
    {
        $where = array ('id' => $id);
        $this->coffe_model->hapus_coffe($where,'tb_coffe');
        redirect('coffe_controller/index');
    }

	// function index(){
	// 	$produks = $this->coffe_model->select();
	// 	$data['produks'] = null;
	// 	foreach ($produks as $prd) {
	// 		$prd['url'] = anchor('produk/edit/'.$prd['id'],'EDIT','class="btn btn-sm btn-warning"').
	// 					anchor('produk/hapus/'.$prd['id'],'HAPUS','class="btn btn-sm btn-danger ms-2"');
	// 		$data['produks'][]=$prd;
	// 	}
	// 	$konten['konten']=$this->load->view('produk',$data,true);
	// 	$this->load->view('template',$konten);
	// 	// $this->load->view('produk',$data);
		
	// }
	// function edit($id){
	// 	$key['id']=$id;
	// 	$produk = $this->coffe_model->select($key);
	// 	$produks = $this->coffe_model->select();

	// 	$data['produk'] = $produk[0];

	// 	$data['produks'] = null;
	// 	foreach ($produks as $prd) {
	// 		$prd['url'] = anchor('produk/edit/'. $prd['id'], 'EDIT', 'class="btn btn-sm btn-warning"').
	// 					anchor('produk/hapus/'. $prd['id'], 'HAPUS', 'class="btn btn-sm btn-danger ms-2"');
	// 		$data['produks'][]=$prd;
	// 	}
	// 	$konten['konten']=$this->load->view('produk',$data,true);
	// 	$this->load->view('template',$konten);
	// }

	// function simpan(){
	// 	$this->load->library('form_validation');

	// 	$this->form_validation->set_rules('nama_coffe', "NAMA PRODUK", 'required');
	// 	$this->form_validation->set_rules('harga', "BARCODE", 'required|numeric');

	// 	$data['nama_coffe'] = $this->input->post('nama_coffe');
	// 	$data['harga'] = $this->input->post('barcode');
		
	// 	if($this -> form_validation -> run()) {
	// 		$data['nama_coffe'] = $this -> input -> post ('nama_coffe');
	// 		$data['harga'] = $this -> input -> post ('harga');
	// 		if ($this->input->post('update')!=null) {
	// 			$key['id'] = $this->input->post('id');
	// 			$this->coffe_model->update($key, $data);
	// 		} else {
	// 			$this->coffe_model->insert($data);
	// 			return redirect('produk');
	// 		}
	// 	}
	// 	$this->index();
	// }

	// function hapus($id) {
	// 	$this->coffe_model->delete($id);
	// 	$this->index();
	// }
}
