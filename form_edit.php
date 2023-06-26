<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Mahasiswa</h1>
        <?php
        // Koneksi ke database
        include "koneksi.php";
        // Mendapatkan data mahasiswa berdasarkan ID
        $id = $_GET['id'];
        $sql = "SELECT * FROM mahasiswa WHERE id = ".$_GET['id'];
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_assoc($result);
        ?>
        <form action="aksi_edit.php" method="post">
            <input type="hidden" id="id" value="<?= $_GET['id'] ?>">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>" require>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>" require>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>" require>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" require>
                    <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-select" require>
                    <option value="Informatika" <?= $data['jurusan'] == 'Informatika' ? 'checked' : '' ?>>Informatika</option>
                    <option value="Sistem Informasi" <?= $data['jurusan'] == 'Sistem Informasi' ? 'checked' : '' ?>>Sistem Informasi</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control" require><?= $data['alamat'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="tampil_data.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
  </body>
</html>