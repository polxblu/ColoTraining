<form action="index.php?token=<?php echo $_GET['token'];?>" method="post" enctype="multipart/form-data" name="chgFile" id="chgFile">
<table>
<tr>
	<td align="center">
       <?php echo $var['er'];?>
    </td>
</tr>
<tr>
	<td align="center">
       <?php echo $testo['common']['chgFILEFile'].':&nbsp;'.$var['name'];?>
    </td>
</tr>
<tr>
	<td align="center">
<?php
          echo $testo['common']['chgFileName'].':&nbsp;'.$var['file'];
?>
    </td>
</tr>
<tr>
	<td align="center">
        <input type="file" name="fileIn" id="fileIn" />
    </td>
</tr>
<tr>
	<td align="center">
       <input name="id" type="hidden" value="<?php echo $_POST['id'];?>"/>
       <input name="name" type="hidden" value="<?php echo $var['name'];?>"/>
       <input name="name" type="hidden" value="<?php echo $var['file'];?>"/>
       <input name="type" type="hidden" value="<?php echo $_POST['type'];?>"/>
       <input name="token" type="hidden" value="<?php echo $_POST['token'];?>"/>
       <button name="ACT" type="submit" value="<?php echo $testo['buttons']['chgFILE'];?>">
         <?php echo $testo['buttons']['chgFILE'];?>
       </button>
    </td>
</tr>
</table>
</form>



