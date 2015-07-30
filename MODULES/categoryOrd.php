<?php

include_once '../CLASSANDFUNC/categoryOrdJS.php';

echo '
<form action="index.php?token='.$_GET['token'].'" method="post" name="modORD" id="modORD">
<table width="900" border="0" cellspacing="5" cellpadding="2" style="margin-left:auto; margin-right:auto; text-align:center; font-size:16px;>
<tr>
    <td>'.$testo['category']['descOrdCategory'].':&nbsp;'.$_POST['txt'].'</td>
</tr>
<tr>
  <td style="text-align:center:">
       <input name="round" type="hidden" value="ja"/>
       <input name="id" type="hidden" value="'.$_POST['id'].'"/>
       <input name="token" type="hidden" value="'.$_POST['token'].'"/>
       <button name="ACT" type="submit" value="'.$testo['buttons']['modCatOrd'].'">
         '.$testo['buttons']['modCatOrd'].'
       </button>

  </td>
</tr>
<tr>
  <td style="text-align:center;">
';
for ($i=0;$i<$liste[$_POST['id']]['num'];$i++){
    echo'
        <div id="div'.$liste[$_POST['id']]['idc'][$i].'" name="div'.$liste[$_POST['id']]['idc'][$i].'" style="position:relative; top:0px; height:'.$kar['divHight'].'">
       
        <div style="float:left; text-align:right; width:300px;">
            &nbsp;    
        </div>
        <div style="float:left; border:1px solid black; text-align:center; width:200px;">
            '.$liste[$_POST['id']]['name'][$i].'    
        </div>
        <div style="float:left; border:1px solid black; text-align:center; width:100px;">
   <select onchange="categoryOrd(\''.$liste[$_POST['id']]['idc'][$i].'\');"  name="new'.$liste[$_POST['id']]['idc'][$i].'" id="new'.$liste[$_POST['id']]['idc'][$i].'" size="1">
            ';
        for ($j=0;$j<$liste[$_POST['id']]['num'];$j++){
	   	   echo '<option ';if( $j == $i )echo ' selected '; echo' value="'.$j.'">'.$j.'</option>
              ';
   		}
        echo '</select>&nbsp;
            <input name="old'.$liste[$_POST['id']]['idc'][$i].'"  id="old'.$liste[$_POST['id']]['idc'][$i].'" type="hidden" value="'.$i.'"/>
        </div>
        </div>
    ';
}
echo'
  </td>
</tr>
</table>
</form>
';

?>