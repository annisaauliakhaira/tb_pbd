<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/cabang_barang.php';  
	$cabang_barang = new cabang_barang($connection);
?>
 
 <div class="row">
  <div class="col-lg-12">
    <h1>Cabang Barang <small>Data Cabang Barang</small></h1>
    <button><a href="/pbd?page=cabang_barang&aksi=tambah">Tambah Data</a></button>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Cabang Barang</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No</th>
					<th>Cabang</th>
					<th>Kode Barang</th>
					<th>Status</th>
					<th>Kondisi Barang</th>
					<th>No Livret</th>
					<th>Jumlah Barang</th>
					<th>Satuan</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $cabang_barang->tampil();
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->nama_cabang; ?></td>
					<td><?php echo $data->kode_barang; ?></td>
					<td><?php echo $data->status; ?></td>
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
					<td><?php echo $data->no_livret; ?></td>
					<td><?php echo $data->jumlah_barang; ?></td>
					<td><?php echo $data->satuan; ?></td>
					<td align="center">
						<a href="/pbd?page=cabang_barang&aksi=edit&kode_cabang='<?php echo $data->kode_cabang; ?>' &kode_barang='<?php echo $data->kode_barang; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/cabang_barang_controller.php?aksi=delete&kode_cabang='<?php echo $data->kode_cabang; ?>' &kode_barang='<?php echo $data->kode_barang; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>