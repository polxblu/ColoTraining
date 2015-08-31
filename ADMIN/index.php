<?php

//init
session_start();
header("Cache-control:private"); //IE 6 Fix
require '../CONFIG/config.php';
require '../CONFIG/site.php';
require '../CLASSANDFUNC/Db2Ar.php';
require '../CLASSANDFUNC/function.php';

//Siamo in pagina ADMIN
$var['menu']=$uar['menu']='admin';

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
if( // Array Liste
  $var['pag']=='category'
||$var['pag']=='video'
||$var['pag']=='modCategoryOrd'
||$var['pag']=='skedaTr'
||$var['pag']=='skedaDt'
||$var['pag']=='skedaAD'
)listMAKER();

if( // Array Video
  $var['pag']=='video'
)videoMAKER($var['lang']);

//Inizio codice Sito

if (isset($_POST['ACT'])){
   switch ($_POST['ACT']){

//Set maskere scheda allenamento
	  case $testo['buttons']['setMasks']:
          require('../CODES/7Masks.php');
	  break;

//Aggiunge Lingua solo x webber
	  case $testo['buttons']['addLanguages']:
          require('../CODES/addLanguages.php');
	  break;

//Modifica Lingua solo x webber
	  case $testo['buttons']['setDefLang']:
          require('../CODES/7DefLanguages.php');
	  break;

//Modifica Lingua solo x webber
	  case $testo['buttons']['modLanguages']:
          require('../CODES/modLanguages.php');
	  break;

//Elimina Lingua solo x webber
	  case $testo['buttons']['delLanguages']:
          require('../CODES/delLanguages.php');
	  break;

//Aggiungi Testo al sito
	  case $testo['buttons']['addWebTxt']:
          require('../CODES/addWebTxt.php');
	  break;

//Modifica Riferimenti Testo del sito
	  case $testo['buttons']['modRifWebTxt']:
          require('../CODES/modWebTxt.php');
	  break;

//Elimina Riferimenti e Testo dal sito
	  case $testo['buttons']['delTxtWeb']:
          require('../CODES/delWebTxt.php');
	  break;

//Modifica Immagine
	  case $testo['buttons']['chgIMG']:
          require('../CODES/chgIMG.php');
	  break;

//Modifica Password
	  case $testo['buttons']['chgPASSWD']:
          require('../CODES/chgPASSWD.php');
	  break;

//Modifica Testo
	  case $testo['buttons']['chgTXT']:
          require('../CODES/chgTXT.php');
	  break;

//Modifica File
	  case $testo['buttons']['chgFILE']:
          require('../CODES/chgFILE.php');
	  break;

// Aggiungi categoria
	  case $testo['buttons']['addCategory']:
          require('../CODES/addCategory.php');
	  break;

//Modifica Categoria
	  case $testo['buttons']['modRifCategory']:
          require('../CODES/modCategory.php');
	  break;

//Elimina Categoria
	  case $testo['buttons']['delCategory']:
          require('../CODES/delCategory.php');
	  break;

//Modifica ordine sottocategorie
	  case $testo['buttons']['modCatOrd']:
          require('../CODES/modCategoryOrd.php');
	  break;

// Aggiungi Video
	  case $testo['buttons']['addVideo']:
          require('../CODES/addVideo.php');
	  break;

//Modifica RiferiMenti Video
	  case $testo['buttons']['modRifVideo']:
          require('../CODES/modVideo.php');
	  break;

//Elimina Video
	  case $testo['buttons']['delVideo']:
          require('../CODES/delVideo.php');
	  break;

//Aggiungi Rimuovi Tempo LogIn
	  case $testo['buttons']['addRemTime']:
          require('../CODES/addRemTime.php');
	  break;

//modifica User
	  case $testo['buttons']['setProfile']:
          require('../CODES/modUser.php');
	  break;

//elimina User
	  case $testo['buttons']['delUser']:
          require('../CODES/delUser.php');
	  break;

//Modifica privilegi utente
	  case $testo['buttons']['setGrants']:
          require('../CODES/7Grants.php');
	  break;





//LogOut  DEVE ASSOLUTAMENTE ESSERE il ULTIMO
	  default:
          //sllog();
	  break;

   }
}

//Draw
if(isset($_SESSION['id'])&&$_SESSION['status']!=='user')
    include_once('loader.php');
else
    include_once ('noLog.php');

//close DB
unset($txtDB);
unset($dataDB);
unset($mainDB);

// zona dedicata al debug
if ($kar['debug']) include_once '../CLASSANDFUNC/debug.php';
// zona dedicat al debug */

?>
