<?php
//post_content.php 에서 사용 (게시글 수정)


include_once("conn.php");

$title = $_POST['title'];
$content = $_POST['content'];
$board_id = $_POST['board_id'];

$conn = sql_connect();
$sql="UPDATE board SET title = '$title', content = '$content' WHERE num = $board_id";
$result = sql_insert($sql,$conn);

?>