<?php
if (
       ($_POST['passwd1']!==$_POST['passwd2'])
    || (empty($_POST['passwd1']))
   )$var['er']=$testo['errors']['passwdMiss'];
else{
    $mainDB->setColWh(array('id'));
    $mainDB->setColDt(array('passwd'));
    $mainDB->setValDt(array(md5($_POST['passwd1'])));
    if ($_POST['type']=='admin'){
        $mainDB->setValWh(array($_POST['id']));
        $mainDB->update('user');
        Redieasy('index.php?token='.$_GET['token']);
    }else{  
        if($_POST['passwdOld']!==md5($_POST['passwdOldTyped'])){
            $var['er']=$testo['errors']['passwdOldMiss'];
            $mainDB->resVar();
        }else{
            $mainDB->setValWh(array($_SESSION['id']));
            $mainDB->update('user');
            $uar['lang']=$var['lang'];$uar['message']='passChange';toUrl();
            Redieasy('PAGES/redAlert.php?token='.$var['token']);
        }
         
    }
}
?>
