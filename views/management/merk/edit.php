
 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Merek/Model <small>Data Merek/Model</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i>Merek/Model</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/merk_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_merk'])){
                        $kode_merk = $_GET['kode_merk'];
                    }else{
                        $kode_merk = 0;
                    }
                    $sql="select * from merk where kode_merk=$kode_merk";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_merk">Kode merk</label>
                        <input type="text" value="<?php echo $data['kode_merk']; ?>" name="kode_merk" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_merk">Nama merk</label>
                        <input type="text" value="<?php echo $data['nama_merk']; ?>" name="nama_merk" class="form-control" required>
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