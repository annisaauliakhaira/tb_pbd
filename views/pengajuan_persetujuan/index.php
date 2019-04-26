<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/pengajuan_persetujuan.php';  
	$pengajuan_persetujuan = new pengajuan_persetujuan($connection);
?>
 
 <div class="row">
  <div class="col-lg-12">
    <h1>Pengajuan Pesetujuan <small>Data Pengajuan Persetujuan</small></h1>
    <button><a href="/pbd?page=pengajuan_persetujuan&aksi=tambah">Tambah Data</a></button>
    <button><a href="/pbd/views/pengajuan_persetujuan/cetak.php" target="_blank">CETAK</a></button>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> pengajuan_persetujuan</li>
      <li>
      	<form action="" method="get">
		<label>  Cari :</label>
		<input type="hidden" value="pengajuan_persetujuan" name="page">
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
					<th>Kode Pengajuan Persetujuan</th>
					<th>Jenis Barang</th>
					<th>Jumlah</th>
					<th>Satuan</th>
					<th>Tanggal pengajuan</th>
					<th>Tanggal disetujui</th>
					<th>Pegawai</th>
					<th>Keterangan</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $pengajuan_persetujuan->tampil();
                    if(isset($_GET['cari'])){
                    	$tampil = $pengajuan_persetujuan->cari($cari);
                    }
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_pengajuan_persetujuan; ?></td>
					<td><?php echo $data->nama_jenis; ?></td>
					<td><?php echo $data->jumlah_barang; ?></td>
					<td><?php echo $data->nama_satuan; ?></td>
					<td><?php echo $data->tgl_pengajuan; ?></td>
					<td><?php echo $data->tgl_disetujui; ?></td>
					<td><?php echo $data->nama_pegawai; ?></td>
					<td><?php echo $data->keterangan; ?></td>
					<td align="center">
						<a href="/pbd?page=pengajuan_persetujuan&aksi=edit&kode_pengajuan_persetujuan='<?php echo $data->kode_pengajuan_persetujuan; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/pengajuan_persetujuan_controller.php?aksi=delete&id='<?php echo $data->kode_pengajuan_persetujuan; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>