<script language="JavaScript" type="text/javascript">
<!--
var contenuto= new Array();
<?php
echo "
contenuto['typeNum']=".$liste['type']['num'].";
contenuto['".$liste['type']['idc'][0]."Num']=".$liste['property']['num'].";
contenuto['".$liste['type']['idc'][1]."Num']=".$liste[$liste['type']['idc'][0]]['num'].";
";
for ($i=0;$i<$liste['property']['num'];$i++){
    echo "
contenuto['".$liste['type']['idc'][0].$i."']='".$liste['property']['idc'][$i]."';
contenuto['N".$liste['type']['idc'][0].$i."']='".$liste['property']['idc'][$i]."';
";
}
for ($i=0;$i<$liste[$liste['type']['idc'][0]]['num'];$i++){
    echo "
contenuto['".$liste['type']['idc'][1].$i."']='".$liste[$liste['type']['idc'][0]]['idc'][$i]."';
contenuto['N".$liste['type']['idc'][1].$i."']='".$liste[$liste['type']['idc'][0]]['name'][$i]."';
";
}
?>

//-->
</script>

