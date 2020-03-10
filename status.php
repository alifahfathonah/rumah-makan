<?php 
	
	session_start();
	include 'auth/config.php';
	$nama_pelanggan = $_SESSION['username'];

	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Status - <?= $_SESSION['username']; ?></title>
	<link rel="stylesheet" type="text/css" href="assets/libs/vendor/bootstrap-4.1/bootstrap.min.css">
</head>
<body>

<?php include 'files/header.php'; ?>

<div class="container">
	<table class="table table-bordered table-stripped">
		<thead>
			<tr class="bg-dark text-white">
				<th>No</th>
				<th>Username</th>
				<th>Pesanan</th>
				<th>Metode_Pembayaran</th>
				<th>Metode_Pengiriman</th>
				<th>Jumlah</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1;
				$selectData = mysqli_query($koneksi, "SELECT * FROM data_kasir WHERE nama_pelanggan = '$nama_pelanggan'");
				while ($rowDataUser = mysqli_fetch_array($selectData)) {
			
			 ?>
			 <tr>
			 	<td><?= $no; ?></td>
			 	<td><?= $rowDataUser['nama_pelanggan']; ?></td>
			 	<td><?= $rowDataUser['nama_makanan'] ?></td>
			 	<td><?= strtoupper($rowDataUser['m_pembayaran']) ?></td>
			 	<td><?= strtoupper($rowDataUser['m_pengiriman']) ?></td>
			 	<td><?= $rowDataUser['jumlah_pesanan'] ?></td>
			 	<td><?= $rowDataUser['total_harga'] ?></td>
			 	<td>
			 		<?php if ($rowDataUser['status'] === 'pending'): ?>
			 			<button class="btn btn-danger btn-sm">Pending</button>
			 		<?php endif ?>
			 		<?php if ($rowDataUser['status'] === 'proses'): ?>
			 			<button class="btn btn-warning btn-sm text-white">Proses</button>
			 		<?php endif ?>
			 		<?php if ($rowDataUser['status'] === 'pengiriman'): ?>
			 			<button class="btn btn-primary btn-sm">Pengiriman</button>
			 		<?php endif ?>
			 		<?php if ($rowDataUser['status'] === 'diterima'): ?>
			 			<button class="btn btn-success btn-sm">Diterima</button>
			 		<?php endif ?>
			 	</td>
			 </tr>
			 	<?php $no++; ?>
			<?php } ?>
		
		</tbody>
	</table>
</div>

<script src="assets/libs/js/jquery-2.2.4.min.js"></script>
<script src="assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>

</body>
</html>