<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CController {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('EventModel'));
		
	}
	
	public function index()
	{
		$this->load->view('event/index');
	}
	
	public function insert() {
		$this->load->view('event/insert');
	}

	public function insertData() {
		$data['event_name'] = $this->input->post('event_name');
		$data['event_description'] = $this->input->post('event_description');
		$data['date_start'] = $this->input->post('date_start');
		$data['date_end'] = $this->input->post('date_end');
		$data['place'] = $this->input->post('place');
		$data['pic'] = $this->input->post('pic');
		$data['created_at'] = date('Y-m-d h:i:s');
		$this->EventModel->simpan($data);
		echo 'Data Berhasil Disimpan.';
	}

	public function edit($id) {

		$event = $this->EventModel->getById($id);
		
		$this->load->view('event/edit',array(
			'data'=>$event
		));
	}

	public function editData($id) {
		
		$data['event_name'] = $this->input->post('event_name');
		$data['event_description'] = $this->input->post('event_description');
		$data['date_start'] = $this->input->post('date_start');
		$data['date_end'] = $this->input->post('date_end');
		$data['place'] = $this->input->post('place');
		$data['pic'] = $this->input->post('pic');
		$data['modified_at'] = date('Y-m-d h:i:s');
		$this->EventModel->update($id,$data);
		echo 'Data Berhasil Disimpan.';
	}

	public function delete($id) {

		$this->EventModel->delete($id);
		$this->load->view('event/delete');
		echo 'Data Berhasil Dihapus.';
	}

	public function getEvent() {

		$data=$this->EventModel->get();
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data->result() as $result){
			
			$json_array=array();

			$json_array[]=$result->event_name;
			$json_array[]=$this->getDateMonth($result->date_start);
			$json_array[]=$this->getDateMonth($result->date_end);
			//$json_array[]=$result->place;
			//$json_array[]=$result->pic;
			$json_array[]=$result->id_event;
			
			$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */