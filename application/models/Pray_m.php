<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pray_m extends CI_Model
{
	private $table = "pray_note";					//Admin table
	
	public function get_list($where = NULL){
		if($where)
			$this->db->where($where);
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

	// public function get_companies(){
	// 	$query = "SELECT a.*, b.count 
	// 	FROM (
	// 		SELECT * 
	// 		FROM admin WHERE ROLE = '1') a 
	// 	LEFT JOIN (
	// 		SELECT company_id, COUNT(id) AS COUNT 
	// 		FROM admin WHERE ROLE != '0' 
	// 		GROUP BY company_id) b 
	// 	ON a.company_id = b.company_id";
	// 	$result = $this->db->query($query);
	// 	return $result->result_array();
	// }
}

?>