<?php
class Hitung extends CI_Controller {
	public function index()
	{
		$this->load->view('input');
	}
	public function kalkulasi(){
		$var1 = $this->input->post("var1");
		$var2 = $this->input->post("var2");
		echo ($var1+$var2);
	}
}