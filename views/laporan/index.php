<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/cabang.php';  
	$cabang = new cabang($connection);
?>
 
 <div class="row">
  <div class="col-lg-12">
    <h1>Laporan <small>Data Laporan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Laporan</li>
      <li>
      	<form action="" method="get">
		<label>  Cari :</label>
		<input type="hidden" value="laporan" name="page">
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
					<th>Kode Cabang</th>
					<th>Cabang</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $cabang->tampil();
                    if(isset($_GET['cari'])){
                    	$tampil = $cabang->cari($cari);
                    }
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_cabang; ?></td>
					<td><?php echo $data->nama_cabang; ?></td>
					<td align="center">
						<a href="/pbd/views/barang/cetak.php?kode_cabang=<?php echo $data->kode_cabang; ?>" class="btn btn-info btn-xs"><i class="fa fa-file"></i> Barang </a>

						<a href="/pbd/views/mutasi/cetak.php?kode_cabang=<?php echo $data->kode_cabang; ?>" class="btn btn-info btn-xs"><i class="fa fa-file"></i> Mutasi </a>

						<a href="/pbd/views/pengajuan_persetujuan/cetak.php?kode_cabang=<?php echo $data->kode_cabang; ?>" class="btn btn-info btn-xs"><i class="fa fa-file"></i> Pengajuan & Persetujuan </a>

						<a href="/pbd/views/pegawai/cetak.php?kode_cabang=<?php echo $data->kode_cabang; ?>" class="btn btn-info btn-xs"><i class="fa fa-file"></i> Pegawai </a>

					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>