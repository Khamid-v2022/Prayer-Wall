<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pray_m extends CI_Model
{
	private $table = "pray_note";					//Admin table
	
	public function get_list($where = NULL){
		if($where)
			$this->db->where($where);
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get($this->table)->result_array();
	}

	public function get_show_list(){
		$this->db->where('is_publish', 'yes');
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(50);
		return $this->db->get($this->table)->result_array();
	}

	public function get_today_pray_count(){
		$this->db->where('created_at <', date('Y-m-d H:i:s'));
		$this->db->where('created_at >=', date('Y-m-d'));
		return $this->db->get($this->table)->num_rows();
	}


	public function add_pray_note($req){
		$this->db->insert($this->table, $req);
		return $this->db->insert_id();
	}

	public function update_note($info, $where){
		$this->db->where($where);
		$this->db->update($this->table, $info);
	}

	public function delete_note($where){
		$this->db->where($where);
		$this->db->delete($this->table);
	}

}

?>