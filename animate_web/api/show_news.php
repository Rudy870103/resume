<?php include_once "db.php";

$row=$News->find($_POST['id']);
//$row['sh']=($row['sh']==1)?0:1;
  $row['sh']=($row['sh']+1)%2;
$News->save($row);