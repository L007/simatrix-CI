<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Product_model extends CI_Model{

	public function show_all_product(){
		//$query = $this->db->get('produk');
		$this->db->SELECT('*')
		->FROM('produk')
		->join('users','produk.id_user=users.id_user');

		$query = $this->db->get();

		return $query->result();
	}


}



 ?>