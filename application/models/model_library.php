<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_library extends CI_model{
	public function insertData($table_name,$data)
	{
		$insert = $this->db->insert($table_name,$data);
		return $insert;
	}
	public function getAllData($table_name){
		$data = $this->db->get($table_name);
		return $data->result_array();
	}
	function delete($table_name,$id,$id_db){
		$this->db->delete($table_name, array($id_db => $id));
		return;
	}
	function getData($table_name, $id,$id_db){
		$query = $this->db->where($id_db, $id)
		 					->get($table_name);
		if($query->num_rows()>0){
			return $query->row();
		}
	}
	function update($table_name, $data, $id, $id_db){
		$this->db->where($id_db, $id);
		$this->db->update($table_name, $data);
	}
}