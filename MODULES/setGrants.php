<form action="index.php?token=<?php echo $_GET['token']; ?>" name="clrTxT" method="post">
<table align="center" width="200" cellpadding="0">
<tr>
	<td width="100%" align="right" valign="middle"><?php echo $testo['common']['commName'];?></td>
	<td><?php echo $testo['common']['commYes'];?></td>
	<td><?php echo $testo['common']['commNo'];?></td>
</tr>
<?php
for ($i=0;$i<$testo['str']['num'];$i++){

    $var['yn']=false;
    $mainDB->setColWh(array('who','name'));
    $mainDB->setValWh(array($_POST['id'],$testo['str']['id'][$i]));
    $res=$mainDB->select('grants');
    if($res['value']=='yes')$var['yn']=true;

echo'
<tr>
	<td width="100%" align="right" valign="middle">'.$testo['str']['name'][$i].'</td>
	<td><input type="radio" value="yes" name="'.$testo['str']['id'][$i].'" ';
    if ($var['yn'])echo ' checked="checked" ';
    echo' /></td>
	<td><input type="radio" value="no" name="'.$testo['str']['id'][$i].'" ';
    if (!$var['yn'])echo ' checked="checked" ';
    echo' /></td>
</tr>
';
}
?>
<tr>
	<td colspan="3" align="right" valign="bottom">
        <input name="id" type="hidden" value="<?php echo $_POST['id']; ?>"/>
        <input name="round" type="hidden" value="yes"/>
        <input name="token" type="hidden" value="<?php echo $_POST['token']; ?>"/>
        <button name="ACT" type="submit" value="<?php echo $testo['buttons']['setGrants']; ?>">
            <?php echo $testo['buttons']['setGrants']; ?>
        </button>
    </td>
</tr>
</table>
</form>