<?php

switch ($_POST['type']){
   case 'flag': //Cambio bandierine
      $var['dirImg']='../'.$kar['flagdir'];
      $var['table']='languages';
      $usageDB=$txtDB;
   break;

   case 'flago': //Cambio bandierine
      $var['dirImg']='../'.$kar['flagdir'];
      $var['table']='languages';
      $usageDB=$txtDB;
   break;

   default:
      //Redieasy('index.php');
   break;

}
if (isset($_POST['round'])){
    $var['img']=chkImgFile('pics');
    if ($var['img']=='ok'){
        if($_POST['picsName']!=='noPicz')unlink($var['dirImg'].$_POST['picsName']);
        /*
        $usageDB->setColWh(array($_POST['type']));
        $usageDB->setValWh(array($_FILES['pics']['name']));
        $res=$usageDB->select($var['table']);
        if (empty($res['id'])){
        */
            move_uploaded_file($_FILES['pics']['tmp_name'], $var['dirImg'].$_FILES['pics']['name']);
            $usageDB->setColWh(array('id'));
            $usageDB->setValWh(array($_POST['id']));
            $usageDB->setColDt(array($_POST['type']));
            $usageDB->setValDt(array($_FILES['pics']['name']));
            $usageDB->update($var['table']);
            Redieasy('index.php?token='.$_POST['token']);
        /*
        }else{
            unlink($_FILES['pics']['tmp_name']);
            $var['er']=$_FILES['pics']['name'].'&nbsp;'.$testo['errors']['alReadyImg']; 
        }
        */
    }else{
       switch ($var['img']){
          case '3':
             $var['er']=$_FILES['pics']['name'].'&nbsp;'.$testo['errors']['imgPLoad'];
             unlink($_FILES['pics']['tmp_name']);
          break;
          case '4':
             $var['er']=$langar['errors']['imgNoFile'];
          break;
          case 'type':
             $var['er']=$_FILES['pics']['name'].'&nbsp;'.$testo['errors']['imgType'];
             unlink($_FILES['pics']['tmp_name']);
          break;
          default:
             $var['er']=$_FILES['pics']['name'].'&nbsp;'.$testo['errors']['imgToBig'];
          break;
       }// switch
    }
}
?>
