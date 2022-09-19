<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Join</title>
  <link rel="stylesheet" href="/css/newpost.css">
 </head>
 <body>
  <div id="board">
  <h1>Join</h1>
  <form action="join_action.php" method="post">
	  <div id="wrap">
        <input type="text" name="userid" placeholder="아이디"><br>
        <input type="text" name="userpw" placeholder="비밀번호">
	  </div>
    <button type="submit">가입</button><br>
    <button type="button" onclick="location.href='login.php'">로그인하러가기</button>
    </form>

  </div>
 </body>
</html>