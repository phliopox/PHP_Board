<?php
session_start();

unset($_SESSION['USER_ID']);

echo "<script>location.href='/skin/board_list.php';</script>"
?>
