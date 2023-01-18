<?php

class login_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        
    }

    function masuk()
    {
        $this->load->view('login');
    }

    function login_validation()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
        'username' => $username,
        'password' => $password
        );
        $cek = $this->login_model->cek_login("tb_login",$where)->num_rows();
        if($cek > 0){

        $data_session = array(
            'nama' => $username,
            'status' => "login"
            );

        $this->session->set_userdata($data_session);

        redirect('/admin');

        }else{
            echo "<script>alert('Username dan password salah!');history.go(-1);</script>";
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login_controller/masuk');
    }
}