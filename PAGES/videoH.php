<?php
if (isset($_SESSION['name'])) $var['name']=$_SESSION['name']; else $var['name']=''; 
if (isset($_POST['filter'])) $var['filter']=$_POST['filter']; else $var['filter']=''; 
if (!isset($var['repition'])) $var['repition']=''; 

if (!isset($_POST['filter'])){
        $dataDB->setColWh(array('free'));
        $dataDB->setValWh(array('yes'));
}else{
        $dataDB->setTypWh(array('OR'));
        $dataDB->setColWh(array('muscleGroup','category'));
        $dataDB->setValWh(array($_POST['filter'],$_POST['filter']));
}
        $dataDB->forceList();
        $data=$dataDB->select('video');
        $dataDB->debug();


?>




<table id="personalinfotable" cellpadding="2" cellspacing="6" border="0">
	<tr><td colspan="2"><?php echo $testo['videoH']['welcome'].'&nbsp;<b>'.$var['name'].'</b>';?><br/><br/></td></tr>
	<tr>
    	<td width="80"><?php echo $testo['videoH']['diifSuggest'];?></td>
    	<td width="80"><?php echo $testo['videoH']['repitSugg'];?></td>
    </tr>
    <tr>
    	<td>
        
        
        <img src="IMAGES/COMMON/diff_on.png" width="30"/>
    	<img src="IMAGES/COMMON/diff_on.png" width="30"/>
        <img src="IMAGES/COMMON/diff_off.png" width="30"/>
        
        
        
         </td>
         <td><big><big><b><?php echo $var['repition'];?></b></big></big></td>
    </tr>
    <tr>
    <td colspan="2">
    <br/>
<form name="jhonny" name="id" method="post" action="index.php?token=<?php echo $_GET['token'];?>">    

    <select class="filters" name="filter" id="filter" onChange="document.jhonny.submit()">
    
              <?php
              for ($j=0;$j<$liste['videoMuscleGroup']['num'];$j++){
			     echo '<option value="'.$liste['videoMuscleGroup']['idc'][$j].'"';
                 if ($var['filter']==$liste['videoMuscleGroup']['idc'][$j])echo' selected';
                 echo '>'.$liste['videoMuscleGroup']['name'][$j].'</option>
              ';
              }
              for ($j=0;$j<$liste['videoCategory']['num'];$j++){
			     echo '<option value="'.$liste['videoCategory']['idc'][$j].'"';
                 if ($var['filter']==$liste['videoCategory']['idc'][$j])echo' selected';
                 echo '>'.$liste['videoCategory']['name'][$j].'</option>
              ';
              }
              ?>
   
    
    </select>
</form>
</td>
    </tr>
</table>


<div id="videotable">
	
              <?php
              for ($j=0;$j<$data['num'];$j++){
        $txtDB->setColWh(array('rifTxt','languages'));
        $txtDB->setValWh(array($data['id'][$j],$var['lang']));
        $array=$txtDB->select('txtData');
	     
                 echo '


    <div class="videoicon">
    	<img class="videopic" src="IMAGES/COMMON/videoicontest.jpg"> <br/>
        <big><b>'.$array['txt'].'</b></big> <br/>
        <div class="videoinfo">
        	Addominali
			<br/>
        	<img src="IMAGES/COMMON/diff_on.png" width="20"/>
    		<img src="IMAGES/COMMON/diff_on.png" width="20"/>
            <img src="IMAGES/COMMON/diff_off.png" width="20"/>
        </div>
    </div>
    
  

                 ';
              }
              ?>


</div>
