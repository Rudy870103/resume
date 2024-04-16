<?php include_once "db.php";
date_default_timezone_set('Asia/Taipei');

$date=date('Y-m-d | H:i:s');
$mes=$_POST+['date'=>$date];

$Message->save($mes);

to("../index.php?do=message");