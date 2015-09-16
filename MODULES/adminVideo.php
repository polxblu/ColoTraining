<?php
echo '<div id="newWbTxt">';
if ($grants[$_SESSION['status']]['video']){
echo '
<table align="center" width="100%" cellpadding="0">
<tr>
	<td width="100%" align="center">
		<form action="index.php?token='.$_GET['token'].'" method="post">

<table align="center">
<tr>
	<td align="center" valign="middle">'.$testo['common']['commName'].'</td></td>
	<td align="center" valign="middle">'.$testo['video']['admMuscGroup'].'</td>
	<td align="center" valign="middle">'.$testo['video']['amdDifficul'].'</td>
	<td align="center" valign="middle">'.$testo['video']['admCategoryV'].'</td>
	<td align="center" valign="middle">'.$testo['video']['admFreeVid'].'</td>
	<td align="center" valign="middle">'.$var['er'].'</td>
</tr>
<tr>
	<td align="center" valign="middle"><input name="name" type="text" /></td>

	<td align="center" valign="middle">
		<select name="muscleGroupN" id="muscleGroupN" size="1">
            <option></option>
';
   			for ($j=0;$j<$liste['videoMuscleGroup']['num'];$j++){
	   			echo '<option value="'.$liste['videoMuscleGroup']['idc'][$j].'">'.$liste['videoMuscleGroup']['name'][$j].'</option>
                     ';
   			}
echo'
		</select>
    </td>

	<td align="center" valign="middle">
		<select name="difficultN" id="difficultN" size="1">
            <option></option>
';
   			for ($j=0;$j<$liste['videoDifficult']['num'];$j++){
	   			echo '<option value="'.$liste['videoDifficult']['idc'][$j].'">'.$liste['videoDifficult']['name'][$j].'</option>
                     ';
   			}
echo'
		</select>
    </td>
	<td align="center" valign="middle">
		<select name="categoryN" id="categoryN" size="1">
            <option></option>
';
   			for ($j=0;$j<$liste['videoCategory']['num'];$j++){
	   			echo '<option value="'.$liste['videoCategory']['idc'][$j].'">'.$liste['videoCategory']['name'][$j].'</option>
                     ';
   			}
echo'
		</select>
    </td>
	<td align="center" valign="middle">
        <input type="checkbox" value="yes" name="freeN" id="freeN" />
    </td>
	<td align="center" valign="middle">
            <button name="ACT" type="submit" value="'.$testo['buttons']['addVideo'].'">
               '.$testo['buttons']['addVideo'].'
            </button>
    </td>
</tr>
</table>
		</form>
    </td>
</tr>
</table>
';
}
echo' <table align="center" width="600" cellpadding="0">';




