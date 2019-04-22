
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Mutasi Barang <small>Data Mutasi Barang</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Mutasi Barang</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/mutasi_barang_controller.php?aksi=tambah" method="post">
            <div class="row">

                   
                    <div class="form-group">
                        <label class="control-label" for="kode_mutasi">Kode Mutasi</label>
                        <select class="form-control" name="kode_mutasi">
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
                        <label class="control-label" for="kondisi_barang">Kondisi Barang</label>
                        <select name="kondisi_barang" class="form-control" >
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