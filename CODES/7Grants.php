<?php

if (isset($_POST['round'])){
    for ($i=0;$i<$testo['str']['num'];$i++){
        $mainDB->setColWh(array('who','name'));
        $mainDB->setValWh(array($_POST['id'],$testo['str']['id'][$i]));
        $res=$mainDB->select('grants');
        
        if(isset($res['value'])){
            $mainDB->setColWh(array('who','name'));
            $mainDB->setValWh(array($_POST['id'],$testo['str']['id'][$i]));
            $mainDB->setColDt(array('value'));
            $mainDB->setValDt(array($_POST[$testo['str']['id'][$i]]));
            $mainDB->update('grants');
        }else{
            $mainDB->setColDt(array('who','name','value'));
            $mainDB->setValDt(array($_POST['id'],$testo['str']['id'][$i],$_POST[$testo['str']['id'][$i]]));
            $mainDB->insert('grants');
        }
    }
    Redieasy('index.php?token='.$_POST['token']);
}
?>
