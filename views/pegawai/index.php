<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/pegawai.php';  
	$pegawai = new pegawai($connection);
?>

 <div class="row">
  <div class="col-lg-12">
    <h1>pegawai <small>Data pegawai</small></h1>
    <a href="/pbd?page=pegawai&aksi=tambah">Tambah Data</a>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> pegawai</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>NIPP</th>
					<th>Nama Pegawai</th>
					<th>Alamat</th>
					<th>Jabatan</th>
					<th>Cabang</th>
					<th>Jenis Kelamin</th>
					<th>Keterangan</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $pegawai->tampil();
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->nipp; ?></td>
					<td><?php echo $data->nama_pegawai; ?></td>
					<td><?php echo $data->alamat; ?></td>
					<td><?php echo $data->nama_jabatan; ?></td>
					<td><?php echo $data->nama_cabang; ?></td>
					<td><?php 
						if ($data->jenis_kelamin ==1){
							echo "laki-laki";
						}elseif ($data->jenis_kelamin ==2) {
							echo "perempuan";
						}
					 ?></td>
					<td><?php echo $data->keterangan; ?></td>
					<td align="center">
						<a href="/pbd?page=pegawai&aksi=edit&nipp='<?php echo $data->nipp; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/pegawai_controller.php?aksi=delete&id='<?php echo $data->nipp; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>