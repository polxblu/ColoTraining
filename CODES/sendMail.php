<?php

$to      = $var['email'];
$subject = $testo['common']['regUserChk'];
$message = 
$testo['common']['regUserChk'].' '.$var['name'].' '.$var['surname']. "\r\n".
$testo['common']['txtMailRegIn']. "\r\n".
'<a href="http://www.'.$kar['domainName'].'/PAGES/validation.php?token='.$var['token'].'">'.$testo['common']['clikHere'].'</a>'. "\r\n".
$testo['common']['txtMailRegOut']
;
$headers = 'From: '. $kar['mailConfirm'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);


?>
