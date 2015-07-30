<?php
if( empty($_POST['pages'.$_POST['cont']]) ||
    empty($_POST['sections'.$_POST['cont']]) || 
    empty($_POST['rifTxt'])){
    $var['er']=$testo['errors']['emptyField'];    
}else{    
    $txtDB->setColWh(array('pages','sections','rifTxt'));
    $txtDB->setValWh(array($_POST['pages'.$_POST['cont']],$_POST['sections'.$_POST['cont']],$_POST['rifTxt']));
    $res=$txtDB->select('txtWeb');

    if(!isset($res['id'])){
        for ($i=0;$i<$testo['str']['num'];$i++){
            
            $txtDB->setColWh(array('rifTxt','languages'));
            $txtDB->setValWh(array($_POST['rifTxtOld'],$testo['str']['id'][$i]));
            $txtDB->setColDt(array('rifTxt','pages','sections'));
            $txtDB->setValDt(array($_POST['rifTxt'],$_POST['pages'.$_POST['cont']],$_POST['sections'.$_POST['cont']]));
            $txtDB->update('txtWeb');
        }
        Redieasy('index.php?token='.$_GET['token']);
    } 
    $var['er']=$testo['errors']['rifAlreadyPresent'];
}
?>
