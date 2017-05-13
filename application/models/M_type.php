<?php

class M_type extends CI_Model{
	function get(){
		return $this->db->get('type');
	}

}
