<?php
class pembelian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
        $this->load->model('pembelian_model');
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
        $key_detail['idpembelian'] = $pembelian['idpembelian'];
        $data['detilss'] = $this->pembelian_model->select_detail($key_detail);
        $data['produks'] = $this->produk_model->select();
        $data['pembelian']=$pembelian ;

		$konten['konten']=$this->load->view('transaksi',$data,true);
		$this->load->view('template',$konten);
        // $this->load->view('transaksi',$data);

        // var_dump()
    }
    public function simpan()
    {
        $detil['idproduk']=$this->input->post('idproduk');
        $detil['idpembelian']=$this->input->post('idpembelian');
        $detil['jumlah']=$this->input->post('jumlah');
        $this->pembelian_model->insert_detail($detil);
        redirect(site_url('pembelian'));
    }
    public function hapus($id)
    {
        $this->pembelian_model->delete_detail($id);
        redirect(site_url('pembelian'));

    }
}
