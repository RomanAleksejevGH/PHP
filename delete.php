<?php
include ('config.php');
$checkSQL=mysqli_query($connection, "SELECT ID, title, news FROM `news`");

if(!empty($_GET['ID'])){
    //запрос на удаление
    $id=$_GET['ID'];
    $delete_sql="DELETE FROM news WHERE ID='$id'";
    $delete_value = mysqli_query($connection, $delete_sql);
    if($delete_value){
        echo "Строка удалена!";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'">';
    }else{
        echo "Ошибка при удалении";
    }

}
?>
<?php
    while($str=mysqli_fetch_array($checkSQL)){
        echo'
            <div>
            <p><span>ID </span>'.$str['ID'].'</p>
            <p><span>Title </span>'.$str['title'].'</p>
            <p><span>News </span>'.$str['news'].'</p>
            <a href="'.$_SERVER['PHP_SELF'].'?ID=' .$str['ID'].'"></i>delete</a>
            </div>
            <hr>';
    }
?>