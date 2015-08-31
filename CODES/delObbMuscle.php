<?php

    $dataDB->setColWh(array('id'));
    $dataDB->setValWh(array($_POST['id']));
    $dataDB->delete('obbTypeTraining');

    Redieasy('index.php?token='.$_GET['token']);
?>
