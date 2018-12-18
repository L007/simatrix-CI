<?php 

Class Keranjang_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function show_cart($id_produk){
		$list=[];
		for ($i=0; $i < count($_SESSION["id_produk"]); $i++) { 
			$req = $this->db->query("SELECT * 
				FROM produk p JOIN users u
				on p.id_user=u.id_user
				where id_produk=".$_SESSION['id_produk'][$i])->result();


			foreach ($req as $item) {
				$list[$i]=array(
					'id_produk'=>$item->id_produk,
					'nama_produk'=>$item->nama_produk,
					'harga'=>$item->harga,
					'jumlah_stok'=>$item->jumlah_stok,
					'foto_produk'=>$item->foto_produk,
					'deskripsi'=>$item->deskripsi,
					'jumlahBeli'=>$_SESSION["jumlah"][$i],
					'penjual'=>$item->nama
				);
			}
			//var_dump($req);
		}
		return $list;
	}

	public function bayar_cart($id_user,$id_produk,$jumlah){
		$insert1 = $this->db->query("INSERT INTO tb_penjualan (id_penjualan, id_user,tanggal,status) 
			VALUES (NULL, '".$id_user."',curdate(),'belum bayar')");

		$id_penjualan;
		$select1=$this->db->query("SELECT * from tb_penjualan where id_user=$id_user order by id_penjualan DESC LIMIT 0,1")->result();
		foreach ($select1 as $item) {
			$id_penjualan=$item->id_penjualan;
		}


		for ($i=0; $i < count($_SESSION["id_produk"]) ; $i++) { 
			$insert2 = $this->db->query("INSERT INTO 
				`detail_penjualan`(`id_penjualan`, `id_produk`, `jumlah`, `total_harga`, `tanggal`) 
				VALUES ($id_penjualan,".$_SESSION['id_produk'][$i].",".$_SESSION['jumlah'][$i].",
				(SELECT harga from produk where id_produk=".$_SESSION['id_produk'][$i].")*".$_SESSION['jumlah'][$i].",curdate())");
		}

		unset($_SESSION['id_produk']);
		unset($_SESSION['jumlah']);
	}
}
?>