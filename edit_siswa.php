<?php
include('konekdb.php');
$nis = $_GET['nis'];
$sql = "SELECT * FROM nama_siswa WHERE nis='$nis'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-white">
<div class="container mt-5">
    <h3>Edit Data Siswa</h3>
    <form action="update_siswa.php" method="POST">
        <input type="hidden" name="nis" value="<?= $data['nis']; ?>">

        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa" value="<?= $data['nama_siswa']; ?>">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="JK" class="form-control">
                <option value="L" <?= $data['JK'] == 'L' ? 'selected' : ''; ?>>Laki-Laki</option>
                <option value="P" <?= $data['JK'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"><?= $data['alamat']; ?></textarea>
        </div>
        <div class="mb-3">
            <label>No Telepon</label>
            <input type="text" class="form-control" name="notelp" value="<?= $data['notelp']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="tabel_siswa.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>