<?php
include_once('../CLASSANDFUNC/categoriesJS.php');
echo '<div id="newWbTxt">';

if ($grants[$_SESSION['status']]['category']){
echo '
<table align="center" width="100%" cellpadding="0">
<tr>
	<td width="100%" align="center">
		<form action="index.php?token='.$_GET['token'].'" method="post" name="selCategoriesN" id="selCategoriesN">

<table align="center">
<tr>
	<td align="center" valign="middle">'.$testo['common']['commName'].'</td></td>
	<td align="center" valign="middle">'.$testo['category']['categoryType'].'</td>
	<td align="center" valign="middle">'.$testo['category']['categoryWho'].'</td>
	<td align="center" valign="middle">'.$var['er'].'</td>
</tr>
<tr>
	<td align="center" valign="middle"><input name="name" type="text" /></td>
	<td align="center" valign="middle">
		<select onChange="chgSelTxt(\'selCategories\',\'type\',\'who\',\'N\',\'N\');" name="typeN" id="typeN" size="1">
            <option></option>
';
   			for ($j=0;$j<$liste['type']['num'];$j++){
	   			echo '<option value="'.$liste['type']['idc'][$j].'">'.$liste['type']['idc'][$j].'</option>
                     ';
   			}
echo'
		</select>
    </td>
	<td align="center" valign="middle">
		<select name="whoN" id="whoN" size="1">
            <option></option>
		</select>
    </td>
	<td align="center" valign="middle">
            <button name="ACT" type="submit" value="'.$testo['buttons']['addCategory'].'">
               '.$testo['buttons']['addCategory'].'>
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

echo '<table align="center" width="600" cellpadding="0">';

$giro=0;
for ($i=0;$i<$liste[$liste['type']['idc'][0]]['num'];$i++){
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
    ||$grants[$_SESSION['status']]['category']){
$uar['pag']='chgText';toUrl();
echo'
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$var['token'].'" name="clrTxT" method="post">
            <span style="color:'.$var['fontColor'].'">
            '.$liste[$liste['type']['idc'][0]]['name'][$i].'&nbsp;:'.$testo['category']['categoryPrimCate'].'
            &nbsp;
            </span>
            <input name="id" type="hidden" value="'.$liste[$liste['type']['idc'][0]]['idc'][$i].'"/>
            <input name="type" type="hidden" value="category"/>
            <input name="round" type="hidden" value="yes"/>
            <input name="txt" type="hidden" value="'.$liste[$liste['type']['idc'][0]]['name'][$i].'"/>
            <input name="token" type="hidden" value="'.$_GET['token'].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['chgTXT'].'">
               '.$testo['buttons']['chgTXT'].'
            </button>
		</form>
</tr>
';
}
if ($grants[$_SESSION['status']]['webTxt']){
$uar['pag']='modCategoryOrd';toUrl();
echo'
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$var['token'].'" name="clrTxT" method="post">
            <span style="color:'.$var['fontColor'].'">
            '.$testo['category']['modOrdCategory'].'&nbsp;
            &nbsp;
            </span>
            <input name="id" type="hidden" value="'.$liste[$liste['type']['idc'][0]]['idc'][$i].'"/>
            <input name="txt" type="hidden" value="'.$liste[$liste['type']['idc'][0]]['name'][$i].'"/>
            <input name="token" type="hidden" value="'.$_GET['token'].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['modCatOrd'].'">
               '.$testo['buttons']['modCatOrd'].'
            </button>
		</form>
</tr>
';
echo'
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$_GET['token'].'" method="post" name="selCategories'.$i.'" id="selCategories'.$i.'">
		   '.$testo['category']['categoryType'].'&nbsp;
		   <select onChange="chgSelTxt(\'selCategories\',\'type\',\'who\',\''.$i.'\',\'N\');" name="type'.$i.'" id="type'.$i.'" size="1">
              <option></option>
              ';
   			  for ($j=0;$j<$liste['type']['num'];$j++){
	   			 echo '<option value="'.$liste['type']['idc'][$j].'"';
                 if ($liste['type']['idc'][0]==$liste['type']['idc'][$j])echo' selected'; 
                 echo '>'.$liste['type']['idc'][$j].'</option>
              ';
              }
   			  echo '
		   </select>
		   &nbsp;'.$testo['category']['categoryWho'].'&nbsp;
		   <select name="who'.$i.'" id="who'.$i.'" size="1">
              <option></option>
              ';
   			  for ($j=0;$j<$liste['property']['num'];$j++){
	   			 echo '<option value="'.$liste['property']['idc'][$j].'"';
                 if ($liste[$liste['type']['idc'][0]]['who'][$i]==$liste['property']['idc'][$j])echo' selected'; 
                 echo '>'.$liste['property']['idc'][$j].'</option>
              ';
              }
   			  echo '
		   </select>
		   <input name="id" type="hidden" value="'.$liste[$liste['type']['idc'][0]]['idc'][$i].'"/>
           <input name="cont" type="hidden" value="'.$i.'"/>
           <input name="main" type="hidden" value="yes"/>
           <button name="ACT" type="submit" value="'.$testo['buttons']['modRifCategory'].'">
               '.$testo['buttons']['modRifCategory'].'
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
            <input name="main" type="hidden" value="yes"/>
            <input name="id" type="hidden" value="'.$liste[$liste['type']['idc'][0]]['idc'][$i].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['delCategory'].'">
               '.$testo['buttons']['delCategory'].'
            </button>
		</form>
    </td>
</tr>
';
    for($j=0;$j<$liste[$liste[$liste['type']['idc'][0]]['idc'][$i]]['num'];$j++){
$uar['pag']='chgText';toUrl();
echo'
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$var['token'].'" name="clrTxT" method="post">
            <span style="color:'.$var['fontColor'].'">
            '.$liste[$liste[$liste['type']['idc'][0]]['idc'][$i]]['name'][$j].'&nbsp;:'.$testo['category']['categorySecCate'].'&nbsp;'.$liste[$liste['type']['idc'][0]]['name'][$i].'
            &nbsp;
            </span>
            <input name="id" type="hidden" value="'.$liste[$liste[$liste['type']['idc'][0]]['idc'][$i]]['idc'][$j].'"/>
            <input name="type" type="hidden" value="category"/>
            <input name="round" type="hidden" value="yes"/>
            <input name="txt" type="hidden" value="'.$liste[$liste[$liste['type']['idc'][0]]['idc'][$i]]['name'][$j].'"/>
            <input name="token" type="hidden" value="'.$_GET['token'].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['chgTXT'].'">
               '.$testo['buttons']['chgTXT'].'
            </button>
		</form>
</tr>
<tr>
	<td style="border-right:'.$var['cornColor'].';" align="right" valign="bottom">
		<form action="index.php?token='.$_GET['token'].'" method="post" name="selCategories'.$i.'d'.$j.'" id="selCategories'.$i.'d'.$j.'">
		   '.$testo['category']['categoryType'].'&nbsp;
		   <select onChange="chgSelTxt(\'selCategories\',\'type\',\'who\',\''.$i.'d'.$j.'\',\'N\');" name="type'.$i.'d'.$j.'" id="type'.$i.'d'.$j.'" size="1">
              <option></option>
              ';
   			  for ($s=0;$s<$liste['type']['num'];$s++){
	   			 echo '<option value="'.$liste['type']['idc'][$s].'"';
                 if ($liste['type']['idc'][1]==$liste['type']['idc'][$s])echo' selected'; 
                 echo '>'.$liste['type']['idc'][$s].'</option>
              ';
              }
   			  echo '
		   </select>
		   &nbsp;'.$testo['category']['categoryWho'].'&nbsp;
		   <select name="who'.$i.'d'.$j.'" id="who'.$i.'d'.$j.'" size="1">
              <option></option>
              ';
   			  for ($s=0;$s<$liste[$liste['type']['idc'][0]]['num'];$s++){
	   			 echo '<option value="'.$liste[$liste['type']['idc'][0]]['idc'][$s].'"';
                 if ($liste[$liste['type']['idc'][0]]['idc'][$i]==$liste[$liste['type']['idc'][0]]['idc'][$s])echo' selected'; 
                 echo '>'.$liste[$liste['type']['idc'][0]]['name'][$s].'</option>
              ';
              }
              echo'
		   </select>
		   <input name="id" type="hidden" value="'.$liste[$liste[$liste['type']['idc'][0]]['idc'][$i]]['idc'][$j].'"/>
           <input name="cont" type="hidden" value="'.$i.'d'.$j.'"/>
           <button name="ACT" type="submit" value="'.$testo['buttons']['modRifCategory'].'">
               '.$testo['buttons']['modRifCategory'].'
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
            <input name="id" type="hidden" value="'.$liste[$liste[$liste['type']['idc'][0]]['idc'][$i]]['idc'][$j].'"/>
            <button name="ACT" type="submit" value="'.$testo['buttons']['delCategory'].'">
               '.$testo['buttons']['delCategory'].'
            </button>
		</form>
    </td>
</tr>
';
    }
}
}
?>
</table>
</div>
