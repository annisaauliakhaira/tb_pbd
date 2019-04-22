 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Cabang Barang <small>Data Cabang Barang</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Cabang Barang</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/cabang_barang_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_cabang'])){
                        $kode_cabang = $_GET['kode_cabang'];
                    }else{
                        $kode_cabang = 0;
                    }

                    if(isset($_GET['kode_barang'])){
                        $kode_barang = $_GET['kode_barang'];
                    }else{
                        $kode_barang = 0;
                    }

                    $sql="select * from cabang_barang where kode_cabang=$kode_cabang AND kode_barang=$kode_barang";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>

                    <div class="form-group">
                        <label class="control-label" for="nama_cabang">Cabang</label>
                        <select class="form-control" name="kode_cabang" readonly>
                              <?php
                                $sql = "select kode_cabang, nama_cabang from cabang";
                                $eksekusi = pg_query($sql);
                                while ($cabang = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$cabang['kode_cabang'].'">'.$cabang['nama_cabang'].'</option>';
                                }
                              ?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="kode_barang">Kode Barang</label>
                        <select class="form-control" name="kode_barang" readonly>
                              <?php
                                $sql = "select kode_barang, kode_barang from barang";
                                $eksekusi = pg_query($sql);
                                while ($barang = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$barang['kode_barang'].'">'.$barang['kode_barang'].'</option>';
                                }
                              ?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="status">Status</label>
                        <input type="text" value="<?php echo $data['status']; ?>" name="status" class="form-control" required >
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="kondisi_barang">Kondisi Barang</label>
                        <select name="kondisi_barang" value="<?php echo $data['kondisi_barang']; ?>" class="form-control" >
                            <option value="1">baik</option>
                            <option value="2">rusak ringan</option>
                            <option value="3">rusak berat</option>
                        </select>

                    </div> 

                    <div class="form-group">
                        <label class="control-label" for="no_livret">Dokumentasi Barang No Livret</label>
                        <input type="text" name="no_livret" class="form-control" value="<?php echo $data['no_livret']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="jumlah_barang">Jumlah Barang</label>
                        <input type="text" name="jumlah_barang" class="form-control" value="<?php echo $data['jumlah_barang']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="satuan">Satuan</label>
                        <input type="text" name="satuan" class="form-control" value="<?php echo $data['satuan']; ?>" required>
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