<?php
function txaTOdb($txt,$dir){
   $car = array('"','¡','¨','«','°','±','´','µ','¶','¸','»','¿','À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','Þ','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ð','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','þ','ÿ');
   $con = array('&quot;','&iexcl;','&uml;','&laquo;','&deg;','&plusmn;','&acute;','&micro;','&para;','&cedil;','&raquo;','&iquest;','&Agrave;','&Acute;','&Acirc;','&Atilde;','&Auml;','&Aring;','&AElig;','&Ccedil;','&Egrave;','&Eacute;','&Ecirc;','&Euml;','&Igrave;','&Iacute;','&Icirc;','&Iuml;','&ETH;','&Ntilde;','&Ograve;','&Oacute;','&Ocirc;','&Otilde;','&Ouml;','&Oslash;','&Ugrave;','&Uacute;','&Ucirc;','&Uuml;','&Yacute;','&ETHORN;','&szlig;','&agrave;','&aacute;','&acirc;','&atilde;','&auml;','&aring;','&aelig;','&ccedil;','&egrave;','&eacute;','&ecirc;','&euml;','&igrave;','&iacute;','&icirc;','&iuml;','&eth;','&ntilde;','&oacute;','&ograve;','&ocirc;','&otilde;','&ouml;','&oslash;','&ugrave;','&uacute;','&ucirc;','&uuml;','&yacute;','&thorn;','&yuml;');
   if ($dir){
      $txt = str_replace($car, $con, $txt);
      $txt = str_replace("'", "\'", $txt);
   }else{
      $txt = str_replace($con, $car, $txt);
   }

   return $txt;
}

function engine(){
    
    global $uar;
    global $kar;
    global $var;
    global $txtDB;
    global $dataDB;
    global $testo;
    global $liste;

    $testo['str']=$txtDB->select('languages');

    for ($i=0;$i<$testo['str']['num'];$i++){
        if ($testo['str']['defaultL'][$i]=='yes')$testo['defaultL']=$testo['str']['id'][$i];
    }

    if (isset($_GET['token'])){
        $var['dToken'] = pack("H*",$_GET['token']);
        $process=explode('#',$var['dToken']);
        for ($i=0;$i<count($process);$i=$i+2){
            $var[$process[$i]]=$process[$i+1];    
        }
        if(!isset($var['lang'])){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $var['ip'] = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $var['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $var['ip'] = $_SERVER['REMOTE_ADDR'];
            }
            $cCode=file_get_contents("http://ipinfo.io/{$var['ip']}/country");
            
            $txtDB->setColWh(array('cCode'));
            $txtDB->setValWh(array($cCode));
            $res=$txtDB->select('languages');
            
            if(empty($res['id'])){$var['lang']=$testo['defaultL'];}
            else {$var['lang']=$res['id'];}
        }
    }else{
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $var['ip'] = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $var['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $var['ip'] = $_SERVER['REMOTE_ADDR'];
        }
        $cCode=file_get_contents("http://ipinfo.io/{$var['ip']}/country");
            
        $txtDB->setColWh(array('cCode'));
        $txtDB->setValWh(array($cCode));
        $res=$txtDB->select('languages');
            
        if(empty($res['id'])){$var['lang']=$testo['defaultL'];}
        else {$var['lang']=$res['id'];}
    }
}

