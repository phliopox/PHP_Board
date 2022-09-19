<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>New Post</title>
  <link rel="stylesheet" href="/css/newpost.css">
    <!-- 게시글 작성 페이지 -->
 </head>
 <body>
  <div id="board">
  <h1>new post</h1>
  <form action="../save_post.php" method="post">
	  <div id="wrap">
		<textarea name="title" rows="1" cols="95" placeholder="제목을 입력하세요"></textarea>
		<textarea name="content" rows="30" cols="95" placeholder="내용을 입력하세요"></textarea>
	  </div>
    <button type="submit">글 작성</button>
  </form>
  </div>
 </body>
</html>