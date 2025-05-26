<?php
include 'konekdb.php';
$query = "SELECT * FROM nama_siswa";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-white">

<div class="container mt-5">
    <h3 class="mb-4">Data Siswa</h3>
    <a href="form_siswa.php" class="btn btn-success mb-3">+ Tambah Siswa</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['nis']; ?></td>
                <td><?= $row['nama_siswa']; ?></td>
                <td><?= $row['JK']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['notelp']; ?></td>
                <td>
                    <a href="edit_siswa.php?nis=<?= $row['nis']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <button onclick="konfirmasiHapus('<?= $row['nis']; ?>')" class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
function konfirmasiHapus(nis) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data tidak bisa dikembalikan setelah dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'hapus_siswa.php?nis=' + nis;
        }
    });
}
</script>

</body>
</html>