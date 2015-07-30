<?php
if(
      empty($_POST['nik'])
    ||empty($_POST['email'])
){
    $var['er']=$testo['errors']['emptyField'];
}elseif($_POST['email']!==$_POST['email2']){
    $var['er']=$testo['errors']['mailMissMatch'];      
}else{
    for($i=0;$i<$DBtable['user']['num'];$i++){
        if($DBtable['user']['modFields'][$i]){
            if($_POST[$DBtable['user']['fields'][$i]]==''){    
                $var['er']=$testo['errors']['emptyField'];    
            }
        }
    }
}
if($var['er']=='&nbsp;'){   

    $mainDB->setColWh(array('nik'));
    $mainDB->setValWh(array($_POST['nik']));
    $chk=$mainDB->select('user');
    if(!(
         $chk['id']==$_SESSION['id']
      || empty($chk['id'])
    ))$var['er']=$testo['errors']['userExist'];
    
    $mainDB->setColWh(array('email'));
    $mainDB->setValWh(array($_POST['email']));
    $chk=$mainDB->select('user');
    if(!(
         $chk['id']==$_SESSION['id']
      || empty($chk['id'])
    ))$var['er']=$testo['errors']['userMExist'];
    
    if($var['er']=='&nbsp;'){   
        $mainDB->setColWh(array('id'));
        $mainDB->setValWh(array($_SESSION['id']));
        $mainDB->setColDt(array('nik','email','prefLang'));
        $mainDB->setValDt(array($_POST['nik'],$_POST['email'],$_POST['prefLang']));
        $mainDB->update('user');
    
        for($i=0;$i<$DBtable['user']['num'];$i++){
            if($DBtable['user']['modFields'][$i]){
                $mainDB->setColWh(array('who','tableF','name'));
                $mainDB->setValWh(array($_SESSION['id'],'user',$DBtable['user']['fields'][$i]));
                $mainDB->setColDt(array('value'));
                $mainDB->setValDt(array($_POST[$DBtable['user']['fields'][$i]]));
                $mainDB->update('extraFields');
            }
        }
    
    $uar['lang']=$var['lang'];$uar['message']='profChange';toUrl();
    Redieasy('PAGES/redAlert.php?token='.$var['token']);
    }
} 
?>
