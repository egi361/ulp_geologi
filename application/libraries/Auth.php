<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Authentication Libraray
 * 
 */


class Auth {
    
    public $CI = null;
    
    function __construct(){
        $this->CI =& get_instance();
		$auth=$this->CI->config->item('auth');
		$this->CI->load->library('session');
		$this->CI->load->model('UserModel');
		$this->CI->UserModel=&$this->CI->UserModel;
    }
    
    function do_login($username,$password){
            $cek=$this->CI->UserModel->cek_user($username,$password);
			if($cek){
            $session_data = array(
                'id' => $cek->id_user,
                'nama' => $cek->nama,
				'role'=>$cek->id_role
            );
            
            $this->CI->session->set_userdata($session_data);
            return true;}
			else{
			return FALSE;}
    }
    
    function is_logged_in(){
        if($this->CI->session->userdata('id') ==''){
            return false;
        }
        return true;
    }

    function do_logout(){
        $this->CI->session->sess_destroy();
    }
    
    
    
}