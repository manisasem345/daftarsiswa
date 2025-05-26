<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-white" id="body">
<div class="bg-opacity-25">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="simpan_siswa.php" method="POST" id="form">
                    <div class="card shadow mb-5">
                        <div class="card-body">
                            <h5 class="card-title text-dark-brown text-center">Formulir Siswa</h5>
                            <hr>
                            <div class="mb-3">
                                <label for="nis" class="form-label">No. Induk Siswa</label>
                                <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS" maxlength="15">
                            </div>
                            <div class="mb-3">
                                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama Siswa" maxlength="50">
                            </div>
                            <div class="mb-3">
                                <label for="JK" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="JK" name="JK">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="notelp" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" name="notelp" id="notelp" placeholder="Masukkan No. Telepon/HP" maxlength="15">
                            </div>
                            <hr>
                            <div class="mb-3 text-end">
                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="simpan">Simpan Data Siswa Baru</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="psn" value="<?php if(isset($_GET['pesan'])) echo $_GET['pesan']; ?>">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const body = document.getElementById('body');
    const psn = document.getElementById('psn');
    const form = document.getElementById('form');
    const btnsimpan = document.getElementById('simpan');
    const nis = document.getElementById('nis');
    const nama = document.getElementById('nama_siswa');
    const jk = document.getElementById('JK');
    const alamat = document.getElementById('alamat');
    const notelp = document.getElementById('notelp');

    function simpan(){
        if(nis.value === ''){
            Swal.fire("Data tidak valid", "NIS masih kosong!", "error");
            nis.focus();
        } else if(nama.value === ''){
            Swal.fire("Data tidak valid", "Nama Siswa masih kosong!", "error");
            nama.focus();
        } else if(jk.value === ''){
            Swal.fire("Data tidak valid", "Jenis Kelamin belum dipilih!", "error");
            jk.focus();
        } else if(alamat.value === ''){
            Swal.fire("Data tidak valid", "Alamat masih kosong!", "error");
            alamat.focus();
        } else if(notelp.value === ''){
            Swal.fire("Data tidak valid", "No Telepon masih kosong!", "error");
            notelp.focus();
        } else {
            form.submit();
        }
    }

    body.onload = function() {
        if(psn.value === "duplikat"){
            Swal.fire("Duplikasi Data", "NIS sudah ada di database!", "error");
        } else if(psn.value === "sukses"){
            Swal.fire("Berhasil Disimpan", "Data siswa berhasil disimpan ke database!", "success");
        }
    }

    btnsimpan.onclick = function() {
        simpan();
    }
</script>
</body>
</html>