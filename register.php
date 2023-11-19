<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
    <form action="./backend/register.php" method="post">
        <div class="form outline mb-4">
            <input class= "form-control mb-4" type="text" name="name" placeholder="masukkan nama anda" required>
            <input class= "form-control mb-4" type="email" name="email" placeholder="masukkan email anda" required>
            <input class= "form-control mb-4" type="password" name="password" placeholder="masukkan password anda" required>
            <input class= "form-control mb-4" type="password" name="confirm" placeholder="masukkan konfirmasi password anda" required>
            <input class= "form-control btn btn-success" type="submit" value="register" name="submit"> 
        </div>
       

    </form>

</body>
</html>