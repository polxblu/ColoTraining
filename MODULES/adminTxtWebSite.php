<?php 

include_once('../CLASSANDFUNC/txtWebSiteJS.php');
echo '<div id="newWbTxt">';
if ($grants[$_SESSION['status']]['webTxt']){
echo '
<table align="center" width="100%" cellpadding="0">
<tr>
	<td width="100%" align="center">
		<form action="index.php?token='.$_GET['token'].'" method="post" name="selSectionsN" id="selSectionsN">

<table align="center">
<tr>
	<td align="center" valign="middle">'.$testo['webTxt']['wTxtSections'].'</td></td>
	<td align="center" valign="middle">'.$testo['webTxt']['wTxtPage'].'</td>
	<td align="center" valign="middle">'.$testo['webTxt']['textReference'].'</td>
	<td align="center" valign="middle">'.$testo['common']['commText'].'</td>
	<td align="center" valign="middle">'.$var['er'].'</td>
</tr>
<tr>
	<td align="center" valign="middle">
		<select onChange="chgSelTxt(\'selSections\',\'sections\',\'pages\',\'N\',\'\');" name="sectionsN" id="sectionsN" size="1">
            <option></option>
            <option value="commonTxt">commonTxt</option>
';
   			for ($j=0;$j<$definitions['pagesTxt']['num'];$j++){
	   			echo '<option value="'.$definitions['pagesTxt']['idc'][$j].'">'.$definitions['pagesTxt']['idc'][$j].'</option>
                     ';
   			}
echo '
		</select>
    </td>
	<td align="center" valign="middle">
		<select name="pagesN" id="pagesN" size="1">
            <option></option>
		</select>
    </td>
	<td align="center" valign="middle"><input name="rifTxt" type="text" /></td>
	<td align="center" valign="middle"><input name="txt" type="text" /></td>
	<td align="center" valign="middle">
            <button name="ACT" type="submit" value="'.$testo['buttons']['addWebTxt'].'">
               '.$testo['buttons']['addWebTxt'].'
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


$txtDB->setColWh(array('languages'));
$txtDB->setValWh(array($var['lang']));
$txtDB->setColOr(array('sections','pages','txt'));
$array=$txtDB->select('txtWeb');

$giro=0;
for ($i=0;$i<$array['num'];$i++){
if($giro==10)$giro=0;
if (is_int($i/2)){
   $var['cornColor']='2px dashed #FF00FF';
   $var['fontColor']='#00'.$giro.'FF0';
}else{
   $var['cornColor']='2px dashed #FFFF00';
   $var['fontColor']='#F0'.$giro.'F00';
}
$giro++;
$uar['pag']='chgText';toUrl();
echo'<table align="center" width="600" cellpadding="0">';

if (  ($grants[$_SESSION['status']]['testo'] && $_SESSION[$var['lang']]=='yes')
    ||$grants[$_SESSION['status']]['webTxt']){
echo'
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$var['token'].'" name="clrTxT" method="post">
            <span style="color:'.$var['fontColor'].'">
            '.$array['txt'][$i].'
            &nbsp;
            </span>
            <input name="id" type="hidden" value="'.$array['id'][$i].'"/>
            <input name="type" type="hidden" value="webTxt"/>
            <input name="round" type="hidden" value="yes"/>
            <input name="txt" type="hidden" value="'.$array['txt'][$i].'"/>
            <input name="token" type="hidden" value="'.$_GET['token'].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['chgTXT'].'">
               '.$testo['buttons']['chgTXT'].'
            </button>
		</form>
</tr>
';
}
if ($grants[$_SESSION['status']]['webTxt']){
echo'
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$_GET['token'].'" method="post" name="selSections'.$i.'" id="selSections'.$i.'">
		   '.$testo['webTxt']['wTxtSections'].'&nbsp;
		   <select onChange="chgSelTxt(\'selSections\',\'sections\',\'pages\',\''.$i.'\',\'\');" name="sections'.$i.'" id="sections'.$i.'" size="1">
              <option></option>
   			  <option value="commonTxt" ';if ($array['sections'][$i]=='commonTxt')echo' selected '; echo '>commonTxt</option>
              ';
   			  for ($j=0;$j<$definitions['pagesTxt']['num'];$j++){
	   			 echo '<option value="'.$definitions['pagesTxt']['idc'][$j].'"';
                 if ($array['sections'][$i]==$definitions['pagesTxt']['idc'][$j])echo' selected'; 
                 echo '>'.$definitions['pagesTxt']['idc'][$j].'</option>
              ';
              }
   			  echo '
		   </select>
		   &nbsp;'.$testo['webTxt']['wTxtPage'].'&nbsp;
		   <select name="pages'.$i.'" id="pages'.$i.'" size="1">
              <option></option>
              ';
   			  if($array['sections'][$i]=='commonTxt'){
                for ($j=0;$j<$definitions['commonTxt']['num'];$j++){
	   			  echo '<option value="'.$definitions['commonTxt']['idc'][$j].'"';
                  if ($array['pages'][$i]==$definitions['commonTxt']['idc'][$j])echo' selected';
                  echo '>'.$definitions['commonTxt']['idc'][$j].'</option>
              ';
		        }
   			  }else{
                for ($j=0;$j<$definitions['menu'][$array['sections'][$i]]['num'];$j++){
	   			  echo '<option value="'.$definitions['menu'][$array['sections'][$i]]['idc'][$j].'"';
                  if ($array['pages'][$i]==$definitions['menu'][$array['sections'][$i]]['idc'][$j])echo' selected';
                  echo '>'.$definitions['menu'][$array['sections'][$i]]['idc'][$j].'</option>
              ';
   			      }
              }
              echo '
		   </select>
		   &nbsp;'.$testo['webTxt']['textReference'].'&nbsp;
           <input name="rifTxt" type="text" value="'.$array['rifTxt'][$i].'"/>
           <input name="rifTxtOld" type="hidden" value="'.$array['rifTxt'][$i].'"/>
           <input name="id" type="hidden" value="'.$array['id'][$i].'"/>
           <input name="cont" type="hidden" value="'.$i.'"/>
           <button name="ACT" type="submit" value="'.$testo['buttons']['modRifWebTxt'].'">
               '.$testo['buttons']['modRifWebTxt'].'
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
            <input name="id" type="hidden" value="'.$array['id'][$i].'"/>
            <input name="rifTxtOld" type="hidden" value="'.$array['rifTxt'][$i].'"/>
            <input name="rifTxt" type="hidden" value="'.$array['rifTxt'][$i].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['delTxtWeb'].'">
               '.$testo['buttons']['delTxtWeb'].'
            </button>
		</form>
    </td>
</tr>
';
}
}

echo'</table></div>';
?>
