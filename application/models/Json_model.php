<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Schaltjahr? echo date('L');

class Json_model extends CI_Model
{
	function __construct() {
		$this->load->database();
	}

	function readdata($tablename, $sorting, $direction, $start, $size, $search) {
		// SELECT * FROM fields LEFT JOIN tables ON fields.id_table = tables.id WHERE tables.name = 'tables'
		$this->db->select('fields.*');
		$this->db->from('fields');
		$this->db->join('tables', 'fields.id_table = tables.id', 'left');
		$this->db->where('tables.name', $tablename);
		$query = $this->db->get();
		$result['fields']=$query->result_array();
		$this->db->select('*');
		$this->db->from('tables');
		$this->db->where('name', $tablename);
		$query = $this->db->get();
		$result['table']=$query->result_array();
		$this->db->select('*');
		$this->db->from($tablename);
		if($search !== NULL) {
			foreach( $result['fields'] as $field ) {
				$this->db->or_like($field['name'], $search);
			}
		}
		if($sorting !== NULL) {
			if($direction == NULL) {
				$direction = "DESC";
			}
			$this->db->order_by($sorting,$direction);
		}
		if($start !== NULL and $size !== NULL) {
			$this->db->limit($size, $start);
		}
		$query = $this->db->get();
		$result['rows'] = $query->num_rows();
		foreach ($query->result_array() as $row) {
			//$result['data'][$row['id']] = $row;
			$result['data'][] = $row;
		}
		return $result;
	}

	function read($tablename, $sorting = NULL, $direction = NULL, $start = NULL, $size = NULL, $search = NULL) {
		$result = $this->readdata($tablename, $sorting, $direction, $start, $size, $search);
		return json_encode($result);
	}

	function create($tablename, $dataset) {
		$this->db->insert($table_config("tablename"), $dataset);
		$query = $this->db->query("SELECT * FROM " . $table_config("tablename") . " WHERE ". $table_config("id") ." = LAST_INSERT_ID();");
		$row = array();
		foreach($query->result_array() as $ro) {
			$row = $ro;
		}
		$Result = array();
		$Result['Result'] = "OK";
		$Result['Record'] = $row;
		return json_encode($Result);
	}

	function update($tablename, $dataset) {
		$id=$dataset['id'];
		unset($dataset['id']);
		$this->db->where("id", $id);
		$this->db->update($tablename, $dataset);
		$Result = array();
		$Result['Result'] = "OK";
		return json_encode($Result);
	}

	function delete($tablename, $id) {
		$this->db->delete($tablename, array("id" => $id));
		$Result = array();
		$Result['Result'] = "OK";
		return json_encode($Result);
	}

	function getrows($tablename, $search = NULL) {
		$data = $this->readdata($tablename,NULL,NULL,NULL,NULL,$search);
		$Result = array();
		$Result['rows'] = $data['rows'];
		return json_encode($Result);
	}

	/*function _selectedfields($table_config)  {
		$result = array();
		foreach($table_config["fields"] ) {

		}
	}*/
}
?>
