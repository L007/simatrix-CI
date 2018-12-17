<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

Class Penjual_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function show_stat_penjual(){
		$id_user = $this->session->userdata('id_user');

		$req1 = $this->db->query("SELECT SUM(jumlah) AS terjual 
			from detail_penjualan dp JOIN produk p ON dp.id_produk=p.id_produk
			WHERE p.id_user=".$id_user."
			GROUP BY Month(tanggal)
			ORDER BY Month(tanggal) DESC LIMIT 1")->row();

		$req2 =$this->db->query("SELECT sum(jumlah_stok) as jumlah_stok FROM produk WHERE id_user=".$id_user)->row();

		$req3 = $this->db->query("SELECT p.nama_produk, sum(dp.jumlah) as jumlah FROM detail_penjualan dp
			JOIN produk p on dp.id_produk=p.id_produk
			where p.id_user=".$id_user."
			GROUP by dp.id_produk,Month(dp.tanggal)
			order by jumlah  desc LIMIT 0,1")->row();



		return array(
		'terjual' => $req1,
		'jumlah_stok' =>$req2,
		'produk_terlaris' => $req3

	);
	}

}


 ?>