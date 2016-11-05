<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class CController extends CI_Controller {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
$this->load->helper('url');
        setlocale(LC_ALL, $this->getLocaleOS());
		$this->load->library(array('auth','session'));
		if($this->auth->is_logged_in()==false){
		redirect('Login');}
    }

    public function getDateMonth($date) {
        return strftime("%d %B %Y" , strtotime($date));
    }
	public function getDateTime($date) {
        return strftime("%d %B %Y %H:%M" , strtotime($date));
    }

    protected function getLocaleOS($loc = "id") {
		
        $os = (php_uname()) ? php_uname() : PHP_OS;
        if ($loc == "en") {
            $locale = (strtoupper(substr($os, 0, 3)) === 'WIN') ? "American" : "en_EN";
        } else {
            $locale = (strtoupper(substr($os, 0, 3)) === 'WIN') ? "Indonesian" : "id_ID";
        }
        return $locale;
    }
}

class PublicController extends CI_Controller {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
$this->load->helper('url');
        setlocale(LC_ALL, $this->getLocaleOS());
		$this->load->library(array('auth','session'));
    }

    public function getDateMonth($date) {
        return strftime("%d %B %Y", strtotime($date));
    }

    protected function getLocaleOS($loc = "id") {
        $os = (php_uname()) ? php_uname() : PHP_OS;
        if ($loc == "en") {
            $locale = (strtoupper(substr($os, 0, 3)) === 'WIN') ? "American" : "en_EN";
        } else {
            $locale = (strtoupper(substr($os, 0, 3)) === 'WIN') ? "Indonesian" : "id_ID";
        }
        return $locale;
    }
}

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
$this->load->helper('url');
    }

}