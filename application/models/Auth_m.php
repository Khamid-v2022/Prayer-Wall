<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model
{
	private $table = "admins";					//Admin table
	
	public function get_item($where = NULL){
		if($where)
			$this->db->where($where);
		return $this->db->get($this->table)->row_array();
	}
}

?>