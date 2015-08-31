<?php

        $dataDB->forceList();
        $dataDB->setColWh(array('type'));
        $dataDB->setValWh(array('pre'));
        $dataDB->setColOr(array('ord'));
        $pre=$dataDB->select('obbTypeTraining');

        $dataDB->forceList();
        $dataDB->setColWh(array('type'));
        $dataDB->setValWh(array('after'));
        $dataDB->setColOr(array('ord'));
        $after=$dataDB->select('obbTypeTraining');
?>
<form action="index.php?token=<?php echo $_GET['token'];?>" accept-charset="utf-8" method="post" name="modORD" id="modORD">
<table align="center" cellpadding="4" cellspacing="0" border="1px solid black">
<tr>
	<td align="center" valign="middle">Tipo</td>
	<td align="center" valign="middle">Muscolo</td>
	<td align="center" valign="middle">&nbsp;</td>
</tr>
<tr>
	<td align="center" valign="middle">
		<select name="type" id="type" size="1">
            <option value="pre">pre</option>
            <option value="after">after</option>
		</select>
    </td>
	<td align="center" valign="middle">
		<select name="value" id="value" size="1">
<?php
   			for ($j=0;$j<$liste['videoMuscleGroup']['num'];$j++){
	   			echo '<option value="'.$liste['videoMuscleGroup']['idc'][$j].'">'.$liste['videoMuscleGroup']['name'][$j].'</option>
                     ';
   			}
?>
		</select>
    </td>
	<td align="center" valign="middle">
            <button name="ACT" type="submit" value="<?php echo $testo['buttons']['addMuscle'];?>">
               <?php echo $testo['buttons']['addMuscle'];?>
            </button>
    </td>
</tr>
</table>
</form>

<table align="center" cellpadding="4" cellspacing="0" border="1px solid black">
<tr>
	<td>&nbsp;</td>
	<td>Lista Muscoli</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>Pre</td>
	<td>

<table align="center" cellpadding="0" cellspacing="0" border="0">
<?php
   			for ($j=0;$j<$pre['num'];$j++){
                echo '
<tr>
	<td align="center" valign="middle">
        &nbsp;
                ';
   			    for ($i=0;$i<$liste['videoMuscleGroup']['num'];$i++){
	   			    if($pre['value'][$j]==$liste['videoMuscleGroup']['idc'][$i])echo $liste['videoMuscleGroup']['name'][$i];
   			    }
                
                echo '        
    </td>
	<td align="center" valign="middle">
<form action="index.php?token='.$_GET['token'].'" method="post" name="modORD" id="modORD">
            <input name="id" type="hidden" value="'.$pre['id'][$j].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['delObbMusc'].'">
               '.$testo['buttons']['delObbMusc'].'
            </button>
</form>
    </td>
</tr>
   			    ';
            }
?>
</table>
    
    </td>
	<td>
    <?php $uar['pag']='obbMuscTrainingOrd';toUrl();?>
<form action="index.php?token=<?php echo $var['token'];?>" method="post" name="modORD" id="modORD">
       <input name="type" type="hidden" value="pre"/>
       <input name="token" type="hidden" value="<?php echo $_GET['token'];?>"/>
       <button name="ACT" type="submit" value="<?php echo $testo['buttons']['ordObbMuscle'];?>">
         <?php echo $testo['buttons']['ordObbMuscle'];?>
       </button>
</form>
    </td>
</tr>
<tr>
	<td>After</td>
	<td>
    
<table align="center" cellpadding="0" cellspacing="0" border="0">
<?php
   			for ($j=0;$j<$after['num'];$j++){
                echo '
<tr>
	<td align="center" valign="middle">
        &nbsp;
                ';
   			    for ($i=0;$i<$liste['videoMuscleGroup']['num'];$i++){
	   			    if($after['value'][$j]==$liste['videoMuscleGroup']['idc'][$i])echo $liste['videoMuscleGroup']['name'][$i];
   			    }
                
                echo '        
    </td>
	<td align="center" valign="middle">
<form action="index.php?token='.$_GET['token'].'" method="post" name="modORD" id="modORD">
            <input name="id" type="hidden" value="'.$after['id'][$j].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['delObbMusc'].'">
               '.$testo['buttons']['delObbMusc'].'
            </button>
</form>
    </td>
</tr>
   			    ';
            }
?>
</table>
        
    </td>
	<td>
    <?php $uar['pag']='obbMuscTrainingOrd';toUrl();?>
<form action="index.php?token=<?php echo $var['token'];?>" method="post" name="modORD" id="modORD">
       <input name="type" type="hidden" value="after"/>
       <input name="token" type="hidden" value="<?php echo $_GET['token'];?>"/>
       <button name="ACT" type="submit" value="<?php echo $testo['buttons']['ordObbMuscle'];?>">
         <?php echo $testo['buttons']['ordObbMuscle'];?>
       </button>
</form>
    </td>
</tr>
</table>
