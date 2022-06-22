<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_Kota extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getAll(){
		$query = $this->db->query('SELECT * FROM kota');
        return $query->result();
	}
}
?>