$giro=0;
for ($i=0;$i<$video['num'];$i++){
if($giro==10)$giro=0;
if (is_int($i/2)){
   $var['cornColor']='2px dashed #FF00FF';
   $var['fontColor']='#00'.$giro.'FF0';
}else{
   $var['cornColor']='2px dashed #FFFF00';
   $var['fontColor']='#F0'.$giro.'F00';
}
$giro++;
if (  ($grants[$_SESSION['status']]['testo'] && $_SESSION[$var['lang']]=='yes')
    ||$grants[$_SESSION['status']]['video']){
$uar['pag']='chgText';toUrl();
echo'
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$var['token'].'" name="clrTxT" method="post">
            <span style="color:'.$var['fontColor'].'">
            '.$testo['common']['commName'].':&nbsp;'.$video['name'][$i].'
            &nbsp;
            </span>
            <input name="id" type="hidden" value="'.$video['id'][$i].'"/>
            <input name="type" type="hidden" value="video"/>
            <input name="round" type="hidden" value="yes"/>
            <input name="txt" type="hidden" value="'.$video['name'][$i].'"/>
            <input name="token" type="hidden" value="'.$_GET['token'].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['chgTXT'].'">
               '.$testo['buttons']['chgTXT'].'
            </button>
		</form>
</tr>
';
}

if ($grants[$_SESSION['status']]['video']){
$uar['pag']='chgFile';toUrl();
echo'
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$var['token'].'" name="clrTxT" method="post">
            <span style="color:'.$var['fontColor'].'">
            '.$testo['common']['commFile'].':&nbsp;'.$video['file'][$i].'
            &nbsp;
            </span>
            <input name="id" type="hidden" value="'.$video['id'][$i].'"/>
            <input name="type" type="hidden" value="video"/>
            <input name="round" type="hidden" value="yes"/>
            <input name="file" type="hidden" value="'.$video['file'][$i].'"/>
            <input name="name" type="hidden" value="'.$video['name'][$i].'"/>
            <input name="token" type="hidden" value="'.$_GET['token'].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['chgFILE'].'">
               '.$testo['buttons']['chgFILE'].'
            </button>
		</form>
</tr>
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$_GET['token'].'" method="post"">
		   '.$testo['video']['admMuscGroup'].'&nbsp;
		   <select name="muscleGroup'.$i.'" id="muscleGroup'.$i.'" size="1">
              <option></option>
              ';
   			for ($j=0;$j<$liste['videoMuscleGroup']['num'];$j++){
	   			 echo '<option value="'.$liste['videoMuscleGroup']['idc'][$j].'"';
                 if ($video['muscleGroup'][$i]==$liste['videoMuscleGroup']['idc'][$j])echo' selected'; 
                 echo '>'.$liste['videoMuscleGroup']['name'][$j].'</option>
              ';
              }
   			  echo '
		   </select>
		   '.$testo['video']['amdDifficul'].'&nbsp;
		   <select name="difficult'.$i.'" id="difficult'.$i.'" size="1">
              <option></option>
              ';
   			for ($j=0;$j<$liste['videoDifficult']['num'];$j++){
	   			 echo '<option value="'.$liste['videoDifficult']['idc'][$j].'"';
                 if ($video['difficult'][$i]==$liste['videoDifficult']['idc'][$j])echo' selected'; 
                 echo '>'.$liste['videoDifficult']['name'][$j].'</option>
              ';
              }
   			  echo '
		   </select>
		   '.$testo['video']['admCategoryV'].'&nbsp;
		   <select name="category'.$i.'" id="category'.$i.'" size="1">
              <option></option>
              ';
   			for ($j=0;$j<$liste['videoCategory']['num'];$j++){
	   			 echo '<option value="'.$liste['videoCategory']['idc'][$j].'"';
                 if ($video['category'][$i]==$liste['videoCategory']['idc'][$j])echo' selected'; 
                 echo '>'.$liste['videoCategory']['name'][$j].'</option>
              ';
              }
   			  echo '
		   </select>
           '.$testo['video']['admFreeVid'].'&nbsp;
           <input type="checkbox" value="yes" id="free'.$i.'" name="free'.$i.'" ';if ($video['free'][$i]=='yes')echo' checked="checked" ';echo' />
		   <input name="id" type="hidden" value="'.$video['id'][$i].'"/>
           <input name="cont" type="hidden" value="'.$i.'"/>
           <button name="ACT" type="submit" value="'.$testo['buttons']['modRifVideo'].'">
               '.$testo['buttons']['modRifVideo'].'
           </button>
		</form>
    </td>
</tr>
<tr>
	<td style="';if($i!==$array['num']-1)echo'border-bottom:'.$var['cornColor'].';';echo'border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$_GET['token'].'" name="clrTxT" method="post">
            '.$testo['common']['deleteSure'].'
            &nbsp;
            <input type="checkbox" value="delSure" id="delSure" name="delSure" />
            &nbsp;
            <input name="file" type="hidden" value="'.$video['file'][$i].'"/>
            <input name="id" type="hidden" value="'.$video['id'][$i].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['delVideo'].'">
               '.$testo['buttons']['delVideo'].'
            </button>
		</form>
    </td>
</tr>
';
}
}
echo '</table></div>';
?>
