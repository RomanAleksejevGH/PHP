<?php include ('config.php');?>
<?php
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
        $salt='123456789';
        $kryp=crypt($pass, $salt);
        $paring="SELECT * FROM users WHERE login='$login' AND pass='$kryp'";
        $output=mysqli_query($connection, $paring);

        if (mysqli_num_rows($output)==1){
            $_SESSION['authentication']='whatever';
            header('Location: admin.php');
        }else{
            echo "неправильный логин или пароль";
        }
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
        <h1>Login</h1>
		<form method="post">
				Логин: <input type="text" name="login" required><br>
				Пароль: <input type="password" name="pass" required><br>
			<input type="submit" value="Войти">
		</form>

</body>
</html>