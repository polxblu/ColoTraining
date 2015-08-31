
<script language="JavaScript" type="text/javascript">
 <!-- 
var datiCategory= new Array();
<?php 

echo '
		var altDiv='.$kar['divHight'].';

		datiCategory[\'num\']='.$liste[$_POST['id']]['num'].';
  ';
 for ($i=0;$i<$liste[$_POST['id']]['num'];$i++){
	echo 'datiCategory['.$i.']="'.$liste[$_POST['id']]['idc'][$i].'";
    ';
}	
?>
  //-->
</script>
