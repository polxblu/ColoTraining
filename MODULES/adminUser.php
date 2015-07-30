<div id="newWbTxt">
<table align="center" width="800" cellpadding="0">
<?php
echo $var['er'].'<br/>';
$mainDB->setColOr(array('status'));
$array=$mainDB->select('user');
for ($i=0;$i<$array['num'];$i++){
    $mainDB->forceList();
    $mainDB->setColWh(array('who','tableF'));
    $mainDB->setValWh(array($array['id'][$i],'user'));
    $tmp=$mainDB->select('extraFields');

    for ($f=0;$f<$DBtable['user']['num'];$f++){
        for ($d=0;$d<$tmp['num'];$d++){
            if($DBtable['user']['fields'][$f]==$tmp['name'][$d])
                $extra[$tmp['name'][$d]]=$tmp['value'][$d];
        }
    }
    if($array['status'][$i]!=='boss'){
echo'
<tr>
	<td align="right" valign="bottom">
	   <form action="index.php?token='.$_GET['token'].'" method="post">
           '.$testo['common']['commUName'].'&nbsp;
           <input name="nik" type="text" value="'.$array['nik'][$i].'"/>&nbsp;
		   '.$testo['user']['admUserStatus'].'&nbsp;
		   <select name="status" id="status" size="1">
              <option></option>
              ';
   			  for ($j=1;$j<$grants['num'];$j++){
	   			 echo '<option value="'.$grants['type'][$j].'"';
                 if ($array['status'][$i]==$grants['type'][$j])echo' selected'; 
                 echo '>'.$grants['type'][$j].'</option>
              ';
              }
   			  echo '
		   </select>&nbsp;
		   '.$testo['user']['admUserAge'].'&nbsp;
		   <select name="age" id="age" size="1">
              <option></option>
              ';
              for ($j=0;$j<$kar['rangeAgeNum'];$j++){
			     echo '<option value="'.$j.'"';
                 if ($extra['age']==$j)echo' selected';
                 echo '>'.$kar['rangeAge'][$j].'</option>
              ';
              }
              echo '
		   </select><br/>
           '.$testo['common']['commName'].'&nbsp;
           <input name="name" type="text" value="'.$extra['name'].'"/>&nbsp;
           '.$testo['common']['commSurName'].'&nbsp;
           <input name="surname" type="text" value="'.$extra['surname'].'"/><br/>
           '.$testo['common']['commEmail'].'&nbsp;
           <input placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" name="email" required value="'.$array['email'][$i].'"/>&nbsp;
           <input name="id" type="hidden" value="'.$array['id'][$i].'"/>
           <button name="ACT" type="submit" value="'.$testo['buttons']['setProfile'].'">
               '.$testo['buttons']['setProfile'].'
           </button>
	   </form>
    </td>
    <td>
		<form action="index.php?token='.$_GET['token'].'" name="clrTxT" method="post">
            <input name="passwd1" id="passwd1" type="password" value="" required/><br/>
            <input name="passwd2" id="passwd2" type="password" value="" required/><br/>
            </span>
            <input name="id" type="hidden" value="'.$array['id'][$i].'"/>
            <input name="type" type="hidden" value="admin"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['chgPASSWD'].'">
               '.$testo['buttons']['chgPASSWD'].'
            </button>
		</form>
    </td>
</tr>
<tr>
	<td colspan="2" align="right" valign="bottom">
		<form action="index.php?token='.$_GET['token'].'" name="clrTxT" method="post">
            '.$testo['user']['useExpDate'].'&nbsp;'.date('d-m-Y', $extra['remTime']).'
            &nbsp;'.$testo['common']['commAdd'].'&nbsp;
            <input type="radio" value="add" name="addrem" />
            <input type="radio" value="rem" name="addrem" />
            &nbsp;'.$testo['common']['commRemove'].'&nbsp;
		    <select name="addTime" id="status" size="1">
              <option></option>
              ';
   			  for ($j=0;$j<$kar['addTimeNum'];$j++){
	   			 echo '<option value="'.$kar['addTime'][$j].'">'.$kar['addTime'][$j]/$kar['addTime'][0].'</option>
              ';
              }
   			  echo '
		    </select>&nbsp;
            '.$testo['common']['commDays'].'
            <input name="id" type="hidden" value="'.$array['id'][$i].'"/>
            <input name="remTime" type="hidden" value="'.$extra['remTime'].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['addRemTime'].'">
               '.$testo['buttons']['addRemTime'].'
            </button>
		</form>
        ';
        $uar['pag']='setGrants';toUrl();
        echo'
   		<form action="index.php?token='.$var['token'].'" name="clrTxT" method="post">
            <input name="id" type="hidden" value="'.$array['id'][$i].'"/>
            <input name="token" type="hidden" value="'.$_GET['token'].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['setGrants'].'">
               '.$testo['buttons']['setGrants'].'
            </button>
		</form>
		<form action="index.php?token='.$_GET['token'].'" name="clrTxT" method="post">
            '.$testo['common']['deleteSure'].'
            &nbsp;
            <input type="checkbox" value="delSure" id="delSure" name="delSure" />
            &nbsp;
            <input name="id" type="hidden" value="'.$array['id'][$i].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['delUser'].'">
               '.$testo['buttons']['delUser'].'
            </button>
		</form>
    </td>
</tr>
';
    }
}
?>
</table>
</div>
