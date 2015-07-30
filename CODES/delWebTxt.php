<?php

if (isset($_POST['delSure'])){
    $txtDB->setColWh(array('rifTxt'));
    $txtDB->setValWh(array($_POST['rifTxt']));
    $txtDB->delete('txtWeb');
    Redieasy('index.php?token='.$_GET['token']);
}else $var['er']=$testo['errors']['confErase'];
?>
