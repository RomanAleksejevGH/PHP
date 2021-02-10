<?php 
include ('config.php');

    if (!empty($_GET['search'])){
        //пользовательский текст из формы
        $search=$_GET['search'];

        $fields=['name'=>'name','email'=>'email','phone'=>'phone','address'=>'address',];
        $field='name';
        
        if (array_key_exists($_GET['where'],$fields)){
            $field=$fields[$_GET['where']];
        }
        $sql="SELECT * FROM koolitus WHERE ($field) LIKE '%{$search}%'";

        $output=mysqli_query($connection,$sql);
        // количество ответов на запрос
        $results=mysqli_num_rows($output);

        
        
        
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
    <title>Поиск</title>

</head>
<body>
<div class="container-fluid">
    <h3>Поиск</h3>
    <form method="get" action="">
    <div class="col-md-6 mt-3">
        <select id="select" name="where">
        <option>name</option>
        <option>email</option>
        <option>phone</option>
        <option>address</option>
    </select>
    </div>
    </br>
    Поиск <input type="text" name="search">
    <input type="submit" value="search...">
    </form>
    </div>
    <div class="container container-fluid">
            <h3>Результат поиска</h3>
            <table class="table table-hover table-bordered border-primary">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
        <?php
        echo 'Поиск по ключевому слову: '.$search.'<br>'; 
        // количество найденых ответов
        if ($results==0){
            echo "0 ответов найдено!";
        }else{
            echo 'Найдено - '.$results.' ответов'.'<br>';
        }
        // отображение на странице

        while($line=mysqli_fetch_array($output)){
            echo 
            '<tr>
            <th scope="row">'.$line['id'].'</th>
            <td>'.$line['name'].'</td>
            <td>'.$line['phone'].'</td>
            <td>'.$line['email'].'</td>
            <td>'.$line['address'].'</td>
            </tr>';
            }
            ?>
        </tbody>
        </table>
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