<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/barang.php';  
	$barang = new barang($connection);
?>
 
 <div class="row">
  <div class="col-lg-12">
    <h1>Barang <small>Data Barang</small></h1>
    <h4></h4>
    <button><a href="/pbd?page=barang&aksi=tambah">Tambah Data</a></button>
    <button><a href="/pbd/views/barang/cetak.php" target="_blank">CETAK</a></button>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Barang</li>
      <li>
      	<form action="index.php" method="get">
		<label>  Cari :</label>
		<input type="text" name="cari">
		<input type="submit" value="Cari">
		</form>	

		<?php 
			if(isset($_GET['cari'])){
				$cari = $_GET['cari'];
				echo "<b>Hasil pencarian : ".$cari."</b>";
			}
		?>
	  </li>
    </ol>
  </div>


</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>Kode barang</th>
					<th>No Serial</th>
					<th>Kode Persetujuan</th>
					<th>Jenis Barang</th>
					<th>Merek</th>
					<th>Kondisi Barang</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $barang->tampil();
                    if(isset($_GET['cari'])){
                    	$tampil = $barang->cari($cari);
                    }
                    while ($data = pg_fetch_object($tampil)) {
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
						?>
					</td>
					<td align="center">
						<a href="/pbd?page=barang&aksi=edit&kode_barang='<?php echo $data->kode_barang; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/barang_controller.php?aksi=delete&id='<?php echo $data->kode_barang; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>