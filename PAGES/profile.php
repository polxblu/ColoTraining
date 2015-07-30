<link href="CONFIG/profile.css" rel="stylesheet" type="text/css">
<div id="tabella">

<table align="center" cellpadding="10" cellspacing="10">
<tr>
<form action="index.php?token=<?php echo $_GET['token']; ?>" method="post">
	<td valign="middle" class="campi">
     	<?php echo $testo['common']['proSelDL'];?>
	</td>
    <td valign="middle" class="campi">
		   <?php
           for ($i=0;$i<$testo['str']['num'];$i++){
            echo '<input type="radio" value="'.$testo['str']['id'][$i].'" ';if ($testo['str']['id'][$i]==$_SESSION['prefLang'])echo 'checked="checked"';echo' name="prefLang" />'.$testo['str']['name'][$i].'<br/>';
           }
           ?>
     </td>
</tr>
<tr>
	<td valign="middle" class="campi" colspan="2" style="text-align:center">        
           <?php echo $testo['common']['comTimeExp']; ?>:&nbsp; <?php echo date('d-m-Y',$_SESSION['remTime']); ?>
    </td>
</tr>
<tr>
	<td valign="middle" class="campi">
    	   <?php echo $testo['common']['commName']; ?>&nbsp;
	</td>
    <td valign="middle" class="campi">
           <input name="name" class="input" type="text" value="<?php echo $_SESSION['name']; ?>"/>
    </td>
</tr>

<tr>
	<td valign="middle" class="campi">
    	 <?php echo $testo['common']['commSurName']; ?>
    </td>
    <td valign="middle" class="campi">
    	 <input name="surname" class="input" type="text" value="<?php echo $_SESSION['surname']; ?>"/>
    </td>
</tr>

<tr>
	<td valign="middle" class="campi">
    	<?php echo $testo['common']['userAge']; ?>
    </td>
    <td valign="middle" class="campi">
    	<select name="age" id="age" size="1" class="input">
              <option></option>
              <?php
              for ($j=0;$j<$kar['rangeAgeNum'];$j++){
			     echo '<option value="'.$j.'"';
                 if ($_SESSION['age']==$j)echo' selected';
                 echo '>'.$kar['rangeAge'][$j].'</option>
              ';
              }
              ?>
		   </select>
    </td>
</tr>

<tr>
	<td valign="middle" class="campi">
    	<?php echo $testo['common']['commUName']; ?>
    </td>
    <td valign="middle" class="campi">
    	<input name="nik" class="input" type="text" value="<?php echo $_SESSION['nik']; ?>"/>
    </td>
</tr>

<tr>
	<td valign="middle" class="campi">
    	<?php echo $testo['common']['commEmail']; ?>
    </td>
    <td valign="middle" class="campi">
    	<input class="input" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" name="email" required value="<?php echo $_SESSION['email']; ?>"/>
    </td>
</tr>

<tr>
	<td valign="middle" class="campi">
    	<?php echo $testo['common']['commEmailRet']; ?>&nbsp;
    </td>
    <td valign="middle" class="campi">
    	<input class="input" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" name="email2" required value="<?php echo $_SESSION['email']; ?>"/>
    </td>
</tr> 

<tr>
	<td valign="middle" colspan="2" class="campi" style="text-align:center">
    	<button name="ACT" type="submit" class="botoo" value="<?php echo $testo['buttons']['setProfile']; ?>">
               <?php echo $testo['buttons']['setProfile']; ?>
           </button>
	   </form>
    </td>
</tr> 

<tr>
	<form action="index.php?token=<?php echo $_GET['token']; ?>" method="post">
	<form action="index.php?token=<?php echo $_GET['token']; ?>" name="clrTxT" method="post">
	<td valign="middle" class="campi">
        <?php echo $testo['common']['passwdOldT']; ?>
        
    </td>
    <td valign="middle" class="campi">
    	<input name="passwdOldTyped" class="input" id="passwdOldTyped" type="password" required value="" />
    </td>
</tr> 
           
 <tr>
	<td valign="middle" class="campi">
    	<?php echo $testo['common']['passwdT']; ?>
    </td>
    <td valign="middle" class="campi">
    	<input name="passwd1" id="passwd1" class="input" type="password" required value="" />
    </td>
</tr> 

<tr>
	<td valign="middle" class="campi">
    	<?php echo $testo['common']['passwdTR']; ?>
    </td>
    <td valign="middle" class="campi">
    	<input name="passwd2" id="passwd2" class="input" type="password" required value="" />
    </td>
</tr> 
<tr>
	<td valign="middle" class="campi" style="text-align:center;" colspan="2">
    	<input name="passwdOld" type="hidden" value="<?php echo $_SESSION['passwd']; ?>"/>
        <input name="type" type="hidden" value="self"/>
        <button name="ACT" type="submit" class="botoo" value="<?php echo $testo['buttons']['chgPASSWD']; ?>">
           <?php echo $testo['buttons']['chgPASSWD']; ?>
        </button>
    </td>
</tr>        
  
	   </form>
       <br /><?php echo $var['er']; ?><br />

    </td>
</tr>
</table>
</div>

<div id="peso">
<img src="IMAGES/COMMON/manu.png" />
</div>