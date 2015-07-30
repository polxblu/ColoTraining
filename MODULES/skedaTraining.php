<table align="center" cellpadding="0" cellspacing="0" border="1px solid black">
<tr>
	<td>&nbsp;</td>
<?php
    for($i=0;$i<$liste['typeTraining']['num'];$i++){
        echo '<td>'.$liste['typeTraining']['name'][$i].'</td>';
        
    }    
?>
</tr>
<?php
for($j=0;$j<$liste['videoMuscleGroup']['num'];$j++){
    
echo '
<tr>
	<td>'.$liste['videoMuscleGroup']['name'][$j].'</td>
';
    
    for($i=0;$i<$liste['typeTraining']['num'];$i++){
        $dataDB->setColWh(array('muscle','training'));
        $dataDB->setValWh(array($liste['videoMuscleGroup']['idc'][$j],$liste['typeTraining']['name'][$i]));
        $res=$dataDB->select('sheetMask');
        
        if(empty($res['id'])){
            $new='yes';
            $chkData='nnnnnnnnnnnnnnnnnnnnnnnnnnnn';
        }else{
            $new='no';
            $chkData=$res['mask'];
        }
        
        echo '<td align="center">
        <form action="index.php?token='.$_GET['token'].'" name="clrTxT" method="post">
        <table>';
        $num=0;
        for($f=0;$f<7;$f++){
            echo '<tr>
            ';
            for($d=0;$d<7;$d++){
                if($f>=$d){
                    echo '<td><input type="checkbox" name="b'.$num.'" value="yes"';
                    if($chkData{$num}=='y')echo ' checked="checked" ';
                    echo '/></td>';
                    $num++;
                }
                else echo '<td></td>';
            }
            echo '</tr>
            ';
        }
        echo '</table>
        <input name="muscle" type="hidden" value="'.$liste['videoMuscleGroup']['idc'][$j].'"/>
        <input name="training" type="hidden" value="'.$liste['typeTraining']['idc'][$i].'"/>
        <input name="new" type="hidden" value="'.$new.'"/>
        <button name="ACT" type="submit" value="'.$testo['buttons']['setMasks'].'">
            '.$testo['buttons']['setMasks'].'
        </button>
        </form>
        </td>';
    }    
echo'
</tr>
';
}

?>
</table>