function listMaker(){
    
    global $testo;
    global $mainDB;
    global $liste;
    
    $mainDB->forceList();
    $mainDB->setColWh(array('type'));
    $mainDB->setValWh(array($liste['type']['idc'][0]));
    $res=$mainDB->select('category');
    
    $liste['main']['num']=$res['num'];
    for ($i=0;$i<$res['num'];$i++){
        $liste['main']['idc'][$i]=$res['id'][$i];
        $liste['main']['name'][$i]=$testo['category'][$res['id'][$i]];
        $liste['main']['who'][$i]=$res['who'][$i];
        
        $mainDB->forceList();
        $mainDB->setColWh(array('who'));
        $mainDB->setValWh(array($res['id'][$i]));
        $mainDB->setColOr(array('ord'));
        $sub=$mainDB->select('category');
        
        $liste[$res['id'][$i]]['num']=$sub['num'];
        for ($j=0;$j<$sub['num'];$j++){
            $liste[$res['id'][$i]]['idc'][$j]=$sub['id'][$j];
            $liste[$res['id'][$i]]['name'][$j]=$testo['category'][$sub['id'][$j]];
            $liste[$res['id'][$i]]['who'][$j]=$sub['who'][$j];
        }
    }
    for ($i=0;$i<$liste['property']['num'];$i++){
        for ($j=0;$j<$liste['main']['num'];$j++){
            if($liste['main']['who'][$j]==$liste['property']['idc'][$i]){
                $liste[$liste['property']['idc'][$i]]['num']=$liste[$liste['main']['idc'][$j]]['num'];
                $liste[$liste['property']['idc'][$i]]['nameMain']=$liste['main']['name'][$j];
                $liste[$liste['property']['idc'][$i]]['idcMain']=$liste['main']['idc'][$j];
                    for ($f=0;$f<$liste[$liste['property']['idc'][$i]]['num'];$f++){
                        $liste[$liste['property']['idc'][$i]]['name'][$f]=$liste[$liste['main']['idc'][$j]]['name'][$f];
                        $liste[$liste['property']['idc'][$i]]['idc'][$f]=$liste[$liste['main']['idc'][$j]]['idc'][$f];
                        $liste[$liste['property']['idc'][$i]]['who'][$f]=$liste[$liste['main']['idc'][$j]]['who'][$f];
                    }    
            }
        }
    }
}

function toUrl(){
    
    global $uar;
    global $var;
    
    $var['token']='';
    foreach ($uar as $key => $value){
        $var['token'].=$key.'#'.$value.'#';
    }
    $var['token']=bin2hex(substr($var['token'],0,-1));
    if(isset($uar['pag']))$uar['pag']=$var['pag'];
    if(isset($uar['lang']))$uar['lang']=$var['lang'];
    if(isset($uar['menu']))$uar['menu']=$var['menu'];
    
}

function langMAKER($lang,$menu,$pag){
    
    global $definitions;
    global $testo;
    global $txtDB;
    
    for ($i=0;$i<$testo['str']['num'];$i++){
        if ($testo['str']['id'][$i]==$lang){
            $row=$txtDB->listTable('languages');
            foreach($row as $key => $value){
                $testo['curent'][$value]=$testo['str'][$value][$i];
            }
        }
    }
    
    for ($j=0;$j<$definitions['commonTxt']['num'];$j++){
        $txtDB->forceList();
        $txtDB->setColWh(array('languages','pages'));
        $txtDB->setValWh(array($lang,$definitions['commonTxt']['idc'][$j]));
        $array=$txtDB->select('txtWeb');
        for ($i=0;$i<$array['num'];$i++){
            $testo[$definitions['commonTxt']['idc'][$j]][$array['rifTxt'][$i]]=$array['txt'][$i];
        }
    }

    $txtDB->forceList();
    $txtDB->setColWh(array('languages','pages','sections'));
    $txtDB->setValWh(array($lang,$pag,$menu));
    $array=$txtDB->select('txtWeb');
    for ($i=0;$i<$array['num'];$i++){
        $testo[$pag][$array['rifTxt'][$i]]=$array['txt'][$i];
    }
}

function videoMAKER($lang){
    
    global $video;
    global $txtDB;
    global $dataDB;
    
    $dataDB->forceList();
    $dataDB->setColOr(array('file'));
    $video=$dataDB->select('video');
    
    for ($i=0;$i<$video['num'];$i++){
        
        $txtDB->setColWh(array('languages','object','rifTxt'));
        $txtDB->setValWh(array($lang,'video',$video['id'][$i]));
        $array=$txtDB->select('txtData');
        
        $video['name'][$i]=$array['txt'];
    }
}


