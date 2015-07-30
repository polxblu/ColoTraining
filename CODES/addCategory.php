<?php
if( empty($_POST['typeN']) || empty($_POST['name'])  || ( $_POST['typeN']!==$liste['type']['idc'][0] && empty($_POST['whoN'])) ){
    $var['er']=$testo['errors']['emptyField'];    
}else{    
    if($_POST['typeN']==$liste['type']['idc'][0]){
        $mainDB->setColWh(array('who'));
        $mainDB->setValWh(array($_POST['whoN']));
        $res=$dataDB->select('category');
    }else $res['id']='';
    
    if(empty($res['id'])){
        $var['newID']='cate'.time();
        $mainDB->setColDt(array('id','type','who'));
        $mainDB->setValDt(array($var['newID'],$_POST['typeN'],$_POST['whoN']));
        $mainDB->insert('category');

        for ($i=0;$i<$testo['str']['num'];$i++){
            $txtDB->setColDt(array('languages','pages','sections','rifTxt','txt'));
            $txtDB->setValDt(array($testo['str']['id'][$i],'category','commonTxt',$var['newID'],txaTOdb($_POST['name'],true)));
            $txtDB->insert('txtWeb');
        }
        Redieasy('index.php?token='.$_GET['token']);
    }else $var['er']=$testo['errors']['catAlreadySel'];

}
?>
