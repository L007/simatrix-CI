<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
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

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
					<!-- <li><a href="komoditas.html">Daftar Komoditas</a></li>
					<li><a href="#">Cara Pemesanan</a></li> -->
				</ul>
				<!-- <form class="navbar-form navbar-left">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form> -->
				<ul class="nav navbar-nav navbar-right">
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login/Register <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="?controller=login&action=login">Login</a></li>
							<li><a href="?controller=register&action=register">Register</a></li>
							
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<p><h1>Login</h1></p>
			<div class="form">
			<form method="POST" action="<?php echo base_url('login/getCredentials'); ?>">
				


				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"></span>
					
					<input name="username" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1"
					 required autofocus>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"></span>
					<!-- <input type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="password" required> -->
					<input name="password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1"
					 required>
				</div>
				<!-- <i><b><?php echo $error ?></b></i> -->
				<p align="right">
					<button type="submit" class="btn btn-primary" style="margin-top:20px;">LOGIN</button>
				</p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>