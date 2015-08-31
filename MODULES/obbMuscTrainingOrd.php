<?php

        $dataDB->forceList();
        $dataDB->setColWh(array('type'));
        $dataDB->setValWh(array($_POST['type']));
        $dataDB->setColOr(array('ord'));
        $res=$dataDB->select('obbTypeTraining');

include_once '../CLASSANDFUNC/obbMuscOrdJS.php';

echo '
<form action="index.php?token='.$_GET['token'].'" accept-charset="utf-8" method="post" name="modORD" id="modORD">
<table width="900" border="0" cellspacing="5" cellpadding="2" style="margin-left:auto; margin-right:auto; text-align:center; font-size:16px;">
<tr>
  <td style="text-align:center:">
       <input name="round" type="hidden" value="ja"/>
       <input name="type" type="hidden" value="'.$_POST['type'].'"/>
       <input name="token" type="hidden" value="'.$_POST['token'].'"/>
       <button name="ACT" type="submit" value="'.$testo['buttons']['ordObbMuscle'].'">
         '.$testo['buttons']['ordObbMuscle'].'
       </button>

  </td>
</tr>
<tr>
  <td style="text-align:center;">
';
for ($i=0;$i<$res['num'];$i++){
    echo'
        <div id="div'.$res['id'][$i].'" name="div'.$res['id'][$i].'" style="position:relative; top:0px; height:'.$kar['divHight'].'">
       
        <div style="float:left; text-align:right; width:300px;">
            &nbsp;    
        </div><ins></ins>
        <div style="float:left; border:1px solid black; text-align:center; width:200px;">
                ';
   			    for ($f=0;$f<$liste['videoMuscleGroup']['num'];$f++){
	   			    if($res['value'][$i]==$liste['videoMuscleGroup']['idc'][$f])echo $liste['videoMuscleGroup']['name'][$f];
   			    }
                
                echo '        
        </div>
        <div style="float:left; border:1px solid black; text-align:center; width:100px;">
   <select onchange="categoryOrd(\''.$res['id'][$i].'\');"  name="new'.$res['id'][$i].'" id="new'.$res['id'][$i].'" size="1">
            ';
        for ($j=0;$j<$res['num'];$j++){
	   	   echo '<option ';if( $j == $i )echo ' selected '; echo' value="'.$j.'">'.$j.'</option>
              ';
   		}
        echo '</select>&nbsp;
            <input name="old'.$res['id'][$i].'"  id="old'.$res['id'][$i].'" type="hidden" value="'.$i.'"/>
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