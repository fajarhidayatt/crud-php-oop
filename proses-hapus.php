<?php
// memanggil file siswa.php
include 'mahasiswa.php';

if (isset($_GET['id'])) {
    // membuat objek mahasiswa
    $dataMahasiswa = new Mahasiswa();

	$nim = $_GET['id'];

	// delete data siswa
    $dataMahasiswa->hapusData($nim);
}					
?>