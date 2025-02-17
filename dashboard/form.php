<?php
include "koneksi.php";


if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
  // echo "tambah";
  $name = htmlspecialchars($_POST['name']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $jurusan = htmlspecialchars($_POST['jurusan']);

  $sql = "INSERT INTO siswa (name, kelas, jurusan) VALUES (
                              '$name',
                              '$kelas',
                              '$jurusan'
  )";

  $result = mysqli_query($con, $sql);

  if ($result) {
    header("Location: siswa.php");
  }else{
    echo "gagal ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../asset/css/bootstrap.css">

  <body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <h3>Tambah Data</h3>
          </div>
          <div class="card-body">

          <form method="post">
            <label for="name">name</label><br>
            <input class="form-control" type="text" name="name"><br>
            <label for="kelas">kelas</label><br>
            <input class="form-control" type="text" name="kelas"><br>
            <label for="jurusan">jurusan</label><br>
            <input class="form-control" type="text" name="jurusan"><br>
            <button class="btn btn-success" type="submit">Tambah</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>
</html>