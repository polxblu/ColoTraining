<?php
if(isset($_POST['delSure'])){
    if ($_POST['flag']!=='noPicz')unlink('../'.$kar['flagdir'].$_POST['flag']);
    if ($_POST['flago']!=='noPicz')unlink('../'.$kar['flagdir'].$_POST['flago']);

    $txtDB->setColWh(array('id'));
    $txtDB->setValWh(array($_POST['id']));
    $txtDB->delete('languages');

    $txtDB->setColWh(array('id'));
    $txtDB->setValWh(array($_POST['id']));
    $txtDB->delete('txt');

    $txtDB->setColWh(array('id'));
    $txtDB->setValWh(array($_POST['id']));
    $txtDB->delete('txtWeb');

    Redieasy('index.php?token='.$_GET['token']);
}else $var['er'] = 'ERRORE';
?>
