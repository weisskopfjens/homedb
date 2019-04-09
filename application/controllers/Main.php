<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

	function __construct() {
        parent::__construct();
				$this->load->database();
				$this->load->library(['ion_auth', 'form_validation']);
        $this->load->model('json_model');
    }

  function index() {
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data['content']=$this->load->view('mainmenu',"",true);
		$data['content']=$data['content'].$this->load->view('crudtable',"",true);
		$this->load->view('default',$data);
	}

	function gettable($tablename,$sorting=NULL,$direction=NULL,$start=NULL,$size=NULL,$search=NULL) {
		header('Content-Type: application/json');
		$data["content"] = $this->json_model->read($tablename,$sorting,$direction,$start,$size,$search);
		$this->load->view('json', $data);
	}

	function getrows($tablename,$search=NULL) {
		header('Content-Type: application/json');
		$data["content"] = $this->json_model->getrows($tablename,$search);
		$this->load->view('json', $data);
	}

	function updatetable($tablename) {
		header('Content-Type: application/json');
		$jsondata = $this->input->post("json");
		/*foreach($jsondata as $key => $value) {
			echo $key;
		}*/
		$json = json_decode($jsondata,true);
		$data["content"] = $this->json_model->update($tablename,$json["fields"]);
		$data["content"] = $jsondata;
		$this->load->view('json', $data);
	}

}
?>
