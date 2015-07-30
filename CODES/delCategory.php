<?php

if (isset($_POST['delSure'])){

    $txtDB->setColWh(array('rifTxt'));
    $txtDB->setValWh(array($_POST['id']));
    $txtDB->delete('txtWeb');
    
    $mainDB->setColWh(array('id'));
    $mainDB->setValWh(array($_POST['id']));
    $mainDB->delete('category');
        
    if ( isset($_POST['main']) && $_POST['type'.$_POST['cont']]!==$liste['type']['idc'][0]){
        for ($i=0;$i<$liste[$_POST['id']]['num'];$i++){
            $mainDB->setColWh(array('id'));
            $mainDB->setValWh(array($liste[$_POST['id']]['idc'][$i]));
            $mainDB->setColDt(array('type','who'));
            $mainDB->setValDt(array($liste['type']['idc'][0],''));
            $mainDB->update('category');
        }
    }
    Redieasy('index.php?token='.$_GET['token']);

}else $var['er']=$testo['errors']['confErase'];
?>
