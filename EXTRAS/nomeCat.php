            Dorsali&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633868"/>
            Addominali&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431612956"/>

            Bicipiti&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431852387"/>
            Bicipiti femorali&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633918"/>
            Trapezio&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633776"/>
            Deltoidi&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633881"/>
            Quadricipiti&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633795"/>
            Polpacci&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633819"/>
            Glutei&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633849"/>
            Pettorali&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431613215"/>
            Abduttori&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633976"/>
            Adduttori&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633957"/>
            Tricipiti&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633619"/>
            Defaticamento&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1438614186"/>
            Riscaldamento&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1438614175"/>
            Lombari&nbsp;:Slave Category of &nbsp;Muscolar Group
            <input name="id" type="hidden" value="cate1431633835"/>
            
            
            Workout CASA    
   <select onchange="categoryOrd('cate1432112719');"  name="newcate1432112719" id="newcate1432112719" size="1">
            Workout DIVANO    
   <select onchange="categoryOrd('cate1432112759');"  name="newcate1432112759" id="newcate1432112759" size="1">
            Workout UFFICIO    
   <select onchange="categoryOrd('cate1432112826');"  name="newcate1432112826" id="newcate1432112826" size="1">
            Workout PALESTRA    
   <select onchange="categoryOrd('cate1432112787');"  name="newcate1432112787" id="newcate1432112787" size="1">
   
   
   
   
   //*
$out=array("/","'","&deg;","°",'&agrave;');
$in=array("-","-"," "," ","a");
for ($i=0;$i<$video['num'];$i++){
    //if($video['muscleGroup'][$i]=='cate1431852387'){
    if($video['category'][$i]=='cate1432112787'){
        $robba['name'][]=str_replace($out,$in,$video['name'][$i].'.mp4');
        $robba['id'][]=$video['id'][$i];
    }
}
//$robba['name'] = array_map('strtolower', $robba['name']);
array_multisort($robba['name'], SORT_ASC, SORT_STRING,$robba['id']);
echo count($robba['id']).'<br/>';
echo '<div align="left">';
for ($i=0;$i<count($robba['id']);$i++){
    
    echo $robba['name'][$i].'<br/>';
    //echo $robba['id'][$i].' - '.$i.'<br/>';
//*
    $dataDB->setColWh(array('id'));
    $dataDB->setValWh(array($robba['id'][$i]));
    $dataDB->setColDt(array('file'));
    $dataDB->setValDt(array($robba['name'][$i]));
    $dataDB->update('video');

//*/
}
echo '</div>';
//*/

   

