<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN BARANG</h2>
		<h4>WWW.MALASNGODING.COM</h4>
 
	</center>
 
	<?php 
	include '../config/koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Kode Barang</th>
			<th>Merk / Model</th>
			<th>No Seri Barang</th>
			<th>Tahun Pembuatan</th>
			<th>No Kode Barang</th>
			<th>Keadaan Barang</th>
			<th>Dokumentasi Barang No Livret</th>
			<th>Keterangan Mutasi Barang</th>
			<th width="5%">Jumlah</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from barang_masuk");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_barang; ?></td>
					<td><?php echo $data->no_seri; ?></td>
					<td><?php echo $data->kode_persetujuan; ?></td>
					<td><?php echo $data->nama_jenis; ?></td>
					<td><?php echo $data->nama_merk; ?></td>
					<td><?php 
						if ($data->kondisi ==1){
							echo "baik";
						}elseif ($data->kondisi ==2) {
							echo "kurang baik";
						}elseif ($data->kondisi ==3) {
							echo "rusak";
						}
						?></td>
					<td><?php echo $data->no_livret; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html