<!doctype html>
<html>
<head>

<meta charset="utf-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link href="lib/signin.css" rel="stylesheet">
<title>Login</title>
</head>

<body class="text-center">
    <main class="form-signin">
    <?php 
    include ('includes/config.php');
    session_start();
    if (@$_GET['msg']){
        echo "Вы зарегистрированы";
    }
    if (isset($_SESSION['authentication'])){
        header('Location: admin.php');
        exit();
    }
    if (!empty($_POST['login']) && !empty($_POST['pass'])){
        $login=htmlspecialchars(trim($_POST['login']));
        $pass=htmlspecialchars(trim($_POST['pass']));
        $salt='taiestisuvalinetekst';
        $kryp=crypt($pass, $salt);
        $paring="SELECT * FROM users WHERE login='$login' AND pass='$kryp'";
        $output=mysqli_query($connection, $paring);

        if (mysqli_num_rows($output)==1){
            $_SESSION['authentication']=$login;
            // Redirect to user dashboard page
            header('Location: admin.php');
        }else{
            echo "Incorrect Username/password.";
        }
    }
    ?>
        <form method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            
            <label class="form-label">Login</label>
            <input type="text" class="form-control" name="login">
            <div class="form-text">We'll never share your Login and password with anyone else.</div>
            
            
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="pass">
            
            <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
            <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
        </form>
    </main>
</body>
</html>