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
<body>

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
				<a class="navbar-brand" href="<?php echo base_url('home/homePenjual') ?>">simatrix</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo base_url('home/homePenjual') ?>">Home <span class="sr-only">(current)</span></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kelola produk<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('product/createProduct'); ?>">Input data produk</a></li>
							<li><a href="<?php echo base_url('product/lihatProduk') ?>">Lihat data produk</a></li>
							<!-- <li><a href="?controller=register&action=register">Register</a></li> -->
							
						</ul>
					</li>
          <li><a href="<?php echo base_url('transaksi/transaksiPenjual') ?>">Transaksi</a></li>
         <!--   <li><a href="?controller=peramalan&action=showPeramalan&produk=Abon+lele">Peramalan</a></li> -->
          
        </ul>
			
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('username'); ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li>

						</ul>
					</li>

				</ul>
			</div>
		</div>
	</nav>
	<div class="pembatas"></div>
	


	<div class="container">
		<div class="pembatas"></div>


		<div class="container">
			<?php foreach ($produk as $item) {

				?>
				<div class="d-inline-block">
					<div class="card" style="width: 25rem;">
						<img class="card-img-top" src="<?php echo base_url('assets/foto_produk/').$item->foto_produk; ?>" alt="Card image cap">
						<div class="card-block">
							<font size="4">
							<p class="card-title"><?php echo $item->nama_produk ?></p></font>
							<p class="card-text">
								<font size="4" color="#2196F3"><b><p> <?php echo "Rp ". number_format($item->harga,0,".",".")."/pcs"; ?></p></b></font>


							</p>
							<p class="card-text">

								Jumlah stok : <?php echo $item->jumlah_stok." "; ?>pcs <br>

							</p>
							<a href="<?php echo base_url('product/edit/').$item->id_produk; ?>" class="btn btn-primary">Edit</a>
							<a href="<?php echo base_url('product/deleteProduct/').$item->id_produk.'/'.$item->foto_produk; ?>" class="btn btn-danger">Delete</a>
						</div>
					</div>
				</div>
				<?php }  ?>
			</div>


		</body>
		</html>