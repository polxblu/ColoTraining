<?php
switch ($_POST['type']){
   case 'video': //Cambio Video File
      $dataDB->setColWh(array('id'));
      $dataDB->setValWh(array($_POST['id']));
      $var['name']=$_POST['name'];
      $var['dir']='../'.$kar['videodir'];
      $var['table']='video';
   break;
}

if (!isset($_POST['round'])){
    $var['fileCK']=chkFile('fileIn',$_POST['type']);    
    if($var['fileCK']=='ok'){
        if (file_exists($var['dir'].basename( $_FILES["fileIn"]["name"]))) {
            $var['er']= $testo['errors']['fileAlreadyPR'];
            unlink($_FILES["fileIn"]["tmp_name"]);
        }else{
            move_uploaded_file($_FILES["fileIn"]["tmp_name"],$var['dir'].basename( $_FILES["fileIn"]["name"]));
            $dataDB->setColDt(array('file'));
            $dataDB->setValDt(array(basename( $_FILES["fileIn"]["name"])));
            $dataDB->update($var['table']);

            Redieasy('index.php?token='.$_POST['token']);
        }
    }else{
       switch ($var['fileCK']){
          case '3':
             $var['er']=$_FILES['fileIn']['name'].'&nbsp;'.$testo['errors']['filePLoad'];
             unlink($_FILES['fileIn']['tmp_name']);
          break;
          case '4':
             $var['er']=$testo['errors']['fileNoFile'];
          break;
          default:
             $var['er']=$_FILES['fileIn']['name'].'&nbsp;'.$testo['errors']['fileType'];
             unlink($_FILES['fileIn']['tmp_name']);
          break;
       }// switch
    }
}
$txtDB->resVar(); 
?>
