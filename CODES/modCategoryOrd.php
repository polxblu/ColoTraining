<?php

if ( isset($_POST['round']) ){

    for ($i=0;$i<$liste[$_POST['id']]['num'];$i++){

        $mainDB->setColWh(array('id'));
        $mainDB->setValWh(array($liste[$_POST['id']]['idc'][$i]));
        $mainDB->setColDt(array('ord'));
        $mainDB->setValDt(array($_POST['new'.$liste[$_POST['id']]['idc'][$i]]));
        $mainDB->update('category');

    }
    Redieasy('index.php?token='.$_POST['token']);

}
?>