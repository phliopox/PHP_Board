<?php
    include_once('../conn.php');
    $userid = $_POST['userid'];
    $userpw = $_POST['userpw'];

    $conn=sql_connect();
    $sql="SELECT*FROM member WHERE userid='".$userid."'";
    $result = sql_select($sql,$conn);
    $row=sql_fetch_array($result);

    if(trim($userpw)=="" || trim($userid)==""){
        echo 
        "<script>
        alert('아이디와 비밀번호를 입력해주세요');
        location.href='join.php';
        </script>";
    }

    if($row['userid']!=null){
       echo 
       "<script>alert('이미 존재하는 아이디입니다.');
       location.href='join.php';
       </script>"; 
    }
    
    

    $sql="INSERT INTO member SET userid = '$userid',userpw = '$userpw'";
    sql_insert($sql,$conn);
    echo "<script> location.href='login.php'; </script>";
?>