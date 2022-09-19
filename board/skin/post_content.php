<?php session_start();?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Post</title>
  <link rel="stylesheet" href="/css/newpost.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- 게시글 상세 페이지 --> 
</head>
 <body>
    <?php
    include_once('../conn.php');
    
    if(isset($_GET['page'])){
        $pagenum=$_GET['page'];
    }
    if(isset($_GET['num'])){
        $board_id=$_GET['num'];
    }

    $conn =sql_connect();
    $sql = "select B.title,B.content,M.userid from board B INNER JOIN member M ON B.writer = M.userid where B.num= $board_id";
    $result = sql_select($sql,$conn);
    $row = sql_fetch_array($result);
    
    ?>
  <div id="post">
  <h1>post</h1>
	  <div id="wrap">
		<textarea name="title" rows="1" cols="95" readonly><?php echo $row['title']?></textarea>
		<textarea name="content" rows="30" cols="95" readonly><?php echo $row['content']?></textarea>
    <input name="board_id" value="<?php echo $board_id?>" hidden>
    <input name="pagenum" value="<?php echo $pagenum?>" hidden>
        <input name="<?php echo $row['userid']?>" value="<?php echo $row['userid']?>">
	  
      <?php 
      //session id 와 작성자가 일치할 경우 버튼 노출
      if(isset($_SESSION['USER_ID'])&&$_SESSION['USER_ID']===$row['userid']){
        echo "<button onclick='edit_post()'>수정하기</button>";
        echo "<button onclick='delete_post()'>삭제하기</button><br>";
      }?>

      </div>
      <button onclick="location.href='/skin/board_list.php?page=<?php echo $pagenum?>'">목록으로</button>
  </form>
  </div>
  <script type="text/javascript" src="/js/post_content.js"></script>
 </body>
</html>