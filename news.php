<?php
include ('config.php');
if(isset($_POST['submit'])){
    $sql = "INSERT INTO news (title, news)
    VALUES ('".$_POST["title"]."','".$_POST["news"]."')";
if ($connection->query($sql)) {
    echo 'Record succesfully created!';
};
};
$checkSQL=mysqli_query($connection, "SELECT * FROM `news`");

if(!empty($_GET['ID'])){
    //запрос на удаление
    $ID=$_GET['ID'];
    $delete_sql="DELETE FROM news WHERE ID='$ID";
    $delete_value = mysqli_query($connection, $delete_sql);
    if($delete_value){
        echo "Строка удалена!";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'">';
    }else{
        echo "Ошибка при удалении";
    }

}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Новости</title>
</head>
<body>
<h1>Новости</h1>
<!--форма для ввода-->
<h2>Добавление новостей</h2>
<form method="post">
<div>
<label>Title</label>
<input type="text" name="title" placeholder="Введите заголовок:" required>
</div>
<div>
<label>News</label>
<textarea  type="text" name="news" rows="6" required></textarea>
</div>
<button type="submit" name="submit">Ввод</button>
</form>
<div>
    <table>
        <thead>
            <tr>
                <th>Заголовок</th>
                <th>Новость</th>
                <th>Удаление</th>
                <th>Редактирование</th>
                <th>Просмотр</th>
            </tr>
        </thead>
        <?php
        while($str=mysqli_fetch_array($checkSQL)){
            echo'
                    <tbody>
                        <tr>
                            <td>'.$str['title'].'</td>
                            <td>'.$str['news'].'</td>
                            <td><a href="'.$_SERVER['PHP_SELF'].'?ID='.$str['ID'].'">delete</a></td>
                            <td><a href="edit.php?ID='.$str['ID'].'">edit</a></td>
                            <td><a href="read.php?ID='.$str['ID'].'">read</a></td>
                        </tr>
                    </tbody>';
        }
        ?>
    </table>    
</div>
</body>
</html>