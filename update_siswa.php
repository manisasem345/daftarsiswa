<?php
include('konekdb.php');

$nis = $_POST['nis'];
$nama = $_POST['nama_siswa'];
$jk = $_POST['JK'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];

$sql = "UPDATE nama_siswa SET 
        nama_siswa='$nama', 
        JK='$jk', 
        alamat='$alamat', 
        notelp='$notelp' 
        WHERE nis='$nis'";

if ($conn->query($sql) === TRUE) {
    header('Location: tabel_siswa.php');
} else {
    echo "Gagal mengupdate data: " . $conn->error;
}
$conn->close();