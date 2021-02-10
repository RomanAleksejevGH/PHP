<?php
    include ('includes/config.php');
    if (!empty($_POST['login']) && !empty($_POST['pass']) 
    && !empty($_POST['name']) && !empty($_POST['surname'])
    && !empty($_POST['phone']) && !empty($_POST['email'])
    && !empty($_POST['address'])){
        $login= htmlspecialchars(trim($_POST['login']));
        $pass= htmlspecialchars(trim($_POST['pass']));
        $pass2= htmlspecialchars(trim($_POST['pass2']));
        $phone= htmlspecialchars(trim($_POST['phone']));
        $email= htmlspecialchars(trim($_POST['email']));
        $address= htmlspecialchars(trim($_POST['address']));
        $name= htmlspecialchars(trim($_POST['name']));
        $surname= htmlspecialchars(trim($_POST['surname']));

        if (strlen($pass)<6){
            echo "Пароль должен быть не менее 6 символов";
        }else{
            if ($pass != $pass2){
                echo "Пароли не совпадают";
            }else{
                $salt='taiestisuvalinetekst';
                $kryp=crypt($pass, $salt);
                $output=mysqli_query($connection,"select * from users where login = '{$login}'");
                if (mysqli_num_rows($output) > 0){
                    echo "Пользователь с таким именем уже существует";
                }else{
                    $paring="insert into users set login='$login', pass='$kryp', name='$name', surname='$surname', address='$address', email='$email', phone='$phone'";
                    $output=mysqli_query($connection, $paring);
                    if (mysqli_affected_rows($connection)==1){
                        header('Location: login.php?msg=ok');
                    }else{
                        echo "неверный логин или пароль";
                    }
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html>


    <meta charset="utf-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="lib/signin.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body class="text-center">
    <main class="form-signin">
        <form method="post">
                    <div class="container">
                    <label class="form-label">Login</label>
                    <input type="text" class="form-control" name="login" requiered>
                <div class="row justify-content-center">
                    <div class="col">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Your name" requiered>
                    </div>
                    <div class="col>
                    <label class="form-label">Surname</label>
                    <input type="text" class="form-control" name="surname" placeholder="Your surname" requiered>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="+372 555 55 55" requiered>
                    </div>
                    <div class="col">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Country, City, Street, house number, room number" requiered>
                    </div>
                    <div class="col">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="example@mail.com" requiered>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="6 or more symbols" required>
                    </div>
                    <div class="col">
                    <label class="form-label">Repeat password</label>
                    <input type="password" class="form-control" name="pass2" required>
                    </div>
                </div>

                <button class=" btn btn-lg btn-primary" type="submit">Register</button>
                <p class="link">Already have an account? <a href="login.php">Login Now</a></p>

            </div>
        </form>
    </main>
</body>
</html>