<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/mutasi.php';  
	$mutasi = new mutasi($connection);
?>
 
 <div class="row">
  <div class="col-lg-12">
    <h1>Mutasi <small>Data Mutasi</small></h1>
    <button><a href="/pbd?page=mutasi&aksi=tambah">Tambah Data</a></button>
    <button><a href="/pbd/views/mutasi/cetak.php" target="_blank">CETAK</a></button>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Mutasi</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>Kode Mutasi</th>
					<th>Tanggal Mutasi</th>
					<th>Pegawai</th>
					<th>Cabang</th>
					<th>Kode Barang</th>
					<th>Jenis Barang</th>
					<th>Kondisi Barang</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $mutasi->tampil();
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_mutasi; ?></td>
					<td><?php echo $data->tgl_mutasi; ?></td>
					<td><?php echo $data->nama_pegawai; ?></td>
					<td><?php echo $data->nama_cabang; ?></td>
					<td><?php echo $data->kode_barang; ?></td>
					<td><?php echo $data->nama_jenis; ?></td>
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
						<a href="/pbd?page=mutasi&aksi=edit&kode_mutasi='<?php echo $data->kode_mutasi; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/mutasi_controller.php?aksi=delete&id='<?php echo $data->kode_mutasi; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>