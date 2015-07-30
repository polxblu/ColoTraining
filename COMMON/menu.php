<?php
for($i=0;$i<$definitions['menu']['home']['num'];$i++){ 
        $uar['pag']=$definitions['menu']['home']['idc'][$i];toUrl();
        echo '<li><a href="index.php?token='.$var['token'].'">'.$testo['menu'][$definitions['menu']['home']['idc'][$i]].'</a></li>
';
}
print_r($liste);
?>