<!-- Aplikasi CRUD -->

<?php
// memanggil file siswa.php
include 'mahasiswa.php';

if (isset($_POST['ubah'])) {
  if (isset($_POST['nim'])) {

    // membuat objek mahasiswa
    $dataMahasiswa = new Mahasiswa();

    // ambil data hasil submit dari form ubah
    $nim           = $_POST['nim'];
    $nama          = trim($_POST['nama']);

    $tanggal       = $_POST['tanggal_lahir'];
    $tgl           = explode('-', $tanggal);
    $tanggal_lahir = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat        = trim($_POST['alamat']);

    // update data mahasiswa
    $dataMahasiswa->updateData($nim, $nama, $tanggal_lahir, $jenis_kelamin, $alamat);
  }
}
?>