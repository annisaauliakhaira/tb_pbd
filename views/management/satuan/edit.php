
 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Satuan <small>Data satuan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i>Satuan</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/satuan_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_satuan'])){
                        $kode_satuan = $_GET['kode_satuan'];
                    }else{
                        $kode_satuan = 0;
                    }
                    $sql="select * from satuan where kode_satuan=$kode_satuan";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_satuan">Kode Satuan</label>
                        <input type="text" value="<?php echo $data['kode_satuan']; ?>" name="kode_satuan" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_satuan">Nama Satuan</label>
                        <input type="text" value="<?php echo $data['nama_satuan']; ?>" name="nama_satuan" class="form-control" required>
                    </div>

                    
                <?php 
                    }
                ?>

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>