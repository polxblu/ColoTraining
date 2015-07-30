<?php
for ($i=0;$i<$definitions['menu']['admin']['num'];$i++){
   if(
         !$definitions['menu']['admin']['priv'][$i]
      || $grants[$_SESSION['status']][$definitions['menu']['admin']['idc'][$i]]
     )
   {
    
     $uar['pag']=$definitions['menu']['admin']['idc'][$i];
     toUrl();
     echo'<a href="index.php?token='.$var['token'].'">'.$testo['menu']['adm'.$definitions['menu']['admin']['idc'][$i]].'</a>&nbsp;';
   } 
}
?>
