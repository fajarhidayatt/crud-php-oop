<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <i class="glyphicon glyphicon-edit"></i>
                Ubah data mahasiswa
            </h4>
        </div> <!-- /.page-header -->

        <?php
        // mendapatkan id dari id url
        $nim = $_GET['id'];

        if (isset($nim)) {
            // memanggil file mahasiswa.php
            include 'mahasiswa.php';

            // membuat objek mahasiswa
            $dataMahasiswa = new mahasiswa();

            // mengambil seluruh data mahasiswa dengan method ambilData
            $result = $dataMahasiswa->ambilData($nim);

            $nim           = $result['Nim'];
            $nama          = $result['Nama_Mhs'];

            $tanggal       = $result['Tgl_Lahir'];
            $tgl           = explode('-', $tanggal);
            $tanggal_lahir = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

            $jenis_kelamin = $result['Jenis_Kelamin'];
            $alamat        = $result['Alamat'];
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="proses-ubah.php">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">NIM</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="nim" maxlength="12" autocomplete="off" value="<?php echo $nim; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Mahasiswa</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Lahir</label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" value="<?php echo $tanggal_lahir; ?>" required>
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-4">
                            <?php if ($jenis_kelamin == 'Laki-laki') { ?>
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                                </label>
                            <?php } else { ?>
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" checked> Perempuan
                                </label>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-3">
                            <textarea class="form-control" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
                        </div>
                    </div>

                    <hr />
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-success btn-submit" name="ubah" value="Ubah">
                            <a href="index.php" class="btn btn-default btn-reset">Batal</a>
                        </div>
                    </div>
                </form>
            </div> <!-- /.panel-body -->
        </div> <!-- /.panel -->
    </div> <!-- /.col -->
</div> <!-- /.row -->