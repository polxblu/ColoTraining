<?php
if (empty($_POST['name'])||empty($_POST['cCode']))
    
    $var['newID']='lang'.time();

    $txtDB->setColDt(array('id','name','cCode'));
    $txtDB->setValDt(array($var['newID'],$_POST['name'],strtoupper($_POST['cCode'])));
    $txtDB->insert('languages');
    
    $txtDB->setColWh(array('id'));
    $txtDB->setValWh(array($testo['defaultL']));
    $array=$txtDB->select('txtWeb');
    
    for ($i=0;$i<$array['num'];$i++){
        $txtDB->setColDt(array('languages','rifTxt','pages','txt'));
        $txtDB->setValDt(array($var['newID'],$array['rifTxt'][$i],$array['pages'][$i],$array['txt'][$i]));
        $txtDB->insert('txtWeb');
    }
    
    $txtDB->setColWh(array('id'));
    $txtDB->setValWh(array($testo['defaultL']));
    $array=$txtDB->select('txt');
    
    for ($i=0;$i<$array['num'];$i++){
        $txtDB->setColDt(array('languages','rifTxt','pages','txt','type'));
        $txtDB->setValDt(array($var['newID'],$array['rifTxt'][$i],$array['pages'][$i],$array['txt'][$i],$array['type'][$i]));
        $txtDB->insert('txt');
    }
    $txtDB->debug();
    Redieasy('index.php'.$_GET['token']);

?>
