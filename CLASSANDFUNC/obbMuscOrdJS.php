
<script language="JavaScript" type="text/javascript">
 <!-- 
var datiCategory= new Array();
<?php 

echo '
		var altDiv='.$kar['divHight'].';

		datiCategory[\'num\']='.$res['num'].';
  ';
 for ($i=0;$i<$res['num'];$i++){
	echo 'datiCategory['.$i.']="'.$res['id'][$i].'";
    ';
}	
?>
  //-->
</script>
