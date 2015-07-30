<?php
if (empty($_POST['name'])||empty($_POST['cCode']))$var['er']=$testo['errors']['emptyField'];
else{    
    if (isset($_POST['ready']))$var['yn']='yes';else$var['yn']='no';
    $txtDB->setColWh(array('id'));
    $txtDB->setValWh(array($_POST['id']));
    $txtDB->setColDt(array('name','cCode','ready'));
    $txtDB->setValDt(array($_POST['name'],strtoupper($_POST['cCode']),$var['yn']));
    $txtDB->update('languages');

    Redieasy('index.php?token='.$_GET['token']);
} 
?>
