<?php
class pembelian_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('coffe_model');
        $this->load->model('pembelian_model');
        if ($this->session->userdata('status') != 'login') {
			redirect(site_url('login_controller/masuk'));
		}
	}

	public function index()
    {
        $key['status'] = 'y';
        $pembelian = $this->pembelian_model->select($key);
        if(count($pembelian)== 0)
        {
            unset($pembelian);
            $pembelian['tanggal'] = date('Y-m-d');
            $pembelian['status'] = 'y';
            $this->pembelian_model->insert($pembelian);
        }
        $pembelian = $this->pembelian_model->select($key)[0];
        $key_detail['id_pembelian'] = $pembelian['id_pembelian'];
        $data['detilss'] = $this->pembelian_model->select_detail($key_detail);
        $data['produks'] = $this->coffe_model->select();
        $data['pembelian']=$pembelian ;

		$konten['konten']=$this->load->view('pembelian',$data,true);
		$this->load->view('template',$konten);
        // $this->load->view('transaksi',$data);

       
    }
    public function simpan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_coffe','id pembelian','');
        $this->form_validation->set_rules('id_pembelian','id pembelian','');
        $this->form_validation->set_rules('nama_pembeli','Nama Pembeli','required');
        $this->form_validation->set_rules('jumlah','jumlah','required');

        if ($this->form_validation->run()) {
            $detil['id_coffe']=$this->input->post('id_coffe');
            $detil['id_pembelian']=$this->input->post('id_pembelian');
            $detil['nama_pembeli']=$this->input->post('nama_pembeli');
            $detil['jumlah']=$this->input->post('jumlah');
            $this->pembelian_model->insert_detail($detil);
             
        redirect(site_url('pembelian_controller/index'));
        }else{
            echo "<script>alert('Ada data yang kosong!');history.go(-1);</script>";
        }

     
    }
    public function hapus($id)
    {
        $this->pembelian_model->delete_detail($id);
        redirect(site_url('pembelian_controller/index'));

    }
}
