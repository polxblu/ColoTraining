<form action="index.php?token=<?php echo $_GET['token'];?>" method="post" name="chgText" id="chgText">
<table>
<tr>
	<td align="center">
       <?php echo $var['er'];?>
    </td>
</tr>
<tr>
	<td align="center">
       <?php echo $testo['common']['chgTXTFile'];?>
    </td>
</tr>
<tr>
	<td align="center">
<?php
       if ($var['inputTxt']=='input'){
          echo '<input name="txt" type="input" value="'.$var['txt2Mod'].'"/>';
       }
?>
    </td>
</tr>
<tr>
	<td align="center">
       <input name="id" type="hidden" value="<?php echo $_POST['id'];?>"/>
       <input name="type" type="hidden" value="<?php echo $_POST['type'];?>"/>
       <input name="token" type="hidden" value="<?php echo $_POST['token'];?>"/>
       <button name="ACT" type="submit" value="<?php echo $testo['buttons']['chgTXT'];?>">
         <?php echo $testo['buttons']['chgTXT'];?>
       </button>
    </td>
</tr>
</table>
</form>



