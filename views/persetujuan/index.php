<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/persetujuan.php';  
	$persetujuan = new persetujuan($connection);
?>
 
 <div class="row">
  <div class="col-lg-12">
    <h1>persetujuan <small>Data persetujuan</small></h1>
    <a href="/pbd?page=persetujuan&aksi=tambah">Tambah Data</a>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> persetujuan</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>Kode persetujuan</th>
					<th>Tanggal persetujuan</th>
					<th>Kode Pengajuan</th>
					<th>Pegawai</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $persetujuan->tampil();
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_persetujuan; ?></td>
					<td><?php echo $data->tgl_persetujuan; ?></td>
					<td><?php echo $data->kode_pengajuan; ?></td>
					<td><?php echo $data->nama_pegawai; ?></td>
					<td align="center">
						<a href="/pbd?page=persetujuan&aksi=edit&kode_persetujuan='<?php echo $data->kode_persetujuan; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/persetujuan_controller.php?aksi=delete&id='<?php echo $data->kode_persetujuan; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>