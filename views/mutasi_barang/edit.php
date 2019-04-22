 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Mutasi Barang <small>Data Mutasi Barang</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Mutasi Barang</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/mutasi_barang_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_mutasi'])){
                        $kode_mutasi = $_GET['kode_mutasi'];
                    }else{
                        $kode_mutasi = 0;
                    }

                    if(isset($_GET['kode_barang'])){
                        $kode_barang = $_GET['kode_barang'];
                    }else{
                        $kode_barang = 0;
                    }
                    $sql="select * from mutasi_barang where kode_mutasi=$kode_mutasi AND kode_barang=$kode_barang";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>

                    <div class="form-group">
                        <label class="control-label" for="kode_mutasi">Kode Mutasi</label>
                        <select class="form-control" name="kode_mutasi" value="<?php echo $data['kode_mutasi']; ?>" readonly>
                              <?php
                                $sql = "select kode_mutasi from mutasi";
                                $eksekusi = pg_query($sql);
                                while ($mutasi = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$mutasi['kode_mutasi'].'">'.$mutasi['kode_mutasi'].'</option>';
                                }
                              ?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="kode_barang">Kode Barang</label>
                        <select class="form-control" name="kode_barang" value="<?php echo $data['kode_barang']; ?>" readonly>
                              <?php
                                $sql = "select kode_barang from barang";
                                $eksekusi = pg_query($sql);
                                while ($barang = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$barang['kode_barang'].'">'.$barang['kode_barang'].'</option>';
                                }
                              ?>
                          </select>
                    </div>

                   <div class="form-group">
                        <label class="control-label" for="kondisi_barang">Kondisi Barang</label>
                        <select name="kondisi_barang" value="<?php echo $data['kondisi_barang']; ?>" class="form-control" >
                            <option value="1">baik</option>
                            <option value="2">kurang baik</option>
                            <option value="3">rusak</option>
                        </select>

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