
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Cabang Barang <small>Data Cabang Barang</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Cabang Barang</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/cabang_barang_controller.php?aksi=tambah" method="post">
            <div class="row">

                   
                    <div class="form-group">
                        <label class="control-label" for="nama_cabang">Cabang</label>
                        <select class="form-control" name="kode_cabang">
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
                        <select class="form-control" name="kode_barang">
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
                        <select name="status" class="form-control" >
                            <option value="1">baru</option>
                            <option value="2">mutasi</option>
                        </select>

                    </div> 

                     <div class="form-group">
                        <label class="control-label" for="kondisi_barang">Kondisi Barang</label>
                        <select name="kondisi_barang" class="form-control" >
                            <option value="1">baik</option>
                            <option value="2">rusak ringan</option>
                            <option value="3">rusak berat</option>
                        </select>

                    </div> 

                    <div class="form-group">
                        <label class="control-label" for="no_livret">Dokumentasi Barang No Livret</label>
                        <input type="text" name="no_livret" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="jumlah_barang">Jumlah Barang</label>
                        <input type="text" name="jumlah_barang" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="satuan">Satuan</label>
                        <input type="text" name="satuan" class="form-control" required>
                    </div>

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>