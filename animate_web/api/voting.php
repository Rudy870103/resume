<?php include_once 'db.php';

if(isset($_POST['opt'])){
    $opt=$Vote->find($_POST['opt']);
    $opt['vote']++;
    $Vote->save($opt);
    $title_id=$Vote->find($opt['title_id']);
    $title_id['vote']++;
    $Vote->save($title_id);
    to("../index.php?do=result&id={$title_id['id']}");
}else{
to("../index.php?do=vote");

}
