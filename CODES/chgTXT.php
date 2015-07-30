<?php
switch ($_POST['type']){
   case 'webTxt': //Cambio Testo Sito
      $txtDB->setColWh(array('id'));
      $txtDB->setValWh(array($_POST['id']));
      $var['inputTxt']='input';
      $var['txt2Mod']=$_POST['txt'];
      $var['table']='txtWeb';
   break;

   case 'category': //Cambio Testo Categorie
      $txtDB->setColWh(array('rifTxt','languages'));
      $txtDB->setValWh(array($_POST['id'],$var['lang']));
      $var['inputTxt']='input';
      $var['txt2Mod']=$_POST['txt'];
      $var['table']='txtWeb';
   break;

   case 'video': //Cambio Testo Video
      $txtDB->setColWh(array('rifTxt','languages'));
      $txtDB->setValWh(array($_POST['id'],$var['lang']));
      $var['inputTxt']='input';
      $var['txt2Mod']=$_POST['txt'];
      $var['table']='txtData';
   break;
}

if (!isset($_POST['round'])){
    if(!empty($_POST['txt'])){
        
        $txtDB->setColDt(array('txt'));
        $txtDB->setValDt(array(txaTOdb($_POST['txt'],true)));
        $txtDB->update($var['table']);
        Redieasy('index.php?token='.$_POST['token']);
        
    }else  $var['er']=$testo['errors']['emptyField'];
}
$txtDB->resVar(); 
        /*switch ($_POST['type']){
           case 'webTxt': //Cambio Testo Sito
                 
           break;
        }
        */
?>
