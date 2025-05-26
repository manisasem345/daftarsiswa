<?php
include('konekdb.php');
$nis = $_GET['nis'];
$sql = "DELETE FROM nama_siswa WHERE nis='$nis'";
$conn->query($sql);
header("Location: tabel_siswa.php");
$conn->close();