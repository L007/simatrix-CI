<!DOCTYPE html>
<html>
<head>
	<title>detail produk</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- style custom -->
	<link rel="stylesheet" type="text/css" 
	href="<?php echo base_url('assets/css/style.css'); ?>">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	
</head>
<body class="body-custom">

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url('home/homePembeli') ?>">simatrix</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url('home/homePembeli') ?>">Home <span class="sr-only">(current)</span></a></li>
					<!-- <li><a href="komoditas.html">Daftar Komoditas</a></li>
						<li><a href="#">Cara Pemesanan</a></li> -->

						<li class="active"><a href="<?php echo base_url('keranjang/showCart') ?>">Keranjang</a></li>
						<li><a href="<?php echo base_url('transaksi/showTransaksiPembeli')?>">Transaksi</a></li>

					</ul>
				<!-- <form class="navbar-form navbar-left">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form> -->
				<ul class="nav navbar-nav navbar-right">
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li>

						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="pembatas"></div>

		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="<?php echo base_url('keranjang/addCart') ?>" method="POST" >
					<!-- <input type="hidden" name="controller" value="keranjang">
					<input type="hidden" name="action" value="addCart"> -->

					<?php foreach ($produk as $item) {

						?>
						<input type="hidden" name="id_produk" value="<?php echo $item->id_produk; ?>">
						<h2><?php echo $item->nama_produk ?></h2>
						<div class="card" style="width: 50rem; height:auto; margin-bottom:30px;">
							<img class="card-img-top" src="<?php echo base_url('assets/foto_produk/').$item->foto_produk; ?>" alt="Card image cap">
							<div class="card-block">
								
								<p class="card-text">
									<font size="4" color="#2196F3"><b><p> <?php echo "Rp ". number_format($item->harga,0,".",".")."/kg"; ?></p></b></font>


								</p>
								<p class="card-text">

									Stok :<b> <?php echo $item->jumlah_stok." "; ?>kg</b> <br>
									Oleh : <b><?php echo $item->nama; ?></b>
								</p>

							</div>
						</div>





						<p><h2>Deksripsi</h2><p align="justify">
							<div class="card" style="width: 50rem; height:auto; margin-bottom:30px;">

								<div class="card-block">


									<p class="card-text">

										<?php echo $item->deskripsi; ?>
									</p>

								</div>
							</div>
						</p>
						
						<div class="form-group">
							<label style="color: #242D3E;">Jumlah pembelian </label>
							<input type="number" min="50" max="<?php echo $item->jumlah_stok; ?>" name="jumlah" class="form-control" placeholder="Masukkan jumlah pembelian" required autofocus>
						</div>



						<button type="submit" class="btn btn-primary" style="width:40%" type="submit">Masukkan ke keranjang</button>
						<br><br><br>
					</div>


				</form>

				<?php } ?>


			</body>
			</html>