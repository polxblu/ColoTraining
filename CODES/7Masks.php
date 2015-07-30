<?php
$mask='';
for($i=0;$i<28;$i++){
    if(isset($_POST['b'.$i]))
        $mask.='y';
    else
        $mask.='n';
}

if ($_POST['new']=='yes'){
    $dataDB->setColDt(array('muscle','training','mask'));
    $dataDB->setValDt(array($_POST['muscle'],$_POST['training'],$mask));
    $dataDB->insert('sheetMask');
}else{
    $dataDB->setColWh(array('muscle','training'));
    $dataDB->setValWh(array($_POST['muscle'],$_POST['training']));
    $dataDB->setColDt(array('mask'));
    $dataDB->setValDt(array($mask));
    $dataDB->update('sheetMask');
}

Redieasy('index.php?token='.$_GET['token']);
?>
