<li class="has-sub"><a><?php echo $testo['menu']['languages'];?></a>
<ul>
<?php
for($i=0;$i<$testo['str']['num'];$i++){
    if($testo['str']['ready'][$i]=='yes'){
        $uar['lang']=$testo['str']['id'][$i];toUrl();
        echo '<li><a href="index.php?token='.$var['token'].'">'.$testo['str']['name'][$i].'</a></li>
';
    }
}
?>
</ul>
</li>