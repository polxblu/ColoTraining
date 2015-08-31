<?php

if (isset($_POST['delSure'])){
    // Testo Sito
    $txtDB->setColWh(array('rifTxt'));
    $txtDB->setValWh(array($_POST['id']));
    $txtDB->delete('txtWeb');
    //Categoria
    $mainDB->setColWh(array('id'));
    $mainDB->setValWh(array($_POST['id']));
    $mainDB->delete('category');
    //Maskera in caso muscolo    
    $dataDB->setColWh(array('muscle'));
    $dataDB->setValWh(array($_POST['id']));
    $dataDB->delete('sheetMask');
    //Maskera in caso tipo di allenamente    
    $dataDB->setColWh(array('training'));
    $dataDB->setValWh(array($_POST['id']));
    $dataDB->delete('sheetMask');
    // dati aggiuntivi allenamento   
    $dataDB->setColWh(array('who'));
    $dataDB->setValWh(array($_POST['id']));
    $dataDB->delete('dataTypeTraining');
    // tipo di muscolo obbligatorio    
    $dataDB->setColWh(array('value'));
    $dataDB->setValWh(array($_POST['id']));
    $dataDB->delete('obbTypeTraining');

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
