<?php
if(isset($_POST['name']))$var['name']=$_POST['name'];else$var['name']='';
if(isset($_POST['surname']))$var['surname']=$_POST['surname'];else$var['surname']='';
if(isset($_POST['email']))$var['email']=$_POST['email'];else$var['email']='';
if(isset($_POST['email2']))$var['email2']=$_POST['email2'];else$var['email2']='';
if(isset($_POST['nik']))$var['nik']=$_POST['nik'];else$var['nik']='';
if(isset($_POST['age']))$var['age']=$_POST['age'];else$var['age']='';
if(isset($_POST['passwd1']))$var['passwd1']=$_POST['passwd1'];else$var['passwd1']='';
if(isset($_POST['passwd2']))$var['passwd2']=$_POST['passwd2'];else$var['passwd2']='';

$uar['pag']='registration';toUrl();
?>
<div>
<table align="center" width="800" cellpadding="0">
<tr>
	<td align="right" valign="bottom">
        <br />&nbsp;<br />&nbsp;<br />
	   <form action="index.php?token=<?php echo $var['token']; ?>" method="post">
           <?php echo $testo['common']['commName']; ?>&nbsp;
           <input name="name" type="text" value="<?php echo $var['name']; ?>"/><br />
           <?php echo $testo['common']['commSurName']; ?>&nbsp;
           <input name="surname" type="text" value="<?php echo $var['surname']; ?>"/><br/>
		   <?php echo $testo['common']['userAge']; ?>&nbsp;
           <select name="age" id="age" size="1">
              <option></option>
              <?php
              for ($j=0;$j<$kar['rangeAgeNum'];$j++){
			     echo '<option value="'.$j.'"';
                 if ($var['age']==$j)echo' selected';
                 echo '>'.$kar['rangeAge'][$j].'</option>
              ';
              }
              ?>
		   </select><br/>
           <?php echo $testo['common']['commUName']; ?>&nbsp;
           <input name="nik" type="text" value="<?php echo $var['nik']; ?>"/><br />
           <?php echo $testo['common']['commEmail']; ?>&nbsp;
           <input placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" name="email" required value="<?php echo $var['email']; ?>"/><br/>
           <?php echo $testo['common']['commEmailRet']; ?>&nbsp;
           <input placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" name="email2" required value="<?php echo $var['email2']; ?>"/><br/>
            <?php echo $testo['common']['passwdT']; ?>&nbsp;
            <input name="passwd1" id="passwd1" type="password" required value="" /><br/>
            <?php echo $testo['common']['passwdTR']; ?>&nbsp;
            <input name="passwd2" id="passwd2" type="password" required value="" /><br/>
            </span>
            <input name="remTime" id="remTime" type="hidden" value="<?php echo time();?>" /><br/>
            <button name="ACT" type="submit" value="<?php echo $testo['buttons']['register']; ?>">
               <?php echo $testo['buttons']['register']; ?>
            </button>
	   </form>
       <br /><?php echo $var['er']; ?><br />

    </td>
</tr>
';
    }
}
?>
</table>
</div>
