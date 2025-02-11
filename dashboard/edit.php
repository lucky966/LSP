<?php
include "koneksi.php";

$id = $_GET['id'];
// Ambil data siswa berdasarkan ID
$sql = "SELECT * FROM siswa WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$dt = mysqli_fetch_assoc($result);

// Cek apakah tombol update ditekan
if (isset($_POST['update'])) {
    $id = $_POST['id']; // Pastikan ID diambil dari hidden input
    $name = htmlspecialchars($_POST['name']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    $sql = "UPDATE siswa SET name='$name', kelas='$kelas', jurusan='$jurusan' WHERE id ='$id'"; 
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo '<div class="alert alert-success" role="alert">
                A simple success alert—check it out!
              </div>';
        header("Location: siswa.php");
        exit; // Mencegah eksekusi kode setelah redirect
    } else {
        echo "Gagal update data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Siswa</title>
  <link rel="stylesheet" href="../../asset/css/bootstrap.css">
  <link rel="stylesheet" href="../../bootstrap/scss/_alert.scss">
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h3>Edit Data</h3>
          </div>
          <div class="card-body">

          <form method="POST">
            <!-- ID harus dikirim melalui hidden input -->
            <input type="hidden" value="<?= htmlspecialchars($dt['id']) ?>" name="id">

            <label>Nama</label><br>
            <input type="text" class="form-control" value="<?= htmlspecialchars($dt['name']) ?>" name="name" required><br>
            
            <label>Kelas</label><br>
            <input type="text" class="form-control" value="<?= htmlspecialchars($dt['kelas']) ?>" name="kelas" required><br>
            
            <label>Jurusan</label><br>
            <input type="text" class="form-control" value="<?= htmlspecialchars($dt['jurusan']) ?>" name="jurusan" required><br>

            <button type="submit" class="btn btn-warning" name="update">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
