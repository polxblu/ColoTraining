<?php
if(empty($_POST['addTime'])) $var['er']=$testo['errors']['emptyFields'];
else{
    if($_POST['remTime']<time())$var['inT']=time();
    else $var['inT']=$_POST['remTime'];

    if($_POST['addrem']=='add') $var['inT']=$var['inT']+$_POST['addTime'];
    else $var['inT']=$var['inT']-$_POST['addTime'];

    $mainDB->setColWh(array('who','tableF','name'));
    $mainDB->setValWh(array($_POST['id'],'user','remTime'));
    $mainDB->setColDt(array('value'));
    $mainDB->setValDt(array($var['inT']));
    $mainDB->update('extraFields');
}
?>
