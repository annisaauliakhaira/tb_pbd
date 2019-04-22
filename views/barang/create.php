
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Barang <small>Data Barang</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Barang</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/barang_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_barang">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="no_seri">No Seri</label>
                        <input type="text" name="no_seri" class="form-control" required>
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
                        <label class="control-label" for="th_pembuatan">Tahun Pembuatan</label>
                        <input type="text" name="th_pembuatan" class="form-control" required>
                    </div>               

                    <div class="form-group">
                        <label class="control-label" for="kode_persetujuan">Kode Persetujuan</label>
                        <select class="form-control" name="kode_persetujuan">
                              <?php
                                $sql = "SELECT persetujuan.kode_persetujuan, jenis.nama_jenis from persetujuan join pengajuan on persetujuan.kode_pengajuan = pengajuan.kode_pengajuan join jenis on pengajuan.kode_jenis = jenis.kode_jenis where pengajuan.total > (select count(barang.kode_barang) from barang where barang.kode_persetujuan = persetujuan.kode_persetujuan) ";
                                $eksekusi = pg_query($sql);
                                while ($persetujuan = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$persetujuan['kode_persetujuan'].'">'.$persetujuan['kode_persetujuan'].'-'.$persetujuan['nama_jenis'].'</option>';
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
                        <input type="text"  name="keterangan" class="form-control" required>
                    </div>
               

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>