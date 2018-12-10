<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function show_stat_admin(){
		//$data=array();
		/*$req = $db->query("SELECT SUM(jumlah) AS terjual 
			from detail_penjualan dp JOIN produk p ON dp.id_produk=p.id_produk
			GROUP BY Month(tanggal)");
		$req2 = $db->query("SELECT sum(jumlah_stok) as jumlah_stok FROM produk");
		$req3 = $db->query("SELECT p.nama_produk FROM detail_penjualan dp
			JOIN produk p on dp.id_produk=p.id_produk 
			GROUP by dp.id_produk,Month(dp.tanggal)
			order by dp.jumlah desc LIMIT 0,1");*/

		$req1 = $this->db->query("SELECT SUM(jumlah) AS terjual from detail_penjualan dp JOIN produk p ON dp.id_produk=p.id_produk GROUP BY Month(tanggal) ORDER BY Month(tanggal) DESC LIMIT 1")->row(); /*$this->db->SELECT('SUM(jumlah) as terjual')
							->FROM('detail_penjualan dp')
							->JOIN('produk p','dp.id_produk=p.id_produk')
							->GROUP_BY('Month(tanggal)')
							->ORDER_BY('Month(tanggal)','DESC')
							->get();
							->result();*/
		$req2=$this->db->query("SELECT sum(jumlah_stok) as jumlah_stok FROM produk")->row();

		$req3 = $this->db->query("SELECT p.nama_produk FROM detail_penjualan dp
			JOIN produk p on dp.id_produk=p.id_produk 
			GROUP by dp.id_produk,Month(dp.tanggal)
			order by dp.jumlah desc LIMIT 0,1")->row();


	return array(
		'terjual' => $req1,
		'jumlah_stok' =>$req2,
		'produk_terlaris' => $req3

	);	
	}
}


 ?>