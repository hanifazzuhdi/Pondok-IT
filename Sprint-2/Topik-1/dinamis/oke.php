<?php

// Hubungkan file
require 'latihan.php';

// Object
// $perpustakaan = new Perpustakaan();
$pengunjung = new Pengunjung();
$pinjam = new kelolaPinjaman();

echo "========================" . "\n";
echo "|  Welcome to Library  |" . "\n";
echo "========================" . "\n";


// Kondisi pada pengunjung
echo "1. Datang | 2. Pulang : ";
$kondisi = trim(fgets(STDIN));

if ($kondisi == 1) {
    echo "Masukkan Nama : ";
    $nama = trim(fgets(STDIN));

    echo $pengunjung->datang($nama);
} else if ($kondisi == 2) {
    echo $pengunjung->pulang();
    exit;
}

echo "========================================" . "\n";

// Kelola
echo "Mau Pinjam, Atau Baca Buku ? : ";
$book = strtolower(trim(fgets(STDIN)));

if ($book == "pinjam") {
    echo "Daftar Buku : " . "\n";
    echo "1. Ketika Dia" . "\n" . "2. Aku Bukan Dia" . "\n" . "3. Ketika Aku" . "\n";
    echo "Pinjam Buku : ";
    $pilih = (int) trim(fgets(STDIN));

    // jalankan pinjam buku
    $pinjam->pinjamBuku((int) $pilih);

    // Jalankan Kembalikan Buku
    echo "Mau Kembalikan Buku ? (y/n)";
    $kembalikan = trim(fgets(STDIN));

    if ($kembalikan == "y") {
        $kembalikan = new kelolaPinjaman();
        $kembalikan->kembalikanBuku();
    } else if ($kembalikan == "n") {
        echo "Jangan Lupa Kembalikan Buku Sesuai JADWAL !" . "\n";
    } else {
        echo "Inputan SALAH !";
    }
} else if ($book == "baca") {
    echo $pinjam->bacaBuku($nama) . "\n";
    exit;
} else {
    echo "Inputan SALAH !";
}