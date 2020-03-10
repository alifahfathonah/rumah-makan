<?php 
	
	session_start();
	include 'auth/config.php';

	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rumah Makan</title>
	<link rel="stylesheet" type="text/css" href="assets/libs/vendor/bootstrap-4.1/bootstrap.min.css">
</head>
<body>

<?php include 'files/header.php'; ?>



<div class="container">
	<h3 class="text-white text-sm-center m-3"></h3>
	<div class="row" style="margin-top: 25px;">
		<div class="col-sm-12" style="margin: auto; display: flex; max-width: 1200px; ">
			<?php 
	
			$selectData = mysqli_query($koneksi, "SELECT * FROM data_menu");
			while ( $getData = mysqli_fetch_array($selectData)) {
		

			 ?>
			
			
			<div class="card float-left">
			<div class="card-header">
				<i class="fa fa-user"></i>
				<strong class="card-title pl-2"><?= $getData['nama_menu'] ?></strong>
			</div>
			<div class="card-body">
				<div class="mx-auto d-block">
					<!-- img class="rounded-circle mx-auto d-block" src="assets/libs/images/avatar.png" alt="Card image cap" style="height: 100px; "> -->
					<h5 class="text-sm-center mt-2 mb-1"><?= number_format($getData['harga_pesanan']) ?></h5>
					
					<hr>
					<div class="card-text text-sm-center">
						<a href="beli?nama_menu=<?= $getData['nama_menu'] ?>&id_menu=<?= $getData['id_menu'] ?>" class="btn btn-primary btn-sm">Beli <?= $getData['nama_menu'] ?></a>
					</div>
				</div>
			</div>
		</div>
		

<?php } ?>

<script src="assets/libs/js/jquery-2.2.4.min.js"></script>
<script src="assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>

</body>
</html>