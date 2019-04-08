
 <div class="row">
  <div class="col-lg-12">
    <h1> Edit pegawai <small>Data pegawai</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> pegawai</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="http://localhost/pbd/controller/pegawai_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_pegawai'])){
                        $kode_pegawai = $_GET['kode_pegawai'];
                    }else{
                        $kode_pegawai = 0;
                    }
                    $sql="select * from pegawai where kode_pegawai=$kode_pegawai";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_pegawai">Kode pegawai</label>
                        <input type="text" value="<?php echo $data['kode_pegawai']; ?>" name="kode_pegawai" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_pegawai">Nama pegawai</label>
                        <input type="text" value="<?php echo $data['nama_pegawai']; ?>" name="nama_pegawai" class="form-control" required>
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