<?php
include_once('conn.php');
session_start();

$writer = $_SESSION["USER_ID"];
$title = $_POST["title"];
$content = $_POST["content"];

$conn = sql_connect();

$sql = "INSERT INTO board SET title ='$title',content ='$content',writer = '$writer' ";
sql_insert($sql,$conn);
    
echo("<script>location.href='/skin/board_list.php?page=1'</script>")
?>