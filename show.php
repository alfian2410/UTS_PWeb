<?php 
session_start();
$root = "http://localhost:41062/www";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Produk</title>
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
    <h1>Produk</h1>
    <div style="border: none !important" class="card m-1">
      <div class="card-body">
        <div class="card-title d-flex justify-content-between">
        <a class="btn btn-success mb-2" href="backend/create.php"><b>Tambah Data</b></a>
        </div>
    <table class="table">
        <thead class="table-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar Produk</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require './config/db.php';

                $products = mysqli_query($db_connect,"SELECT * FROM products");
                $no = 1;

                while($row = mysqli_fetch_assoc($products)) {
            ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['name'];?></td>
                    <td>Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
                    <!-- <td><img src="<?=$row['image'];?>" width="100"></td> -->
                    <td><a class="btn btn-info" href="<?= $root.$row['image'];?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a></td>
                    <td>
                        <a class="btn btn-outline-success" href="backend/edit.php?id=<?=$row['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                        <a  class ="btn btn-outline-danger" href="./backend/delete.php?id=<?=$row['id'];?>">hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
      </div>
    </div>
    <script src="../plugin/js/bootstrap.min.js"></script>
    <script>
    function hapus(id_user){
        var konfirmasi = confirm("Anda yakin ingin menghapus data ini?");
        if(konfirmasi == true){
            window.location.href = "backend/delete.php?id=" + id_user;
        }
        else {
            return false;
        }
    }
</script>
</body>
</html>
