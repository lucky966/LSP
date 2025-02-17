<?php
session_start();

// Cek apakah session ada
if (!isset($_SESSION['name'])) {
    header("Location: ../login.php"); // Redirect ke halaman login jika belum login
    exit;
}

include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../asset/css/bootstrap.css">
</head>
<body class="container">
  <marquee behavior="" direction=""><?= $_SESSION['name'] ?></marquee>

  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="col-4 mt-4 mb-4">
        <a href="form.php" class="btn btn-success">Tambah Data</a>
      </div>
      <div class="card">
        <div class="card-header">
          <h2>Data Siswa</h2>
        </div>
          <div class="card-body">
            <table class="table table-striped-columns">
              <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Jurusan</th>
                  <th>Aksi</th>
              </tr>
              <?php
                  $no = 1;
                  $sql = "SELECT * FROM siswa ORDER BY id DESC";
                  $result = mysqli_query($con, $sql);
                  while ($dt = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $dt['name'] ?></td>
                <td><?= $dt['kelas'] ?></td>
                <td><?= $dt['jurusan'] ?></td>
                <td>
                  <a class="btn btn-warning" href="edit.php?id=<?= $dt['id']?>">Edit</a>
                  <a class="btn btn-danger" href="delete.php?delete=<?= $dt['id']?>">Delete</a>
                </td>
              </tr>
              <?php } ?>
            </table>
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <script type="module" src="../asset/js/bootstrap.js"></script>
</body>
</html>
