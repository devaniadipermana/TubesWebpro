<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array( 
			'username' => $username,
			'password' => $password
			);
		$cek = $this->m_login->cek_login("user",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

            //create a session if successful
			$this->session->set_userdata($data_session);

            //redirect to user's controller
			redirect(base_url("user"));

		}else{
			redirect(base_url("login"));
		}
    }
    
    function register(){
        $this->load->view('register');
    }

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}