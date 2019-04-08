
 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Cabang <small>Data Cabang</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Cabang</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="http://localhost/pbd/controller/cabang_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_cabang'])){
                        $kode_cabang = $_GET['kode_cabang'];
                    }else{
                        $kode_cabang = 0;
                    }
                    $sql="select * from cabang where kode_cabang=$kode_cabang";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_cabang">Kode cabang</label>
                        <input type="text" value="<?php echo $data['kode_cabang']; ?>" name="kode_cabang" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_cabang">Nama cabang</label>
                        <input type="text" value="<?php echo $data['nama_cabang']; ?>" name="nama_cabang" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="alamat">Alamat</label>
                        <input type="text" value="<?php echo $data['alamat']; ?>" name="alamat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="keterangan">Keterangan</label>
                        <input type="text" value="<?php echo $data['keterangan']; ?>" name="keterangan" class="form-control" required>
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