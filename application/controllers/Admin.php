<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CController {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Featuremodel'));
    }

    public function index() {
//        $evnt[] = array('id'=>'','')
        $this->load->view('layout/index');
    }

    public function getmenu() {
        $menu = $this->Featuremodel->getMenuByRole($this->session->userdata('role'));
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($menu->result());
    }

    public function dashboard($id) {
        $data = array();
        $data = array();
        $status = array('not_satisfied', 'not_bad', 'satisfied', 'very_satisfied', 'undefined');
        foreach ($status as $value){
            $condition = "satisfaction='$value'";
            if($value=='undefined'){
                $condition = "satisfaction is null OR satisfaction=''";
            }
            $sat = $this->db->query("select * from guest_book where id_event=$id AND $condition");
            if($sat){
                $data[] = count($sat->result());
            }else{
                $data[] = 0;
            }
        }
        $series[] = array('name'=>'Jumlah','data'=>$data);
        $this->load->view('layout/chart',array('series'=>$series,'status'=>$status));
    }

}
