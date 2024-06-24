<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EarthlyAngelMessage_m extends CI_Model
{
	private $table = "pray_earthly_message";					//Admin table
	
	public function get_message($where){
        $this->db->where($where);
        return $this->db->order_by("rand()")->limit(1)->get($this->table)->row_array();
	}
	
}
?>