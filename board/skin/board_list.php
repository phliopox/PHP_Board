<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Board</title>
  <link rel="stylesheet" href="/css/board_list.css"> 
  <!-- BOARD 게시판 목록 페이지 -->
 </head>
 <body>
    <?php 
    session_start();
    include_once('../conn.php');
    
    //pagenum url param 체크
    $pagenum=isset($_GET['page'])?$_GET['page']:1;
    

    $conn = sql_connect();
    $limit_param = 10*($pagenum-1);
    $sql = "SELECT R1.* FROM (SELECT*FROM board ORDER BY num DESC)R1 LIMIT ".$limit_param.",10";
    $result = sql_select($sql,$conn);
    

    ?>
  <div id="list">
  <h1>Board</h1>

  <?php if(isset($_SESSION["USER_ID"])){
        echo $_SESSION["USER_ID"]." 님 자신의 이야기를 써보세요!<br>";
        echo "<button onclick="."location.href='new_post.php'".">글쓰기</button>";

        echo "
        <form method='post' action='/join/logout_action.php'>
        <button type='submit' >로그아웃</button>
        </form>";

        }else{
            echo "<button onclick="."location.href='/join/login.php'".">로그인</button>";
        }
    
    ?>
    
  <table>
    <thead>
        <tr>
            <th style="width:10%">#</th>
            <th style="width:50%">title</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $i =0;
        while($row = sql_fetch_array($result)){
        $i++;
        echo "<tr onclick='move_to_post(".$pagenum.",".$row['num'].")'>
                <th>".$i."</th>
                <td>".$row['title']."</td>
            </tr>" ;
        }
        ?>
    </tbody>
  </table>
  <?php 
    // paging 로직

    $sql = "SELECT title FROM BOARD";
    $all = sql_select($sql,$conn);
    $total_post = sql_rows_count($all);
        
    $real_end_page = ceil($total_post/10);
    $end_page=ceil($pagenum/10.0)*10;
    $start_page=$end_page-9;

    if($real_end_page<$end_page){
        $end_page=$real_end_page;
    }


    $prev = $start_page>1;
    $next = $end_page<$real_end_page;

    echo "<div id='page_marker'>" ;
    
    if($prev){
        $pre_block=$start_page-1;
        echo "<li><button onclick='paging(".$pre_block.")'>PRE</button></li>";
    }

    for($i=$start_page; $i<=$end_page; $i++){
        if($pagenum==$i){
            echo "<li style='font-weight:bold' onclick='paging(".$pagenum.",".$i.")'>".$i."</li>";
        }else{
            echo "<li onclick='paging(".$i.")'>".$i."</li>";
        }
        
    }

    if($next){
        $next_block=$end_page+1;
        echo "<li><button onclick='paging(".$next_block.")'>NEXT</button></li>";
    }

    echo "</div>";
  ?>
  <script type="text/javascript" src="/js/board_paging.js"></script>
  </div>

 </body>
</html>