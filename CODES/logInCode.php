<?php

$mainDB->setTypWh(array('OR'));
$mainDB->setColWh(array('nik','email'));
$mainDB->setValWh(array($_POST['user'],$_POST['user']));
$check=$mainDB->select('user');

if (empty($check['id'])){
    $var['er']=$testo['login']['wrongUser'];
}elseif($check['passwd']!==md5($_POST['passwd'])){
    $var['er']=$testo['login']['wrongPasswd'];
}else{
    foreach($check as $key => $value){
        if (!is_int($key))$_SESSION[$key]=$check[$key];
    }
    
    for ($i=0;$i<$DBtable['user']['num'];$i++){
        $mainDB->setColWh(array('who','tableF','name'));
        $mainDB->setValWh(array($check['id'],'user',$DBtable['user']['fields'][$i]));
        $data=$mainDB->select('extraFields');
        $_SESSION[$DBtable['user']['fields'][$i]]=$data['value'];
    }    
    
    if ($check['status']!=='user'){
        $mainDB->forceList();
        $mainDB->setColWh(array('who'));
        $mainDB->setValWh(array($check['id']));
        $data=$mainDB->select('grants');
        for($i=0;$i<$data['num'];$i++){
            $_SESSION[$data['name'][$i]]=$data['value'][$i];
        }
    }
    
    if($_SESSION['checked']=='yes'){
        $uar['lang']=$check['prefLang'];
        toUrl();
        Redieasy('index.php?token='.$var['token']);
    }else{
        $uar['lang']=$var['lang'];
        $uar['message']='chkReg';
        toUrl();
        Redieasy('PAGES/redAlert.php?token='.$var['token']);
    }
    
} 
?>
