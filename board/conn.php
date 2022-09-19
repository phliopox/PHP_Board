<?php
//mysqli 존재 확인
function sql_connect(){
	$db_host="localhost:33066";
	$db_user ="root";
	$db_passwd="123123";
	$db="jeong";

	
	if(function_exists('mysqli_connect')){
		$connect=mysqli_connect($db_host,$db_user,$db_passwd,$db);

		if(mysqli_connect_error()){
			echo "DB 연결에 실패했습니다.".mysqli_connect__error();
		}

	}else{
		$connect=mysql_connect($db_host,$db_user,$db_passwd);
	}

	return $connect;
}

function sql_insert($sql,$conn){
	if(function_exists('mysqli_query')){
		$result = mysqli_query($conn,$sql);
	}else{
		$result = mysql_query($sql,$conn);
	}

	if($result ===false){
		echo mysqli_error($conn);
	}

	return $result;
}

function sql_select($sql,$conn){
	
	if(function_exists('mysqli_query')){
		$result = mysqli_query($conn,$sql);
	}else{
		$result = mysql_query($sql,$conn);
	}
	
	return $result;
}

function sql_fetch_array($result){
	if(function_exists('mysqli_fetch_assoc')){
		$row = mysqli_fetch_assoc($result);
	}else{
		$row = mysql_fetch_assoc($result);
	}
	
	return $row;
}

function sql_rows_count($result){
	if(function_exists('mysqli_num_rows')){
		$count = mysqli_num_rows($result);
	}else{
		$count = mysql_num_rows($result);
	}
	return $count;
}