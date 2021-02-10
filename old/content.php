<?php 
include ('config.php'); {

//запрос
    $checkSQL=mysqli_query($connection, "SELECT id, title, text, date FROM `content`");
    //количество страниц
    $news_page=5;
    $news_total_request="SELECT COUNT('id') FROM content";
    $pages_response=mysqli_query($connection, $news_total_request);
    $news_total=mysqli_fetch_array($pages_response);
    $pages_total=$news_total[0];
    $pages_total=ceil($pages_total/$news_page);

    echo 'Всего страниц: '.$pages_total.'<br>';
    echo 'Новостей на странице: '.$news_page.'<br>';

    if (isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }

    $start=($page-1)*$news_page;
    $checkSQL=mysqli_query($connection, "SELECT * FROM content LIMIT $start, $news_page");

    //листание страниц
    $previous=$page-1;
    $next=$page+1;
    if ($page>1){
        echo "<a href=\"?page=$previous\">Предыдущая  </a>";
    }
    if ($pages_total >=1){
        for ($i=1; $i<=$pages_total; $i++){
            if ($i==$page){
            echo "<b><a href=\"?page=$i\"> $i </a></b>";
            } else {
            echo "<a href=\"?page=$i\"> $i </a>";
            }
        }
        }
    if ($page<$pages_total){
        echo "<a href=\"?page=$next\">  Далее  </a>";
    }
}	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Чтение новостей</title>
</head>
<body>
    <h1>Просмотр новостей</h1>
<?php
    while($str=mysqli_fetch_array($checkSQL)){
        echo'
            <div>
            <h3><p>'.$str['title'].'</p></h3>
            <p>'.$str['text'].'</p>
            <strong><p>'.$str['date'].'</p></strong>
            </div>
            <hr>';
    }
?>
<a href="content.php"> назад </a>
</body>
</html>