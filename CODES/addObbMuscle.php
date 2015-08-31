<?php
        $dataDB->setColDt(array('type','value'));
        $dataDB->setValDt(array($_POST['type'],$_POST['value']));
        $dataDB->insert('obbTypeTraining');

        Redieasy('index.php?token='.$_GET['token']);
?>
