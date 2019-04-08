
 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Jenis <small>Data Jenis</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i>Jenis</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="http://localhost/pbd/controller/jenis_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_jenis'])){
                        $kode_jenis = $_GET['kode_jenis'];
                    }else{
                        $kode_jenis = 0;
                    }
                    $sql="select * from jenis where kode_jenis=$kode_jenis";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_jenis">Kode jenis</label>
                        <input type="text" value="<?php echo $data['kode_jenis']; ?>" name="kode_jenis" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_jenis">Nama jenis</label>
                        <input type="text" value="<?php echo $data['nama_jenis']; ?>" name="nama_jenis" class="form-control" required>
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