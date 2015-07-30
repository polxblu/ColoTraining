<?php
// zona dedicata al debug
echo '
<div id="debug" style="z-index:999; display:block; background-color: #ffffff; position: relative; bottom:0px; left:50%;  margin-left:-450px; width: 900px; border:1px #000000 solid">
';
if (isset($_GET['token'])){
    echo '&nbsp;Token&nbsp;<font color="#ff0000">&nbsp;<=> '.$_GET['token'].'<br></font>';
    echo '&nbspDecrypted&nbsp;Token&nbsp;<font color="#ff0000">&nbsp;<=> '.$var['dToken'].'<br></font>';
}
echo'<table cellpadding="5" cellspacing="5px"><tr><td valign="top" align="left" style="border-right:1px black solid;">Variabili<br>';
foreach($var as $key => $value){
    if(($key!=='dToken')&&($key!=='token')){if(!is_array($value)){
        echo '<font color="#ff0000"> '.$key.' <=> '.$value.'<br></font>';
}}}
echo '</td><td valign="top" align="left" style="border-right:1px black solid;">2Url<br>';
foreach($uar as $key => $value){
echo '<font color="#ff0000"> '.$key.' <=> '.$value.'<br></font>';
}
echo '</td><td valign="top" align="left" style="border-right:1px black solid;">POST<br>';
foreach($_POST as $key => $value){
    if(($key!=='dToken')&&($key!=='token')){if(!is_array($value)){
        echo '<font color="#ff0000"> '.$key.' <=> '.$value.'<br></font>';
}}}
echo '</td><td valign="top" align="left">SESSION<br>';
foreach($_SESSION as $key => $value){
echo '<font color="#ff0000"> '.$key.' <=> '.$value.'<br></font>';
}
echo('</td></tr></table></div>');
// zona dedicat al debug */
?>

