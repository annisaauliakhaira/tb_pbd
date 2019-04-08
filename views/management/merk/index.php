<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/merk.php';  
	$merk = new merk($connection);
?>

 <div class="row">
  <div class="col-lg-12">
    <h1>merk <small>Data merk</small></h1>
    <a href="/pbd?page=merk&aksi=tambah">Tambah Data</a>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Merek/Model</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>Kode Merek</th>
					<th>Nama Merek</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $merk->tampil();
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_merk; ?></td>
					<td><?php echo $data->nama_merk; ?></td>
					<td align="center">
						<a href="/pbd?page=merk&aksi=edit&kode_merk='<?php echo $data->kode_merk; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/merk_controller.php?aksi=delete&id='<?php echo $data->kode_merk; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>