<?php

//deklarasi interface class

interface kelolaData
{
	public function tambahData($nim, $nama, $tanggal_lahir, $jenis_kelamin, $alamat);
	public function tampilData();
	public function updateData($nim, $nama, $tanggal_lahir, $jenis_kelamin, $alamat);
	public function hapusData($x);
	public function ambilData($nim);
}
