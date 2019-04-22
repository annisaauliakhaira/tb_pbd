<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/mutasi_barang.php';  
	$mutasi_barang = new mutasi_barang($connection);
?>
 
 <div class="row">
  <div class="col-lg-12">
    <h1>Mutasi Barang <small>Data Mutasi Barang</small></h1>
    <a href="/pbd?page=mutasi_barang&aksi=tambah">Tambah Data</a>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Mutasi Barang</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Kode Mutasi</th>
					<th>Kondisi Barang</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $mutasi_barang->tampil();
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_barang; ?></td>
					<td><?php echo $data->kode_mutasi; ?></td>
					<td><?php 
						if ($data->kondisi_barang ==1){
							echo "baik";
						}elseif ($data->kondisi_barang ==2) {
							echo "kurang baik";
						}elseif ($data->kondisi_barang ==3) {
							echo "rusak";
						}
						?>
					</td>
					<td align="center">
						<a href="/pbd?page=mutasi_barang&aksi=edit&kode_mutasi='<?php echo $data->kode_mutasi; ?>' &kode_barang='<?php echo $data->kode_barang; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/mutasi_barang_controller.php?aksi=delete&kode_mutasi='<?php echo $data->kode_mutasi; ?>' &kode_barang='<?php echo $data->kode_barang; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>