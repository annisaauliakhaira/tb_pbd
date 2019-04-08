<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/jabatan.php';  
	$jabatan = new jabatan($connection);
?>

 <div class="row">
  <div class="col-lg-12">
    <h1>jabatan <small>Data jabatan</small></h1>
    <a href="/pbd?page=jabatan&aksi=tambah">Tambah Data</a>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> jabatan</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>Kode jabatan</th>
					<th>jabatan</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $jabatan->tampil();
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_jabatan; ?></td>
					<td><?php echo $data->nama_jabatan; ?></td>
					<td align="center">
						<a href="/pbd?page=jabatan&aksi=edit&kode_jabatan='<?php echo $data->kode_jabatan; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/jabatan_controller.php?aksi=delete&id='<?php echo $data->kode_jabatan; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>