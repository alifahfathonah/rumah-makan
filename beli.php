<?php 
	
	session_start();
	include 'auth/config.php';
	$id_menu = $_GET['id_menu'];
	$nama_menu = $_GET['nama_menu'];
	error_reporting(0);
	
	//Protect User Yang Belum Melakukan Pembelian
	if (!$id_menu) {
		echo "<script>alert('Silahkan memilih pesanan terlebih dahulu')</script>";
		echo "<script>location='index'</script>";
	}

	if (!$nama_menu) {
		echo "<script>alert('Silahkan memilih pesanan terlebih dahulu')</script>";
		echo "<script>location='index'</script>";
	}

	

	$selectData = mysqli_query($koneksi, "SELECT * FROM data_menu WHERE id_menu = '$id_menu' AND nama_menu = '$nama_menu'");
	$getData = mysqli_fetch_array($selectData);

	//Protect Jika ID menu Tidak Ada Di Db
	if ($id_menu !== $getData['id_menu']) {
		header("Location: index");
	}




	if (isset($_POST['submit']) === true) {
		$nama_pelanggan = mysqli_real_escape_string($koneksi, $_POST['nama_pelanggan']);
		$jumlah_pesanan = mysqli_real_escape_string($koneksi, $_POST['jumlah_pesanan']);
		$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);


		$hargaAsli = $getData['harga_pesanan'];
		$total = $jumlah_pesanan * $hargaAsli;

		$insertData = mysqli_query($koneksi, "INSERT INTO data_pelanggan (id_pelanggan, nama_pesanan, nama_pelanggan, alamat, jumlah_pesanan, total_harga) VALUES ('', '$nama_menu', '$nama_pelanggan','$alamat', '$jumlah_pesanan', '$total')");

		$selectData = mysqli_query($koneksi, "SELECT * FROM data_pelanggan WHERE nama_pelanggan = '$nama_pelanggan'");
		
			

		if (mysqli_affected_rows($koneksi)) {

			$rowData = mysqli_fetch_array($selectData);
			$_SESSION['id_pelanggan'] = $rowData['id_pelanggan'];
			$_SESSION['loginUsers'] = true;
			$_SESSION['username'] = $nama_pelanggan;
			$_SESSION['bayar'] = true;
			$_SESSION['alamat'] = $alamat;
			$_SESSION['total'] = $total;
			$_SESSION['jumlah_pesanan'] = $jumlah_pesanan;
			$_SESSION['harga_pesanan'] = $hargaAsli;
			$_SESSION['nama_menu'] = $nama_menu;
			$_SESSION['status'] = true;

			echo "<script>alert('Data Berhasil di inputkan')</script>";
			echo "<script>location='bayar'</script>";
			


		}else{
			echo "<script>alert('Data gagal di inputkan')</script>";
			echo "<script>location='beli'</script>";
		}
		exit;
	}

	if (isset($_POST['submit2'])) {
		$rowData = mysqli_fetch_array($selectData);
		$nama_pelanggan = $_SESSION['username'];
		$jumlah_pesanan = mysqli_real_escape_string($koneksi, $_POST['jumlah_pesanan']);
		$alamat = $_SESSION['alamat'];


		$hargaAsli = $getData['harga_pesanan'];
		$total = $jumlah_pesanan * $hargaAsli;

		$_SESSION['alamat'] = $alamat;
		$_SESSION['id_pelanggan'] = $rowData['id_pelanggan'];
		$_SESSION['bayar'] = true;
		$_SESSION['harga_pesanan'] = $hargaAsli;
		$_SESSION['total'] = $total;
		$_SESSION['jumlah_pesanan'] = $jumlah_pesanan;
		$_SESSION['harga_pesanan'] = $hargaAsli;
		$_SESSION['nama_menu'] = $nama_menu;
		$_SESSION['status'] = true;

		$insertData = mysqli_query($koneksi, "INSERT INTO data_pelanggan (id_pelanggan, nama_pesanan, nama_pelanggan, alamat, jumlah_pesanan, total_harga) VALUES ('', '$nama_menu', '$nama_pelanggan','$alamat', '$jumlah_pesanan', '$total')");

		if (mysqli_affected_rows($koneksi)) {

			echo "<script>alert('Data Berhasil di inputkan')</script>";
			echo "<script>location='bayar.php'</script>";
		}else{
			echo "<script>alert('Data gagal di inputkan')</script>";
			echo "<script>location='beli.php'</script>";
		}
	}






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


<div class="row">
	<div class="container">
		<table class="table table-bordered">
			<thead>
				<th>Nama Makanan</th>
				<th>Harga</th>
			</thead>
			<tbody>
				<td><?= $getData['nama_menu'] ?></td>
				<td><?= number_format($getData['harga_pesanan']) ?></td>
			</tbody>
		</table>

		<?php if (!isset($_SESSION['loginUsers'])): ?>
			<form method="post" action="">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label for="nama_pelanggan">Nama Pelanggan</label>
						<input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" required="" autocomplete="off" autofocus="">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat Pelanggan</label>
						<textarea class="form-control" name="alamat" id="alamat" rows="5" autocomplete="off" required=""></textarea>
					</div>
					<div class="form-group">
						<label for="jumlah_pesanan">Jumlah Pesanan</label>
						<input type="number" name="jumlah_pesanan" id="jumlah_pesanan" required="" autocomplete="off" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-success btn-sm form-control">Bayar</button>
					</div>
				</div>
			</div>	
		</form>
		<?php endif ?>
		<?php if (isset($_SESSION['loginUsers'])): ?>
			<form method="post" action="">
				<div class="form-group">
				<label for="jumlah_pesanan">Jumlah Pesanan</label>
					<input type="number" name="jumlah_pesanan" id="jumlah_pesanan" required="" autocomplete="off" class="form-control">
				</div>
				<div class="form-group">
						<button type="submit" name="submit2" class="btn btn-success btn-sm form-control">Bayar</button>
					</div>
			</form>
		<?php endif ?>

	</div>
</div>


<script src="assets/libs/js/jquery-2.2.4.min.js"></script>
<script src="assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script src="assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>

</body>
</html>