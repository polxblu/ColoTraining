<?php

//init
session_start();
header("Cache-control:private"); //IE 6 Fix
require 'CONFIG/config.php';
require 'CONFIG/site.php';
require 'CLASSANDFUNC/Db2Ar.php';
require 'CLASSANDFUNC/function.php';

// init DataBase
$Wh='Out';
if($kar['noInt']){
    if(isset($uar['mysqlWh'])){
        if($uar['mysqlWh']=='Out'){
            $Wh='Out';
        }
    }
    $uar['mysqlWh']='In';
    toUrl();
    echo('<a href="index.php?token='.$var['redi'].'">In</a>&nbsp');
    $uar['mysqlWh']='Out';
    toUrl();
    echo('<a href="index.php?token='.$var['redi'].'">Out</a></BR>');
    $uar['mysqlWh']=$Wh;
}
$txtDB=new Db2Ar($kar['dbhost'.$Wh],$kar['dbuser'],$kar['dbpw'],$kar['dbTXT']);
$dataDB=new Db2Ar($kar['dbhost'.$Wh],$kar['dbuser'],$kar['dbpw'],$kar['dbDATA']);
$mainDB=new Db2Ar($kar['dbhost'.$Wh],$kar['dbuser'],$kar['dbpw'],$kar['dbMAIN']);

//SetUp
engine();

//Creazione array Testo
langMAKER($var['lang'],$var['menu'],$var['pag']);

//Creazione array di Servizio
listMAKER();

 // Array Video
//videoMAKER($var['lang']);


//Inizio codice Sito
if (isset($_POST['ACT'])){
   switch ($_POST['ACT']){

//LogIn DEVE ASSOLUTAMENTE ESSERE il PRIMO
	  case $testo['buttons']['logIn']:
          require ('CODES/logInCode.php');    
	  break;



//Registrazione
	  case $testo['buttons']['register']:
          $var['pag']='registration';
          require('CODES/regUser.php');
	  break;

//Modifica profilo
	  case $testo['buttons']['setProfile']:
          require('CODES/7Profile.php');
	  break;

//Modifica Immagine
	  case $testo['buttons']['chgIMG']:
          require('CODES/chgIMG.php');
	  break;

//Modifica Password
	  case $testo['buttons']['chgPASSWD']:
          require('CODES/chgPASSWD.php');
	  break;

//Modifica Testo
	  case $testo['buttons']['chgTXT']:
          require('CODES/chgTXT.php');
	  break;

//Modifica File
	  case $testo['buttons']['chgFILE']:
          require('CODES/chgFILE.php');
	  break;


//LogOut  DEVE ASSOLUTAMENTE ESSERE il ULTIMO
	  default:
          //sllog();
	  break;

   }
}

//draw
include_once('loader.php');

//close DB
unset($txtDB);
unset($dataDB);
unset($mainDB);

// zona dedicata al debug
if ($kar['debug']) include_once 'CLASSANDFUNC/debug.php';
// zona dedicat al debug 

?>
