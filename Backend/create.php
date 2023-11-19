<?php 
session_start();
$this_doc = dirname(__FILE__);
if ($_SESSION['role'] != 'admin') {
    echo "
    <script>
    alert('Halaman ini hanya bisa di akses oleh admin');
    window.location = '../profile.php';
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../plugin/css/bootstrap.min.css">
    <title>Tambah Data</title>
</head>
<body>
<div style="border: none !important" class="card m-1" action ="create.php" >
<div class="card-body">
<form method="post" enctype="multipart/form-data">
    <h2>Tambah Data</h2>
  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="Name" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="Price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="Price" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="Image" class="form-label">Image</label>
    <input type="file" name="image" class="form-control" id="Image" aria-describedby="emailHelp" required>
  </div>
  <a class="btn btn-danger" href="../show.php">Cancel</a>
  <input type="submit" name="submit" class="btn btn-primary" value="Tambah">
</form>
</div>
</div>
</body>
</html>

<?php
    require './../config/db.php';
$this_doc = dirname(__FILE__);

if(isset($_POST['submit'])) {
    global $db_connect;

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    $randomFilename = time().'-'.md5(rand()).'-'.$image;

    $uploadPath = $this_doc.'./../upload/'.$randomFilename;
    // $uploadPath = $_SERVER['DOCUMENT_ROOT'].'/UTS/upload/'.$randomFilename;
    $upload = move_uploaded_file($tempImage,$uploadPath);

    if($upload) {
        mysqli_query($db_connect,"INSERT INTO products (name,price,image)
            VALUES ('$name','$price','/PEMROGRAMAN-WEB-MAIN/upload/$randomFilename')");
            echo "
            <script>
            alert('Berhasil upload');
            window.location = '../show.php';
            </script>
            ";
    } else {
        echo "
        <script>
        alert('Gagal upload');
        window.location = 'create.php';
        </script>
        ";
    }

}
?>

