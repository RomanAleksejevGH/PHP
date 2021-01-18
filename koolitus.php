<?php include ('config.php'); 
if(isset($_POST['submit'])){
    $sql = "INSERT INTO koolitus (name, address, phone, email)
    VALUES ('".$_POST["name"]."','".$_POST["address"]."','".$_POST["phone"]."','".$_POST["email"]."')";
if ($connection->query($sql)) {
    echo 'Record succesfully created!';
};
};
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Регистрация на курсы</title>

</head>
<body>
    <div class="container container-fluid">
    <h3>Регистрация на курсы</h3>
    <form method="post" class="row g-3">
        <div class="col-12">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name='email' placeholder="example@mail.com" required>
        </div>

        <div class="col-12">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name='phone' placeholder="+372 55 555 55" required>
        </div>

        <div class="col-12">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name='name' placeholder="Name, Last name" required>
        </div>

        <div class="col-12">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name='address' placeholder="Country, City, Street, house number, room number" required>
        </div>


        <div class="col-12">
            <button type="submit" name='submit' class="btn btn-primary">Регистрация</button>
        </div>
    </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>
</html>