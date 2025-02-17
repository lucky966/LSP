<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // echo "login";
  $name = $_POST['name'];
  $password = $_POST['password'];

  
  if ($name === "admin" && $password === "dlanggu") {

    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
    header('Location: dashboard/siswa.php');
    exit;
  }else{
    $error =  "Nama / Password salah";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="asset/css/bootstrap.css">
</head>
<body>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3>Login</h3>
          </div>
          <div class="card-body">
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <form  method="POST">
                  <label for="">Nama</label><input name="name" class="form-control" type="text">
                  <label for="">Password</label><input name="password" class="form-control" type="password">
                  <button class="mt-2 btn btn-success">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>