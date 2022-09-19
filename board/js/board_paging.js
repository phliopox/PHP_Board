function paging(i){
    location.href='/skin/board_list.php?page='+i;
}
function move_to_post(pagenum,board_id){
    location.href='/skin/post_content.php?page='+pagenum+'&num='+board_id
}
    