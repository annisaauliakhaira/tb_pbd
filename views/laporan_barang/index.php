<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
 
	<center>
 
		<h2>CETAK PRINT DATA DARI DATABASE DENGAN PHP<br/><a href="https://www.malasngoding.com">WWW.MALASNGODING.COM</a></h2>
 
 
		<?php 
		include '../config/koneksi.php';
		?>
 
		<table border="1">
			<tr>
					<th>No</th>
					<th>Kode barang</th>
					<th>No Serial</th>
					<th>Kode Persetujuan</th>
					<th>Jenis Barang</th>
					<th>Merek</th>
					<th>Kondisi Barang</th>
					<th>No Livret</th>
			</tr>
			
		</table>
 
		<br/>
 
		<a href="cetak.php" target="_blank">CETAK</a>
 
 
	</center>
</body>
</html>