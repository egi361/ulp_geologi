<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
		 $this->load->library(array('auth','session'));
		 $this->load->helper('url');
    }

    public function index() {
        if ($this->auth->is_logged_in() == false) {
			echo $this->auth->is_logged_in(); 
            $this->load->view('layout/login');
        }
    }
    function login() {
        if(isset($_POST['Login']) && ($_POST['Login'])) {
			$username = $_POST['Login']['username'];
			$pass = md5($_POST['Login']['password']);
			$succes = $this->auth->do_login($username, $pass);
			if($succes) {
			$data['data']='Admin';
				$this->load->view('layout/redirect',$data);
			}else{
			$data['error']= '<div class="form-group has-error">
			                    <div class="block-error error" for="form-password">Password atau username salah</div>
			                </div>';
				// redirect('Login');
				$this->load->view('layout/login',array('data'=>$data));
			}
		}
    }

    public function error() {

        if ($this->session->userdata('level') !== '') {
            echo "Mohon Maaf Terjadi Kesalahan";
        }
    }

    function logout() {
  
        $this->auth->do_logout();

        redirect(base_url());
    }
    

}
