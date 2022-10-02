<?php
// 파일명 수정
rename('data/'.$_POST['old_title'], 'data/'.$_POST['title']);
// 파일 내용 수정
file_put_contents('data/'.$_POST['title'], $_POST['description']);
// Location 정보 업데이트
header('Location: /index.php?id='.$_POST['title']);
?>