    

function edit_post(){
    let beforeTitle=$("textarea[name=title]").val();
    let beforeContent = $("textarea[name=content]").val();
    let board_id = $("input[name=board_id]").val();
    let page = $("input[name=pagenum]").val()

    let update = "";
    update +="<div id='wrap'>";
    update +="<textarea name='title' rows='1' cols='95'>" + beforeTitle + "</textarea>";
    update +="<textarea name='content' rows='30' cols='95'>" + beforeContent + "</textarea>";
    update +="<input name='board_id' value='"+ board_id +"' hidden>";
    update +="<input name='pagenum' value='"+ page +"' hidden>";
    update +="<button onclick='update()'>수정 저장하기</button></div>";

    $("#wrap").replaceWith(update);

  }

  function update(){
     let title = $("textarea[name=title]").val();
     let content = $("textarea[name=content]").val();
     let board_id = $("input[name=board_id]").val();
     let page = $("input[name=pagenum]").val()
    
     $.ajax({
      type:"POST",
      data : {"title" : title, "content" : content , "board_id" : board_id},
      url : "/edit_post.php",
      success : function(){
        location.href="/skin/post_content.php?page="+page+"&num="+board_id;
      },
      error : function(data){
        console.log(data);
      }
    });
    }

  function delete_post(){
    if(confirm("정말로 삭제하시겠습니까?")){

        let board_id = $("input[name=board_id]").val();
        let param={ "board_id" : board_id };
      $.ajax({
        type:"POST",
        data: param,
        url : "/delete_post.php",
        success : function(){
          location.href="/skin/board_list.php";
        }
    });
    }

  }