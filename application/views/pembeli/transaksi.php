<!DOCTYPE html>
<html>
<head>
	<title></title>
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

						<li><a href="<?php echo base_url('keranjang/showCart') ?>">Keranjang</a></li>
						<li class="active"><a href="<?php echo base_url('transaksi/showTransaksiPembeli')?>">Transaksi</a></li>

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
	</nav><div class="container">
		<br><br><br>
		<table class="table" style="margin-top: 30px;">

			<tr>

				<th>No</th>
				<!-- <th>id produk</th> -->
				<th>id Transaksi</th>
				<th>tanggal</th>
				<th>status</th>
				<th>action</th>



			</tr>

			<?php 
			$no=1;
			foreach ($posts as $item) { ?>


			<tr>
				<td><?php echo $no; ?></td>

				<td><?php echo $item['id_penjualan']; ?></td>
				<td><?php echo $item['tanggal']; ?></td>
				<td><?php echo $item['status']; ?></td>
				<td>
				<a href="?controller=keranjang&action=detailTransaksiPembeli&id_penjualan=<?php echo $item['id_penjualan']; ?>"> <button class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button></a>
				</td>

			</tr>
			<?php
			$no++;
		}
		
		?>


	</table>


</div>
<br><br><br>
</body>
</html>