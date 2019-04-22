<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/pengajuan.php';  
	$pengajuan = new pengajuan($connection);
?>
 
 <div class="row">
  <div class="col-lg-12">
    <h1>Pengajuan <small>Data Pengajuan</small></h1>
    <a href="/pbd?page=pengajuan&aksi=tambah">Tambah Data</a>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Pengajuan</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>Kode Pengajuan</th>
					<th>Jenis Barang</th>
					<th>Tanggal Pengajuan</th>
					<th>Total</th>
					<th>Pegawai</th>
					<th>Keterangan</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $pengajuan->tampil();
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_pengajuan; ?></td>
					<td><?php echo $data->nama_jenis; ?></td>
					<td><?php echo $data->tgl_pengajuan; ?></td>
					<td><?php echo $data->total; ?></td>
					<td><?php echo $data->nama_pegawai; ?></td>
					<td><?php echo $data->keterangan; ?></td>
					<td align="center">
						<a href="/pbd?page=pengajuan&aksi=edit&kode_pengajuan='<?php echo $data->kode_pengajuan; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/pengajuan_controller.php?aksi=delete&id='<?php echo $data->kode_pengajuan; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>