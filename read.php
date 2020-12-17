<?php
include ('config.php');
$checkSQL=mysqli_query($connection, "SELECT * FROM `news`")
?>
<?php
    while($str=mysqli_fetch_array($checkSQL)){
        echo'
            <div>
            <p><span>ID </span>'.$str['ID'].'</p>
            <p><span>Title </span>'.$str['title'].'</p>
            <p><span>News </span>'.$str['news'].'</p>
            </div>
            <hr>';
    }
?>