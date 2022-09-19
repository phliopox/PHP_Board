<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Login</title>
  <link rel="stylesheet" href="/css/newpost.css">
 </head>
 <body>
  <div id="board">
  <h1>Login</h1>
  <form action="login_action.php" method="post">
	  <div id="wrap">
        <input type="text" name="loginid" placeholder="아이디"><br>
        <input type="text" name="loginpw" placeholder="비밀번호">
	  </div>
    <button type="submit">로그인</button><br>
    <button type="button" onclick="location.href='join.php'">가입하러가기</button>

    </form>

  </div>
 </body>