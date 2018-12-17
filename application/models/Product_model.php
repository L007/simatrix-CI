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
		->WHERE('p.id_user='.$id_user)
		->ORDER_BY('p.id_produk','DESC');

		$query = $this->db->get();
		return $query->result();
	}
	public function insert_product($tabel,$data){
		$this->db->insert($tabel,$data);
	}
	public function delete_product($tabel,$id){
		$this->db->delete($tabel,array('id_produk'=>$id));
	}
	public function edit_data($tabel,$where){
		$this->db->SELECT('*')
		->FROM($tabel)
		->WHERE('id_produk='.$where);
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get_where($tabel,$where)->result();
	}

	public function update_data($where,$data,$tabel){
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}


}



 ?>