<script language="JavaScript" type="text/javascript">
<!--
var contenuto= new Array();
<?php
echo "
contenuto['sectionNumber']=".$definitions['pagesTxt']['num']."+1;
contenuto['commonTxtNum']=".$definitions['commonTxt']['num'].";
";
for ($i=0;$i<$definitions['commonTxt']['num'];$i++){
    echo "contenuto['commonTxt".$i."']='".$definitions['commonTxt']['idc'][$i]."';
";
}
for ($i=0;$i<$definitions['pagesTxt']['num'];$i++){
    echo "contenuto['".$definitions['pagesTxt']['idc'][$i]."Num']=".$definitions['menu'][$definitions['pagesTxt']['idc'][$i]]['num'].";
";
    for ($j=0;$j<$definitions['menu'][$definitions['pagesTxt']['idc'][$i]]['num'];$j++){
       echo "contenuto['".$definitions['pagesTxt']['idc'][$i].$j."']='".$definitions['menu'][$definitions['pagesTxt']['idc'][$i]]['idc'][$j]."';
";
    }

}
?>

//-->
</script>

