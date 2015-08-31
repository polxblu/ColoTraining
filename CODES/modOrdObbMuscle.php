<?php

if ( isset($_POST['round']) ){
    $dataDB->forceList();
    $dataDB->setColWh(array('type'));
    $dataDB->setValWh(array($_POST['type']));
    $dataDB->setColOr(array('ord'));
    $res=$dataDB->select('obbTypeTraining');
    
    
    for ($i=0;$i<$res['num'];$i++){

        $dataDB->setColWh(array('id'));
        $dataDB->setValWh(array($res['id'][$i]));
        $dataDB->setColDt(array('ord'));
        $dataDB->setValDt(array($_POST['new'.$res['id'][$i]]));
        $dataDB->update('obbTypeTraining');

    }
    Redieasy('index.php?token='.$_POST['token']);

}
?>