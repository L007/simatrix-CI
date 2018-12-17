<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Product_model extends CI_Model{

	public function show_all_product(){
		//$query = $this->db->get('produk');
		$this->db->SELECT('*')
		->FROM('produk p')
		->join('users u','p.id_user=u.id_user');

		$query = $this->db->get();

		return $query->result();
	}

	public function show_all_product_penjual(){
		$id_user = $this->session->userdata('id_user');
		$this->db->SELECT('*')
		->FROM('produk p')
		->join('users u','p.id_user=u.id_user')
		->WHERE('p.id_user='.$id_user);

		$query = $this->db->get();
		return $query->result();
	}
	public function insert_product($tabel,$data){
		$this->db->insert($tabel,$data);
	}


}



 ?>