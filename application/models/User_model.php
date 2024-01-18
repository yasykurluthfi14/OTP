<?php
class User_model extends CI_Model{
	
	private $table = "data_salary";
    private $table1 = "data_company";

	private $table2 = "user";
	
	function get_user($id_user){
		$hsl=$this->db->query("SELECT * FROM user WHERE id_user = $id_user ");
		return $hsl;
	}

	function get_status($id_user){
		$hsl=$this->db->query("SELECT status_fitur FROM user WHERE id_user = $id_user ");
		return $hsl->result_array();
	}	


	function get_employee(){
		$hsl=$this->db->query("SELECT * FROM data_salary ");
		return $hsl;
	}

    function get_company(){
		$hsl=$this->db->query("SELECT * FROM data_company");
		return $hsl;
	}

    function get_salary(){
		$hsl=$this->db->query("SELECT * FROM data_salary");
		return $hsl;
	}
	function request_access($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function request_access_fitur($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function insert_employee($data){
		return $this->db->insert($this->table, $data);
	}

    function insert_company($data){

		return $this->db->insert($this->table1, $data);
	}

	function update_company($id_company, $data){
		return $this->db->update($this->table1, $data, array("id_company =>'$id_company'"));
	}

	function delete_company($id_company){
		$hsl=$this->db->query("DELETE FROM data_company WHERE id_company='$id_company'");
		return $hsl;
	}

    function insert_salary($data){
		return $this->db->insert($this->table, $data);
	}

	function update_salary($id_employee, $data){
		return $this->db->update($this->table, $data, array("id_employee =>'$id_employee'"));
	}

	function delete_salary($id_employee){
		$hsl=$this->db->query("DELETE FROM data_salary WHERE id_employee='$id_employee'");
		return $hsl;
	}
	
	
}