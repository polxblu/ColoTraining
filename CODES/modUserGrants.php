<?php
if(
      empty($_POST['difficult'.$_POST['cont']])
    ||empty($_POST['category'.$_POST['cont']])
    ||empty($_POST['muscleGroup'.$_POST['cont']])
){
    $var['er']=$testo['errors']['emptyField'];    
}else{    
    if(isset($_POST['free'.$_POST['cont']])) $var['yn']='yes'; else $var['yn']='no';
    $dataDB->setColWh(array('id'));
    $dataDB->setValWh(array($_POST['id']));
    $dataDB->setColDt(array('difficult','category','muscleGroup','free'));
    $dataDB->setValDt(array($_POST['difficult'.$_POST['cont']],$_POST['category'.$_POST['cont']],$_POST['muscleGroup'.$_POST['cont']],$var['yn']));
    $dataDB->update('video');
    Redieasy('index.php?token='.$_GET['token']);
} 
?>
