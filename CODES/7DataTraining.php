<?php

if ($_POST['new']=='yes'){
    $dataDB->setColDt(array('who','nRip','nSer','nAff','tRec'));
    $dataDB->setValDt(array($_POST['id'],$_POST['nRip']$_POST['nSer']$_POST['nAff']$_POST['tRec']));
    $dataDB->insert('dataTypeTraining');
}else{
    $dataDB->setColDt(array('who'));
    $dataDB->setValDt(array($_POST['id']));
    $dataDB->setColDt(array('nRip','nSer','nAff','tRec'));
    $dataDB->setValDt(array($_POST['nRip']$_POST['nSer']$_POST['nAff']$_POST['tRec']));
    $dataDB->update('dataTypeTraining');
}

Redieasy('index.php?token='.$_GET['token']);
?>
