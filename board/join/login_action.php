<?php
include_once('../conn.php');
$loginid = $_POST['loginid'];
$loginpw = $_POST['loginpw'];

$conn = sql_connect();
$sql = "SELECT*FROM member where userid='".$loginid."'";
$result = sql_select($sql,$conn); 
$row = sql_fetch_array($result);

if($row['userid']==null){
    echo 
    "<script>
    alert('회원 정보가 존재하지 않습니다.'); 
    location.href='login.php';
    </script>";
}

if(trim($loginid)=="" || trim($loginpw)==""){
    echo 
    "<script>
    alert('아이디와 비밀번호를 입력해주세요');
    location.href='login.php';
    </script>";
}

if($row['userpw']!==$loginpw){
    echo 
    "<script>
    alert('비밀번호가 일치하지 않습니다.'); 
    location.href='login.php';
    </script>"; 
}

session_start();
$_SESSION['USER_ID'] = $loginid;
echo "<script> location.href='../skin/board_list.php'; </script>";
?>