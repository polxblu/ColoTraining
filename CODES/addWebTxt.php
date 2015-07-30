<?php
if( empty($_POST['pagesN']) || empty($_POST['sectionsN']) || empty($_POST['txt']) || empty($_POST['rifTxt'])){
    $var['er']=$testo['errors']['emptyField'];    
}else{    
    $txtDB->setColWh(array('rifTxt'));
    $txtDB->setValWh(array($_POST['rifTxt']));
    $res=$txtDB->select('txtWeb');
    
    if(!isset($res['id'])){
        for ($i=0;$i<$testo['str']['num'];$i++){
            $txtDB->setColDt(array('languages','pages','sections','rifTxt','txt'));
            $txtDB->setValDt(array($testo['str']['id'][$i],$_POST['pagesN'],$_POST['sectionsN'],$_POST['rifTxt'],txaTOdb($_POST['txt'],true)));
            $txtDB->insert('txtWeb');
        }
        Redieasy('index.php?token='.$_GET['token']);
    }else $var['er']=$testo['errors']['rifAlreadyPresent'];
}
?>
