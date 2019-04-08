<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/jenis.php';  
	$jenis = new jenis($connection);
?>

 <div class="row">
  <div class="col-lg-12">
    <h1>jenis <small>Data jenis</small></h1>
    <a href="/pbd?page=jenis&aksi=tambah">Tambah Data</a>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> jenis</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>Kode jenis</th>
					<th>jenis</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $jenis->tampil();
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_jenis; ?></td>
					<td><?php echo $data->nama_jenis; ?></td>
					<td align="center">
						<a href="/pbd?page=jenis&aksi=edit&kode_jenis='<?php echo $data->kode_jenis; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/jenis_controller.php?aksi=delete&id='<?php echo $data->kode_jenis; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>