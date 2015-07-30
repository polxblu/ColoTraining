<?php ?>
<div id="ModLang">
<table align="center" width="100%" cellpadding="0">
<tr>
	<td width="100%" align="center">
		<form action="index.php?token=<?php echo $_GET['token'];?>" method="post">
<table align="center">
<tr>
	<td align="center" valign="middle">Nome</td></td>
	<td align="center" valign="middle">Country Code</td>
	<td align="center" valign="middle"><?php echo $var['er']; ?></td>
</tr>
<tr>
	<td align="center" valign="middle">
        <input name="nome" type="text" />
    </td>
	<td align="center" valign="middle">
        <input name="cCode" type="text" maxlength="2" />
    </td>
	<td align="center" valign="middle">
            <button name="ACT" type="submit" value="<?php echo $testo['buttons']['addLanguages'];?>">
               <?php echo $testo['buttons']['addLanguages'];?>
            </button>
    </td>
</tr>
</table>
</form>
    </td>
</tr>
</table>
</div>

<br />

<form action="index.php?token=<?php echo $_GET['token'];?>" method="post">
<?php
$def=$txtDB->select('languages');

for ($i=0;$i<$def['num'];$i++){
    echo '<input type="radio" value="'.$def['id'][$i].'" ';if ($def['defaultL'][$i]=='yes')echo 'checked="checked"';echo' name="defaultL" />'.$def['name'][$i].'<br/>';
}
?>
            <button name="ACT" type="submit" value="<?php echo $testo['buttons']['setDefLang'];?>">
               <?php echo $testo['buttons']['setDefLang'];?>
            </button>
</form>

<br />


<table>
<tr>
    <?php
    if ($DBtable['languages']['flag']){
	echo '<td>Flag</td>';
    }
    if ($DBtable['languages']['flago']){
	echo '<td>Flag Over</td>';
    }
    ?>
	<td>Name</td>
    <?php
    if ($DBtable['languages']['cCode']){
	echo '<td>Codice Paese</td>';
    }
    ?>
	<td>Ready?</td>
	<td><?php echo $var['er']; ?></td>
</tr>
<?php
for ($i=0;$i<$def['num'];$i++){
    if ($DBtable['languages']['flag']){
    $uar['pag']='chgImage';toUrl();
    echo '
<form action="index.php?token='.$var['token'].'" method="post" enctype="multipart/form-data">
<tr>
	<td>
    ';
    if($def['flag'][$i]=='noPicz') echo 'NoPics';
    else echo '<img src="../'.$kar['flagdir'].$def['flag'][$i].'" />';
    echo'
    <br/>
            <input type="hidden" name="id" value="'.$def['id'][$i].'" />
            <input type="hidden" name="type" value="flag" />
            <input type="hidden" name="token" value="'.$_GET['token'].'" />
            <input type="hidden" name="picsName" value="'.$def['flag'][$i].'" />
            <button name="ACT" type="submit" value="'.$testo['buttons']['chgIMG'].'">
               '.$testo['buttons']['chgIMG'].'
            </button>
    </td>
</form>
    ';
    }
    if ($DBtable['languages']['flago']){
    $uar['pag']='chgImage';toUrl();
    echo'
<form action="index.php?token='.$var['token'].'" method="post">
	<td>
    ';
    if($def['flago'][$i]=='noPicz') echo 'NoPics';
    else echo '<img src="../'.$kar['flagdir'].$def['flago'][$i].'" />';
    echo'
    <br/>
            <input type="hidden" name="id" value="'.$def['id'][$i].'" />
            <input type="hidden" name="type" value="flago" />
            <input type="hidden" name="token" value="'.$_GET['token'].'" />
            <input type="hidden" name="picsName" value="'.$def['flago'][$i].'" />
            <button name="ACT" type="submit" value="'.$testo['buttons']['chgIMG'].'">
               '.$testo['buttons']['chgIMG'].'
            </button>
    </td>
</form>
    ';
    }
echo'
<form action="index.php?token='.$_GET['token'].'" method="post">
	<td>
    <input name="name" value="'.$def['name'][$i].'" type="text" />
    </td>
';
if ($DBtable['languages']['cCode']){
echo'
    <td>
    <input name="cCode" value="'.$def['cCode'][$i].'" type="text" maxlength="2" />
    </td>
';
}
echo'
    <td>
    <input type="checkbox" name="ready" value="yes"';if ($def['ready'][$i]=='yes')echo 'checked="checked"'; echo ' />
    </td>
	<td>
            <input type="hidden" name="id" value="'.$def['id'][$i].'" />
            <button name="ACT" type="submit" value="'.$testo['buttons']['modLanguages'].'">
               '.$testo['buttons']['modLanguages'].'
            </button><br/>
';
if ($def['defaultL'][$i]=='no')
echo'
            <input type="hidden" name="flag" value="'.$def['flag'][$i].'" />
            <input type="hidden" name="flago" value="'.$def['flago'][$i].'" />
            <input type="checkbox" name="delSure" value="yes" />Sicuro?
            <button name="ACT" type="submit" value="'.$testo['buttons']['delLanguages'].'">
               '.$testo['buttons']['delLanguages'].'
            </button>
';
echo'
    </td>
</tr>
</form>
    ';
}

?>

</table>
