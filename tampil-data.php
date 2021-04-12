  <style>
    .swal2-popup {
      font-size: 1.5rem;
    }
  </style>

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Data Mahasiswa

          <a class="btn btn-success pull-right" href="?page=tambah">
            <i class="glyphicon glyphicon-plus"></i> Tambah
          </a>
        </h4>
      </div>

      <?php
      if (empty($_GET['alert'])) {
        echo "";
      } elseif ($_GET['alert'] == 1) { ?>
        <script>
          Swal.fire(
            'Gagal!',
            'Terjadi kesalahan',
            'error'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 2) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data mahasiswa berhasil disimpan',
            'success'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 3) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data mahasiswa berhasil diubah',
            'success'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 4) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data mahasiswa berhasil dihapus',
            'success'
          );
        </script>
      <?php } ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Data Mahasiswa Teknik Infromatika</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              // memanggil file mahasiswa.php
              include 'mahasiswa.php';

              // membuat objek mahasiswa
              $dataMahasiswa = new Mahasiswa();

              // mengambil seluruh data mahasiswa
              $result = $dataMahasiswa->tampilData();

              $no = 1;

              if (!empty($result)) {
                foreach ($result as $data) {

                  $tanggal        = $data['Tgl_Lahir'];
                  $tgl            = explode('-', $tanggal);
                  $tanggal_lahir  = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

                  echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[Nim]</td>
                      <td width='150'>$data[Nama_Mhs]</td>
                      <td width='180'>$tanggal_lahir</td>
                      <td width='120'>$data[Jenis_Kelamin]</td>
                      <td width='250'>$data[Alamat]</td>

                      <td width='100'>
                        <div class=''>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-success btn-sm' href='?page=ubah&id=$data[Nim]'>
                            <i class='glyphicon glyphicon-edit'></i>
                          </a>";
              ?>
                  <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" onclick="return hapusDataMahasiswa()">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
              <?php
                  echo "
                        </div>
                      </td>
                    </tr>";
                  $no++;
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->

  <script>
    function hapusDataMahasiswa() {
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda ingin menghapus data mahasiswa <?php echo $data['Nama_Mhs']; ?> ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = "proses-hapus.php?id=<?php echo $data['Nim']; ?>"
        }
      })
    }
  </script>