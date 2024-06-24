<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HanielPray_m extends CI_Model
{
	private $table = "pray_michael";					//Admin table
	
	public function get_item($where){
        $this->db->where($where);
        return $this->db->get($this->table)->row_array();
	}
	
	public function add_item($info){
	   $this->db->insert($this->table, $info);
		return $this->db->insert_id();
	}
}
?>