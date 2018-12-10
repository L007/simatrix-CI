<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>simatrix</title>
	
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
				<a class="navbar-brand" href="<?php echo base_url(); ?>">simatrix</a>
			</div>

			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="i<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
					
					</ul>
				
				<ul class="nav navbar-nav navbar-right">
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login/Register <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('login/'); ?>">Login</a></li>
							<li><a href="index.php/register/register">Register</a></li>
							
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="pembatas"></div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="<?php echo base_url('assets/img/1.png');?>">
					</div>

					<div class="item">
						<img src="<?php echo base_url('assets/img/2.png');?>">
					</div>

					<div class="item">
						<img src="<?php echo base_url('assets/img/3.png');?>">
					</div>
				</div>

				<!-- Left and right controls -->

			</div>
		</div>
		<div class="col-md-2"></div>

	</div>

	<div class="container">
		<div class="pembatas"></div>




		<div class="container">
			<?php foreach ($produk as $item){

				?>


				<div class="d-inline-block">
					<div class="card" style="width: 25rem;">
						<img class="card-img-top" 
						src="<?php echo base_url('assets/foto_produk/').$item->foto_produk; ?>" 
						alt="Card image cap">
						<div class="card-block">
							<h4 class="card-title">
								<?php echo $item->nama_produk; ?></h4>
							<p class="card-text">
								<font size="4" color="#2196F3"><b><p> <?php echo "Rp ". number_format($item->harga,0,".",".")."/pcs"; ?></p></b></font>


							</p>
							<p class="card-text">

								Stok : <b><?php echo $item->jumlah_stok." "; ?>pcs</b> <br>
								Oleh : <b><?php echo $item->nama; ?></b>

							</p>
							<a href="?controller=produk&action=detailProduk&id_produk=<?php echo $item->id_produk; ?>" class="btn btn-primary">Lihat Detail</a>
						</div>
					</div>
				</div>
			<?php } ?>
			

		</div>


	</body>
	</html>