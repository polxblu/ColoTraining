<?php

//init
session_start();
header("Cache-control:private"); //IE 6 Fix
require '../CONFIG/config.php';
require '../CLASSANDFUNC/function.php';

$uar=array();
$uar['lang']=$_SESSION['prefLang'];
toUrl();

$_SESSION=array();
session_destroy();

Redieasy('../index.php?token='.$var['token']);
?>
