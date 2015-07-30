<?php

if (isset($_POST['delSure'])){

    $mainDB->setColWh(array('who'));
    $mainDB->setValWh(array($_POST['id']));
    $mainDB->delete('extraFields');
        
    $mainDB->setColWh(array('who'));
    $mainDB->setValWh(array($_POST['id']));
    $mainDB->delete('grants');
        
    $mainDB->setColWh(array('id'));
    $mainDB->setValWh(array($_POST['id']));
    $mainDB->delete('user');

    Redieasy('index.php?token='.$_GET['token']);

}else $var['er']=$testo['errors']['confErase'];
?>
