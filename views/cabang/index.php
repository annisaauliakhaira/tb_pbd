<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/cabang.php';  
	$cabang = new cabang($connection);
?>
 
 <div class="row">
  <div class="col-lg-12">
    <h1>Cabang <small>Data Cabang</small></h1>
    <button><a href="/pbd?page=cabang&aksi=tambah">Tambah Data</a></button>
    <br><br>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Cabang</li>
      <li>
      	<form action="" method="get">
		<label>  Cari :</label>
		<input type="hidden" value="cabang" name="page">
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
					<th>Kode Cabang</th>
					<th>Cabang</th>
					<th>Alamat</th>
					<th>Keterangan</th>
					<th>Action</th>
				</tr>

                <?php
                    $no = 1;
                    $tampil = $cabang->tampil();
                    if(isset($_GET['cari'])){
                    	$tampil = $cabang->cari($cari);
                    }
                    while ($data = pg_fetch_object($tampil)) {
                ?>

				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td><?php echo $data->kode_cabang; ?></td>
					<td><?php echo $data->nama_cabang; ?></td>
					<td><?php echo $data->alamat; ?></td>
					<td><?php echo $data->keterangan; ?></td>
					<td align="center">
						<a href="/pbd?page=cabang&aksi=edit&kode_cabang='<?php echo $data->kode_cabang; ?>'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
        				<a href="/pbd/controller/cabang_controller.php?aksi=delete&id='<?php echo $data->kode_cabang; ?>'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					</td>
				</tr>
                <?php } ?>
        		</table>
        	</div>
        	 
	</div>
</div>