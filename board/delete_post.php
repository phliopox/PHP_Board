<?php

$board_id = $_POST["board_id"];

include_once("conn.php");
$conn = sql_connect();
$sql="delete from board where num=$board_id";
$result = sql_insert($sql,$conn);
?>