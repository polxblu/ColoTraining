<?php
if(empty($_POST['difficultN'])
 ||empty($_POST['name'])
 ||(empty($_POST['categoryN']) && empty($_POST['muscleGroupN']))
 ){
    $var['er']=$testo['errors']['emptyField'];    
}else{    
    if(isset($_POST['freeN'])) $var['yn']='yes'; else $var['yn']='no';
    $var['newID']='video'.time();
    
    $dataDB->setColDt(array('id','muscleGroup','difficult','free','category'));
    $dataDB->setValDt(array($var['newID'],$_POST['muscleGroupN'],$_POST['difficultN'],$var['yn'],$_POST['categoryN']));
    $dataDB->insert('video');

    for ($i=0;$i<$testo['str']['num'];$i++){
        $txtDB->setColDt(array('languages','object','type','rifTxt','txt'));
        $txtDB->setValDt(array($testo['str']['id'][$i],'video','input',$var['newID'],txaTOdb($_POST['name'],true)));
        $txtDB->insert('txtData');
    }

    Redieasy('index.php?token='.$_GET['token']);

}
?>
