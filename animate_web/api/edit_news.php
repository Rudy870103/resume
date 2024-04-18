<?php include_once 'db.php';

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_FILES['img']['name']}");
    $_POST['img']=$_FILES['img']['name'];
}

$news=$_POST+['sh'=>1];

$News->save($news);
to("../back.php?do=news");