<?php 
include_once "db.php";

if (isset($_POST['voteTitle'])) {
    $Vote->save(['text'=>$_POST['voteTitle'], 'title_id'=>0, 'vote'=>0, 'sh'=>1]);
    $title_id = $Vote->find(['text'=>$_POST['voteTitle']])['id'];
}

if (isset($_POST['option'])) {
    foreach ($_POST['option'] as $option) {
        $Vote->save(['text'=>$option, 'title_id'=>$title_id, 'vote'=>0]);
    }
}

if (!empty($_FILES['voteImg']['tmp_name'])) {
    // Loop through each uploaded file
    foreach ($_FILES['voteImg']['tmp_name'] as $key => $tmpName) {
        $fileName = $_FILES['voteImg']['name'][$key];
        move_uploaded_file($tmpName, "../img/{$fileName}");
        $Vote->save(['voteImg' => $fileName, 'title_id' => $title_id]);
    }
}

to("../back.php?do=vote");
?>
