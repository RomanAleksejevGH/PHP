<?php include ('config.php'); 
if(isset($_POST['submit'])){
    $sql = "INSERT INTO content (title, text, date)
    VALUES ('".$_POST["title"]."','".$_POST["text"]."','".$_POST["date"]."')";
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

<html>
<head>
<meta charset="utf-8">
    <title>Добовление контента</title>
</head>
<body>
    <div>
    <form method="post">
    <label>Title</label>
    <input type="text" name="title" required>
    </div>
    <div>
    <label>Text</label>
    <textarea type="text" name="text" required></textarea>
    </div>
    <div>
    <label>Date</label>
    <input type="date" name="date" required>
    </div>
    <button type="submit" name="submit">Send</button>
    </form>
</body>
</html>