function resizeImage($img,$fold,$mx_h,$mx_w){

	global $var;

	// Recupero Altezza e larghezza
	$imgar = GetImageSize($_FILES[$img]['tmp_name']);
	$imgar['w']=$imgar[0];$imgar['h']=$imgar[1];
	$var['wratio'] = $mx_w / $imgar['w'];
	$var['hratio'] = $mx_h / $imgar['h'];

	// e setto la dimensione finale
	if( ($imgar['w'] <= $mx_w) && ($imgar['h'] <= $mx_h) ){
		$var['n_width'] = $imgar['w'];
		$var['n_height'] = $imgar['h'];
	}elseif (($var['wratio'] * $imgar['h']) < $mx_h){
		$var['n_height'] = ceil($var['wratio'] * $imgar['h']);
		$var['n_width'] = $mx_w;
	}else{
		$var['n_width'] = ceil($var['hratio'] * $imgar['w']);
		$var['n_height'] = $mx_h;
	}

	// Creazione immgine vuota con dimensioni giuste
	$var['newImg'] = imagecreatetruecolor($var['n_width'], $var['n_height']);

	//recupero della risorsa immagine da ridimensionare e settaggio della variabile di trasparenza
	switch ($imgar['mime']){
		case 'image/gif': $var['imgRes'] = imagecreatefromgif($_FILES[$img]['tmp_name']);$var['trasp']=true; break;
		case 'image/png': $var['imgRes'] = imagecreatefrompng($_FILES[$img]['tmp_name']);$var['trasp']=true;  break;
		default : $var['imgRes'] = imagecreatefromjpeg($_FILES[$img]['tmp_name']);$var['trasp']=false; break;
	}

	// Settaggio della trasparenza
	if($var['trasp']){
		imagealphablending($var['newImg'], false);
		imagesavealpha($var['newImg'],true);
		$transparent = imagecolorallocatealpha($var['newImg'], 255, 255, 255, 127);
		imagefilledrectangle($var['newImg'], 0, 0, $var['n_width'], $var['n_height'], $transparent);
	}

	//Ridimensionamento
	imagecopyresampled($var['newImg'], $var['imgRes'], 0, 0, 0, 0, $var['n_width'], $var['n_height'], $imgar['w'], $imgar['h']);

	//copia file in destinazione finale
	switch ($imgar['mime']){
		case 'image/gif': imagegif($var['newImg'],$fold.$_FILES[$img]['name']); break;
		case 'image/png': imagepng($var['newImg'],$fold.$_FILES[$img]['name'],0); break;
		default : ImageJpeg($var['newImg'],$fold.$_FILES[$img]['name'],100);  break;
	}
}

function chkImgFile($img){

global $kar;

$temp='';
if ($_FILES[$img]['error']!==0){
	$temp=$_FILES[$img]['error'];
}elseif ($_FILES[$img]['size']>$kar['upsize']){
	$temp='size';
}elseif (($_FILES[$img]['type']=='image/png')||($_FILES[$img]['type']=='image/gif')||($_FILES[$img]['type']=='image/jpeg')||($_FILES[$img]['type']=='image/pjpeg')){
    $temp='ok';
}else $temp='type';

return $temp;
}

function chkFile($file,$type){

$temp='';
if ($_FILES[$file]['error']!==0){
	$temp=$_FILES[$file]['error'];
}else{
    $temp='type';
    if ($type='video'){
        if (    $_FILES[$file]["type"] == "video/mp4" 
            ||  $_FILES[$file]["type"] == "video/mpeg" 
            ||  $_FILES[$file]["type"] == "video/avi" 
            ||  $_FILES[$file]["type"] == "video/msvideo" 
            ||  $_FILES[$file]["type"] == "video/x-msvideo" 
            ||  $_FILES[$file]["type"] == "video/ogg"){
                $temp='ok';
        }elseif($type=='common'){
            $temp='ok';
        }    
    } 
}
return $temp;
}

function sllog(){
global $var;
global $kar;
$_SESSION=array();
session_destroy();
Redirect($kar['addr'][$var['Xplat']].'index.php',false);
}


function Redirect($url,$ssl) {
       if(headers_sent()) {
            echo "<script type='text/javascript'>location.href='http";if($ssl)echo's';echo"://$url';</script>";
       } else {
            if($ssl)$tmp='s';else$tmp='';
            header("Location: http$tmp://$url");
       }
}

function Redieasy($url) {
            echo "<script type='text/javascript'>location.href='$url';</script>";
}

function RandIndex(){

         global $var;
         if ($var['idx']['gon']){

            DBtoAR::$colonne=array('ID','word');
            DBtoAR::$dove='';
            DBtoAR::$valori='';
            DBtoAR::$tabella='index';
            $var['idx']['data']=DBtoAR::select();

            $var['idx']['randK'] = range (0,($var['idx']['data']['num']-1));
            shuffle($var['idx']['randK']);
            $var['idx']['gon']=false;
         }
         if ($var['idx']['data']['num']==0){echo 'no data';}
         else{
              echo $var['idx']['data']['word'][$var['idx']['randK'][$var['idx']['round']]];
              $var['idx']['round']++;
              if ($var['idx']['round']==$var['idx']['data']['num'])  $var['idx']['round']=0;
         }
}
?>
