<!DOCTYPE html>
<?php $chartData=''; ?>
<html>
<head>
	<title>simatrix</title>
	

	
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
				<a class="navbar-brand" href="#">simatrix</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="?controller=home&action=homePenjual">Home <span class="sr-only">(current)</span></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kelola produk<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="?controller=produk&action=createProduk">Input data produk</a></li>
							<li><a href="?controller=produk&action=showAllProdukPenjual">Lihat data produk</a></li>
							<!-- <li><a href="?controller=register&action=register">Register</a></li> -->
							
						</ul>
					</li>
					<li ><a href="?controller=keranjang&action=transaksiPenjual">Transaksi</a></li>
					<li class="active"><a href="?controller=peramalan&action=showPeramalan&produk=Abon+lele">Peramalan</a></li>
					<!-- <li><a href="#">Cara Pemesanan</a></li> -->
				</ul>
				<!-- <form class="navbar-form navbar-left">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form> -->
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama_user']; ?> <span class="caret"></span></a>
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
		<div class="col-md-3">
			<p><h3>Pilih Produk</h3></p>

			<form action="" method="">
				<input type="hidden" name="controller" value="peramalan">
				<input type="hidden" name="action" value="showPeramalan">

				<select class="form-control" id="pilihproduk" name="produk" onchange="this.form.submit();">
					<!-- <option>pilih produk</option> -->
					<?php foreach ($produk as $item) { 


						?>
						<option <?php if ($item['nama_produk']==$_GET['produk']) { ?>


							selected="selected" <?php }

							?>   ><?php echo $item['nama_produk']; ?></option>
							<?php } ?>

							<!-- <option>Keripik lele</option>
							<option>Pastel lele</option>
							<option>Abon lele</option> -->
						</select> 
						
					</form>
				</div>
				<br><br><br><br><br>
				<div class="col-md-6">
					<h1>Peramalan Penjualan</h1>
					<table class="table" style="margin-top: 30px;">

						<tr>

							<th>No</th>
							<th>nama produk</th>
							<th>jumlah terjual</th>
							<th>Bulan</th>
							<th>Tahun</th>

						</tr>

						<?php 
						$no=1;
						$i=0;
						$x=1;
						$hasilPeramalan=0;
						$jumlah_terjual_bulanan=array();
						$jumlah_terjual_bulanan_LS=array();
						$jumlah_terjual_bulanan_LSR=array();
						$jumlah_terjual_bulanan_LA=array();
						$peramalanLS=array();
						$peramalanLSR=array();
						$peramalanLA=array();
						



						foreach ($posts as $item) { 
							//$chartData .="{ month: '".'2018-0'."$x',jumlah:".$item['jumlah_terjual']."},"; 

							$x++;

							?>
							<tr>
								<td><?php echo $no; ?></td>

								<td><?php echo $item['nama_produk']; ?></td>

								<td><?php echo $item['jumlah_terjual']." pcs" ?></td>

								<td><?php echo $item['bulan']; ?></td>
								<td><?php echo $item['tahun']; ?></td>
								

							</tr>
							<?php 
							$jumlah_terjual_bulanan[$i]=$item['jumlah_terjual'];
							$no++;
							$i++;

						} $chartData = substr($chartData,0,-2);
						$jumlah_terjual_bulanan_LS = $jumlah_terjual_bulanan;
						$jumlah_terjual_bulanan_LSR = $jumlah_terjual_bulanan;
						$jumlah_terjual_bulanan_LA=$jumlah_terjual_bulanan;

						
						$panjangArray = sizeof($jumlah_terjual_bulanan);
						if ($panjangArray>=3) {
							$n=3;

							for ($i=0; $i < $n ; $i++) { 
								$panjangArray = sizeof($jumlah_terjual_bulanan_LS);

								$a_LS = $jumlah_terjual_bulanan_LS[$panjangArray-1];
								$b_LS = $jumlah_terjual_bulanan_LS[$panjangArray-2];
								$c_LS = $jumlah_terjual_bulanan_LS[$panjangArray-3];

								$a_LSR = $jumlah_terjual_bulanan_LSR[$panjangArray-1];
								$b_LSR = $jumlah_terjual_bulanan_LSR[$panjangArray-2];
								$c_LSR = $jumlah_terjual_bulanan_LSR[$panjangArray-3];

								$a_LA = $jumlah_terjual_bulanan_LA[$panjangArray-1];
								$b_LA = $jumlah_terjual_bulanan_LA[$panjangArray-2];
								$c_LA = $jumlah_terjual_bulanan_LA[$panjangArray-3];

						//echo $a.", ".$b.", ".$c;

							//========= perhitungan Linear Smoothing =========
								$hasilLS = ($a_LS*0.5)+($b_LS*2/6)+($c_LS*1/6);
							//================================================


							//========= perhitungan Least Square Regression =========

								$avg = ($a_LSR+$b_LSR+$c_LSR)/$n;
								$summary = ($c_LSR*1)+($b_LSR*2)+($a_LSR*3);
								$diff = $summary-((1+2+3)*$avg);
								$ratio = (pow(1, 2)+pow(2, 2)+pow(3, 2))-((pow(2, 2))*3);
								$value1= $diff/$ratio;
								$value2=$avg-$value1*$ratio;
								$hasilLSR =(1+$n)*$value1+$value2;

							


							//=======================================================

							//========= perhitungan Linear Approximation =========
								$hasilLA = (($a_LA-$c_LA)/2)+$a_LA;
							//=======================================================

								/*$POA1 = 0;
								$POA2 = 0;
								$POA3 = 0;*/

								$MAD1=0;
								$MAD2=0;
								$MAD3=0;

								$MAPE1=0;
								$MAPE2=0;
								$MAPE3=0;
							/*$error1 = $a-$hasilLS;
							$error2 = $a-$hasilLSR;
							$error3 = $a-$hasilLA;*/
								# code...
							$peramalanLS[$i] = $hasilLS;
							$peramalanLSR[$i]=$hasilLSR;
							$peramalanLA[$i]=$hasilLA; 

							$jumlah_terjual_bulanan_LS[]=$hasilLS;
							$jumlah_terjual_bulanan_LSR[]=$hasilLSR;
							$jumlah_terjual_bulanan_LA[]=$hasilLA;
						}

								$MAD1=abs($jumlah_terjual_bulanan_LS[$panjangArray-3]-$peramalanLS[0]);
								$MAD2=abs($jumlah_terjual_bulanan_LSR[$panjangArray-3]-$peramalanLSR[0]);
								$MAD3=abs($jumlah_terjual_bulanan_LA[$panjangArray-3]-$peramalanLA[0]);

								$MAPE1=($MAD1/$jumlah_terjual_bulanan_LS[$panjangArray-3])/1*100;
								$MAPE2=($MAD2/$jumlah_terjual_bulanan_LSR[$panjangArray-3])/1*100;
								$MAPE3=($MAD3/$jumlah_terjual_bulanan_LA[$panjangArray-3])/1*100;


								// print $jumlah_terjual_bulanan_LSR[$panjangArray-3];
								// print $peramalanLSR[2];




							}
							else{

								$jumlah_terjual_bulanan_LS=0;
								$jumlah_terjual_bulanan_LSR=0;
								$jumlah_terjual_bulanan_LA=0; 

								$peramalanLS=0;
								$peramalanLSR=0;
								$peramalanLA=0;

								$hasilLS=0;
								$hasilLSR=0;
								$hasilLA=0;

								$POA1=0;
								$POA2=0;
								$POA3=0;

								$MAPE1=0;
								$MAPE2=0;
								$MAPE3=0;



							}



							?>



						</table>
					</div>

					<div class="col-md-6">
						<h1>Peramalan 3 bulan depan</h1>
						<table class="table" style="margin-top: 30px;">

							<tr>

								<th>No</th>
								<th>Nama Metode</th>
								<th>Peramalan 1 </th>
								<th>Peramalan 2 </th>
								<th>Peramalan 3 </th>
								<th>MAPE</th>


							</tr>
							<tr>
								<td>1</td>
								<td>Linear Smoothing</td>
								<td><?php echo round($peramalanLS[0])." pcs"; ?></td>
								<td><?php echo round($peramalanLS[1])." pcs"; ?></td>
								<td><?php echo round($peramalanLS[2])." pcs"; ?></td>
								<td><?php echo  ($MAPE1)."%"; ?></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Least Square Regression</td>
								<td><?php echo round($peramalanLSR[0])." pcs"; ?></td>
								<td><?php echo round($peramalanLSR[1])." pcs"; ?></td>
								<td><?php echo round($peramalanLSR[2])." pcs"; ?></td>
								<td><?php echo  ($MAPE2)."%"; ?></td>
							</tr>
							<tr>
								<td>3</td>
								<td>Linear Approximation</td>
								<td><?php echo round($peramalanLA[0])." pcs"; ?></td>
								<td><?php echo round($peramalanLA[1])." pcs"; ?></td>
								<td><?php echo round($peramalanLA[2])." pcs"; ?></td>
								<td><?php echo  ($MAPE3)."%"; ?></td>
							</tr>




						</table>

						<div id="chartPeramalan" style="height: 250px;">

						</div>


				<!-- 	<div id="donat" style="height: 250px;">

			</div> -->
		</div>


	</div>
	<br><br><br>

			<!-- <div class="col-md-4"><font color="blue" >
				<h3>Hasil perhitungan peramalan bulan depan	: <?php echo round($hasilPeramalan)." pcs"; ?> </h3>
			</font> -->


		</div>

	</body>
	</html>
	<script>
		var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
// later on

new Morris.Line({
	<?php $x=1;
	for ($i=0; $i <sizeof($jumlah_terjual_bulanan_LS) ; $i++) { 
		$chartData .="{ month: '".'2018-0'."$x',jumlah_LS:".round($jumlah_terjual_bulanan_LS[$i]).
		",jumlah_LSR:".round($jumlah_terjual_bulanan_LSR[$i]).",jumlah_LA:".round($jumlah_terjual_bulanan_LA[$i])."},"; 
		$x++;
	} ?>


	
  // ID of the element in which to draw the chart.
  element: 'chartPeramalan',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  <?php echo $chartData; ?>
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'month',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['jumlah_LS','jumlah_LSR','jumlah_LA'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['peramalanLS','peramalanLSR','peramalanLA'],

  xLabelFormat: function (x) { return months[x.getMonth()]; }
});


/*new Morris.Donut({
  element: 'donat',
  data: [
    {label: "Download Sales", value: 12},
    {label: "In-Store Sales", value: 30},
    {label: "Mail-Order Sales", value: 20}
  ]
});*/
</script>