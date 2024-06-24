<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber_m extends CI_Model
{
	private $table = "pray_subscribers";
	
   	public function get_list($where = NULL){
        if($where)
            $this->db->where($where);
        return $this->db->get($this->table)->result_array();
   	}
	
	public function get_item($where = NULL){
	    if($where)
            $this->db->where($where);
        return $this->db->get($this->table)->row_array();
	}
	
	public function add_item($info){
	   $this->db->insert($this->table, $info);
		return $this->db->insert_id();
	}


}

?>