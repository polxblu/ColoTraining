<table align="center" cellpadding="0" cellspacing="4" border="1px solid black">
<tr>
	<td>Training</td>
	<td>Numero Ripetizioni</td>
	<td>Numero Esercizi per muscolo</td>
	<td>Numero Esercizi Aff/Deaff</td>
	<td>Tempo Recupero</td>
	<td>&nbsp;</td>
</tr>
<?php
    for($i=0;$i<$liste['typeTraining']['num'];$i++){
        $dataDB->setColWh(array('who'));
        $dataDB->setValWh(array($liste['typeTraining']['idc'][$i]));
        $res=$dataDB->select('dataTypeTraining');
        if(empty($res['id'])){
            $res['nRip']=$res['nSer']=$res['nAff']=$res['tRec']='';
            $new='yes';
        }else $new='no';
        echo '
        <form action="index.php?token='.$_GET['token'].'" name="clrTxT" method="post">
<tr>
	<td>'.$liste['typeTraining']['name'][$i].'</td>
	<td><input name="nRip" size="3" type="text" value="'.$res['nRip'].'"/></td>
	<td><input name="nSer" size="3" type="text" value="'.$res['nSer'].'"/></td>
	<td><input name="nAff" size="3" type="text" value="'.$res['nAff'].'"/></td>
	<td><input name="tRec" size="3" type="text" value="'.$res['tRec'].'"/></td>
	<td>
        <input name="id" type="hidden" value="'.$liste['typeTraining']['idc'][$i].'"/>
        <input name="new" type="hidden" value="'.$new.'"/>
        <button name="ACT" type="submit" value="'.$testo['buttons']['modDatiTra'].'">
            '.$testo['buttons']['modDatiTra'].'
        </button>
    </td>
</tr>
        </form>
        ';
        
    }    
?>
</table>
