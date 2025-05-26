<?php
include('konekdb.php');

$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$jk = $_POST['JK'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];

// Cek duplikat NIS
$cari = "SELECT nis FROM nama_siswa WHERE nis = '$nis'";
$result = $conn->query($cari);

if ($result->num_rows > 0) {
    header("Location: form_siswa.php?pesan=duplikat");
    exit;
} else {
    $sql = "INSERT INTO nama_siswa (nis, nama_siswa, JK, alamat, notelp)
            VALUES ('$nis', '$nama_siswa', '$jk', '$alamat', '$notelp')";

    if ($conn->query($sql) === TRUE) {
      header("Location: form_siswa.php?pesan=sukses");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>