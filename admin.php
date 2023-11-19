<?php 
session_start();
if ($_SESSION['role'] != 'admin') {
    echo "
    <script>
    alert('Halaman ini hanya bisa di akses oleh admin');
    window.location = 'profile.php';
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./plugin/css/bootstrap.min.css">
    <title>Admin</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar">
  <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="Admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="show.php">products</a>
      </li>
      <a href="index.php" class = "btn btn-danger">logout</a>
  </ul>
</nav>
    <h1>Selamat datang Administrator: <?php echo $_SESSION['name']?></h1>
</body>
</html>
