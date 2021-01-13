<?php
include ('config.php');
if(empty($_GET['ID'])){
	die ('Цель не была выбрана!');
} else {
	$ID = $_GET['ID'];
//запрос
	$checkSQL=mysqli_query($connection, "SELECT ID, title, news FROM `news` WHERE ID='$ID'");
	$sql = "SELECT * FROM news WHERE ID='$ID'";
	$output  = mysqli_query($connection, $sql);
	$str = mysqli_fetch_assoc($output);	
}	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Чтение новостей</title>
</head>
<body>
<h1>Просмотр новостей</h1>
<?php
    while($str=mysqli_fetch_array($checkSQL)){
        echo'
            <div>
            <p>'.$str['title'].'</p>
            <p>'.$str['news'].'</p>
            </div>';
    }
?>
<a href="news.php"> назад </a>
</body>
</html>