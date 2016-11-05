<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		$this->load->model(array('EventModel'));
        $event = $data=$this->EventModel->get();
        $evnt = array();
        foreach ($event->result() as $value){
            $evnt[] = array('id'=>$value->id_event, 'text'=>$value->event_name);
        }
        $this->load->view('dashboard/dashboard',array('event'=>$evnt));
    }


}
