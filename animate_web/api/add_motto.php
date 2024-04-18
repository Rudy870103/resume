<?php include_once "db.php";

$motto=$_POST+['sh'=>0];

$Motto->save($motto);