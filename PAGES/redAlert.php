<?php

//init
session_start();
header("Cache-control:private"); //IE 6 Fix
require '../CONFIG/config.php';
require '../CLASSANDFUNC/function.php';
require '../CLASSANDFUNC/Db2Ar.php';

$txtDB=new Db2Ar($kar['dbhostOut'],$kar['dbuser'],$kar['dbpw'],$kar['dbTXT']);

$var['dToken'] = pack("H*",$_GET['token']);
$process=explode('#',$var['dToken']);
for ($i=0;$i<count($process);$i=$i+2){
    $var[$process[$i]]=$process[$i+1];    
}

$uar=array();
$uar['lang']=$var['lang'];
toUrl();

$_SESSION=array();
session_destroy();

$txtDB->forceList();
$txtDB->setColWh(array('languages','sections','pages'));
$txtDB->setValWh(array($var['lang'],'commonTxt','messages'));
$res=$txtDB->select('txtWeb');

for($i=0;$i<$res['num'];$i++){
    $testo[$res['rifTxt'][$i]]=$res['txt'][$i];
}

if(
    $var['message']=='chkReg'
    )
    $var['redTime']=$kar['redTimeLink'];
else
    $var['redTime']=$kar['redTime'];

?>


<html>
<head>
<link href="../sevuoifareilcss.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
var countTime=<?php echo $var['redTime'];?>+1;
var count=0;

function countDown(){
    countTime--;
    document.getElementById("timeTxt").innerHTML=countTime;
    if(countTime==0){
        location.href='../index.php?token=<?php echo $var['token'];?>';
    }
    setTimeout(countDown, 1000);
}

window.onload=countDown
</script>





</head>

<body>
<?php echo $testo['AttentionRA']; ?> <br />
<?php echo $testo[$var['message']]; ?> <br />
<?php echo $testo['willRA']; ?><div id="timeTxt"><?php echo $kar['redTime']; ?></div><?php echo $testo['secRA']; ?><br />

<?php echo $testo['ifnoRA']; ?> <br />
<a href='../index.php?token=<?php echo $var['token'];?>'><?php echo $testo['clickRA']; ?></a>


</body>
</html>

<?php unset($txtDB);



