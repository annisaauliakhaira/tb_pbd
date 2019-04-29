
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Mutasi <small>Data Mutasi</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Mutasi</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/mutasi_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_mutasi">Kode Mutasi</label>
                        <input type="text" name="kode_mutasi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tgl_mutasi">Tanggal Mutasi</label>
                        <input type="date" name="tgl_mutasi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_cabang">Cabang</label>
                        <select class="form-control" name="kode_cabang" id="cabang">
                          <option value="">--pilihan--</option>
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
                        <label class="control-label" for="nipp">Pegawai</label>
                         <select class="form-control" name="nipp" id="pegawai">
			              
				                 </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="kode_barang">Kode Barang</label>
                        <select class="form-control" name="kode_barang">
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
                        <label class="control-label" for="kondisi">Kondisi Barang</label>
                        <select name="kondisi" class="form-control" >
                            <option value="1">baik</option>
                            <option value="2">kurang baik</option>
                            <option value="3">rusak</option>
                        </select>
                    </div>
               

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>