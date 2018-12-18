<?php
Class Transaksi_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function show_transaksi_pembeli($id_user){
		return $this->db->query("SELECT * from tb_penjualan where id_user=".$id_user)->result();

	}

	public function detail_transaksi_pembeli($id_penjualan){
		return $this->db->query("SELECT p.nama_produk,dp.jumlah,dp.total_harga,dp.tanggal FROM detail_penjualan dp
			JOIN produk p on dp.id_produk=p.id_produk
			WHERE id_penjualan=".$id_penjualan)->result();

	}

	public function show_transaksi_admin(){
		return $this->db->query("SELECT id_penjualan,u.nama,tanggal,status from tb_penjualan o 
		JOIN users u ON o.id_user=u.id_user")->result();
	}

 	public function edit_status_transaksi($id_penjualan){
 		$id_produk=array();
		$jumlah=array();
		

		
		$req2 = $this->db->query("SELECT * FROM detail_penjualan 
			WHERE id_penjualan=".$id_penjualan)->result();
		//var_dump($req2);

		foreach ($req2 as $item) {

			$id_produk[] = $item->id_produk;
			$jumlah[]=$item->jumlah;
		}

		
		$req3 = $this->db
		->query("SELECT status FROM tb_penjualan WHERE id_penjualan=".$id_penjualan)->result();
		foreach ($req3 as $item) {

			$status=$item->status;
		}


		if (strcasecmp($status,"belum bayar")==0) {
			for ($i=0; $i <count($jumlah); $i++) { 
				$req4 = $this->db->query("UPDATE produk set 
					jumlah_stok=jumlah_stok-'$jumlah[$i]' 
					where id_produk='$id_produk[$i]'");
			}
			
		}
		$req = $this->db->query("UPDATE tb_penjualan set status='lunas' where id_penjualan=".$id_penjualan);

 	}

 	public function detail_transaksi_admin($id_penjualan){
 		return $this->db->query("SELECT p.nama_produk,dp.jumlah,dp.total_harga,dp.tanggal,u.nama FROM detail_penjualan dp
		JOIN produk p on dp.id_produk=p.id_produk JOIN users u on p.id_user=u.id_user

		WHERE id_penjualan=".$id_penjualan)->result();
 	}

}

?>



