<?php 
    class Register extends CI_Controller{

        function __construct(){
            parent::__construct();		
            $this->load->model('m_register');
            $this->load->helper('url');
        }
        
        function tambah(){
            $this->load->view('register');
        }
    
        function aksi_register(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $umur = $this->input->post('umur');
    
            $data = array(
                'username' => $username,
                'password' => $password,
                'nama_lengkap' => $nama_lengkap,
                'umur' => $umur
                );
            echo $data['name'];
            $this->m_register->input_data($data,'user');
            redirect(base_url("login"));
        }
    }
?>