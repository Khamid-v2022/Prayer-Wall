<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MmPray_m extends CI_Model
{
	private $table = "pray_mm";					//Admin table
	
	public function get_item($where){
        $this->db->where($where);
        return $this->db->get($this->table)->row_array();
	}
	
	public function add_item($info){
	   $this->db->insert($this->table, $info);
		return $this->db->insert_id();
	}

	public function get_item_from2($where){
        $this->db->where($where);
        return $this->db->get("pray_mm2")->row_array();
	}

	public function add_item_to2($info){
	   $this->db->insert("pray_mm2", $info);
		return $this->db->insert_id();
	}

}
?>