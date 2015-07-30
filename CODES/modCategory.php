<?php
if ( empty($_POST['type'.$_POST['cont']])||( $_POST['type'.$_POST['cont']]!==$liste['type']['idc'][0] && empty($_POST['who'.$_POST['cont']])) )
    $var['er']=$testo['errors']['emptyField'];
else{    
    if($_POST['id']==$_POST['who'.$_POST['cont']])$var['er']=$testo['errors']['sameSubCategory'];
    else{
        if($_POST['typeN']==$liste['type']['idc'][0]){
            $mainDB->setColWh(array('who'));
            $mainDB->setValWh(array($_POST['who'.$_POST['cont']]));
            $res=$mainDB->select('category');
        }else $res['id']='';
    
        if(empty($res['id'])){
            $mainDB->setColWh(array('id'));
            $mainDB->setValWh(array($_POST['id']));
            $mainDB->setColDt(array('type','who'));
            $mainDB->setValDt(array($_POST['type'.$_POST['cont']],$_POST['who'.$_POST['cont']]));
            $mainDB->update('category');
        
            if (isset($_POST['main'])){
                for ($i=0;$i<$liste[$_POST['id']]['num'];$i++){
                    $mainDB->setColWh(array('id'));
                    $mainDB->setValWh(array($liste[$_POST['id']]['idc'][$i]));
                    $mainDB->setColDt(array('type','who'));
                    $mainDB->setValDt(array($liste['type']['idc'][0],''));
                    $mainDB->update('category');
                }
            }
            Redieasy('index.php?token='.$_GET['token']);
        }else $var['er']=$testo['errors']['catAlreadySel'];
    }
} 
?>
