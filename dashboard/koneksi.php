<?php
$con = mysqli_connect("localhost",'root','','belajar_lsp1');

if (mysqli_connect_errno()) {
  echo "Gagal menyambung ke database",mysqli_connect_error();
}
?>