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
}
?>