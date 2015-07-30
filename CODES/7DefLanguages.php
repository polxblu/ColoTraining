<?php
for ($i=0;$i<$testo['str']['num'];$i++){
    
    if($testo['str']['id'][$i]==$_POST['defaultL'])$input='yes'; else $input='no';
    $txtDB->setColWh(array('id'));
    $txtDB->setValWh(array($testo['str']['id'][$i]));
    $txtDB->setColDt(array('defaultL'));
    $txtDB->setValDt(array($input));
    $txtDB->update('languages');
}
Redieasy('index.php?token='.$_GET['token']);
?>
