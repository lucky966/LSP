<?php
include 'koneksi.php';
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM siswa WHERE id = '$id'";
    $result = mysqli_query($con,$sql);
    if ($result) {
      header('Location: siswa.php');
    }else{
      echo "gagal";
    }
}
?>