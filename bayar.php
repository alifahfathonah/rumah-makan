<?php 
	
	session_start();
	include 'auth/config.php';

	//Protect User Yang Langsung Masuk Ke Halaman Ini
	if (!isset($_SESSION['bayar'])) {
		header("Location: index");
	}

	
	
	if (isset($_POST['bayar']) === true) {
		$id_pelanggan = $_SESSION['id_pelanggan'];
		$nama_pelanggan = $_SESSION['username'];
		$nama_makanan = $_SESSION['nama_menu'];
		$alamat = $_SESSION['alamat'];
		$m_pembayaran = mysqli_real_escape_string($koneksi, $_POST['m_pembayaran']);
		$m_pengiriman = mysqli_real_escape_string($koneksi, $_POST['m_pengiriman']);
		$status = 'pending';
		$jumlah_pesanan = $_SESSION['jumlah_pesanan'];
		$total_harga = $_SESSION['total'];


		$insertData = mysqli_query($koneksi, "INSERT INTO data_kasir (id_pelanggan, nama_pelanggan, nama_makanan, alamat, m_pembayaran, m_pengiriman, status, jumlah_pesanan, total_harga) VALUES ('$id_pelanggan', '$nama_pelanggan', '$nama_makanan', '$alamat', '$m_pembayaran', '$m_pengiriman', '$status', '$jumlah_pesanan', '$total_harga')");

		if (mysqli_affected_rows($koneksi) > 0) {
			echo "<script>alert('Pembayaran berhasil, terimakasih pesanan anda akan kami kirim secepat mungkin')</script>";
			echo "<script>location='status'</script>";
		}else{
			echo "<script>alert('Pembayaran gagal')</script>";
			echo "<script>location='bayar'</script>";
		}
	}



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
 	<title>Bayar - <?= $_SESSION['username'] ?></title>
 	<link rel="stylesheet" type="text/css" href="assets/libs/vendor/bootstrap-4.1/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="assets/libs/vendor/font-awesome-5/css/fontawesome-all.min.css">
 </head>
 <body>
 
 <?php include 'files/header.php'; ?>

 	<div class="container">
 		<table class="table table-bordered table-stripped">
 		<thead class="bg-dark text-white">
 			<tr>
 				<th>Nama</th>
 				<th>Pesanan</th>
 				<th>Harga</th>
 				<th>Jumlah</th>
 				<th>Total</th>
 			</tr>
 		</thead>
 		<tbody>
 			<tr>
 				<td><?= $_SESSION['username'] ?></td>
 				<td><?= $_SESSION['nama_menu']; ?></td>
 				<th><?= number_format($_SESSION['harga_pesanan']) ?></th>
 				<td><?= $_SESSION['jumlah_pesanan'] ?></td>
 				<th><?= number_format($_SESSION['total']) ?></th>
 			</tr>
 		</tbody>
 	</table>
 	<form method="post" action="">
 		<div class="form-group">
 			<div class="alamat">Alamat</div>
 			<textarea name="alamat" id="alamat" rows="7" required="" autocomplete="off" autofocus="" style="width: 100%;"><?= $_SESSION['alamat'] ?></textarea>
 		</div>
 		<div class="form-group">
 			<button type="submit" class="btn btn-primary" name="edit" id="edit"><i class="fas fa-edit"> Edit</i></button>
 			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
			  <i class="fas fa-check"> Bayar</i>
			</button>

 		</div>
 	</form> 
 	</div>


 	<!-- Modal -->
	 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Bayar - <?= $_SESSION['username'] ?></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="post" action="">
	        	<div class="form-group">
	        		<label for="username">Username</label>
	        		<input type="text" name="username" id="username" class="form-control" required="" autofocus="" value="<?= $_SESSION['username'] ?>" readonly>
	        	</div>
	        	<div class="form-group">
	        		<label for="m_pembayaran">Metode Pembayaran</label>
	        		<select name="m_pembayaran" id="m_pembayaran" class="form-control" required="">
	        			<option value="Cod">Cash On Delivery (COD)</option>
	        		</select>
	        	</div>
	        	<div class="form-group">
	        		<label for="m_pengiriman">Metode Pengiriman</label>
	        		<select name="m_pengiriman" id="m_pengiriman" class="form-control" required="">
	        			<option value="GrabFood">Grab Food</option>
	        			<option value="GoFood">Go Food</option>
	        		</select>
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary" name="bayar">Bayar</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<script src="assets/libs/js/jquery-2.2.4.min.js"></script>
 	<script src="assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
 	<script src="assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>

 </body>
 </html>