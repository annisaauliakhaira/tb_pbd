 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Barang <small>Data Barang</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Barang</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/barang_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_barang'])){
                        $kode_barang = $_GET['kode_barang'];
                    }else{
                        $kode_barang = 0;
                    }
                    $sql="select * from barang where kode_barang=$kode_barang";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_barang">Kode barang</label>
                        <input type="text" value="<?php echo $data['kode_barang']; ?>" name="kode_barang" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="no_seri">No Serial</label>
                        <input type="text" value="<?php echo $data['no_seri']; ?>" name="no_seri" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="kondisi">Kondisi Barang</label>
                        <select name="kondisi" class="form-control" >
                            <option value="1">baik</option>
                            <option value="2">kurang baik</option>
                            <option value="3">rusak</option>
                        </select>

                    </div> 

                    <div class="form-group">
                        <label class="control-label" for="no_livret">Dokumentasi Barang No Livret</label>
                        <input type="text" value="<?php echo $data['no_livret']; ?>" name="no_livret" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="th_pembuatan">Tahun Pembuatan</label>
                        <input type="text" value="<?php echo $data['th_pembuatan']; ?>" name="th_pembuatan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="kode_persetujuan">Kode Persetujuan</label>
                        <select class="form-control" name="kode_persetujuan">
                              <?php
                                $sql = "select persetujuan.kode_persetujuan from persetujuan join pengajuan on persetujuan.kode_pengajuan = pengajuan.kode_pengajuan where pengajuan.total > (select count(barang.kode_barang) from barang where barang.kode_persetujuan = persetujuan.kode_persetujuan) ";
                                $eksekusi = pg_query($sql);
                                while ($persetujuan = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$persetujuan['kode_persetujuan'].'">'.$persetujuan['kode_persetujuan'].'</option>';
                                }
                              ?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="kode_merk">Merek / Model</label>
                         <select class="form-control" name="kode_merk">
                              <?php
                                $sql = "select kode_merk, nama_merk from merk_modal";
                                $eksekusi = pg_query($sql);
                                while ($jabatan = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$jabatan['kode_merk'].'">'.$jabatan['nama_merk'].'</option>';
                                }
                              ?>
                          </select>
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