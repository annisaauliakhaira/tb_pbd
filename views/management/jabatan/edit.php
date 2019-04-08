
 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Jabatan <small>Data Jabatan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i>Jabatan</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="http://localhost/pbd/controller/jabatan_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_jabatan'])){
                        $kode_jabatan = $_GET['kode_jabatan'];
                    }else{
                        $kode_jabatan = 0;
                    }
                    $sql="select * from jabatan where kode_jabatan=$kode_jabatan";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_jabatan">Kode jabatan</label>
                        <input type="text" value="<?php echo $data['kode_jabatan']; ?>" name="kode_jabatan" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_jabatan">Nama jabatan</label>
                        <input type="text" value="<?php echo $data['nama_jabatan']; ?>" name="nama_jabatan" class="form-control" required>
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