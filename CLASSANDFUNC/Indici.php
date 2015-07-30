<?php
include_once 'define.php';
include_once 'class.php';

DBtoAR::$dbname=$kar['dbname'];
DBtoAR::$dbhost=$kar['dbhost'];
DBtoAR::$dbuser=$kar['dbuser'];
DBtoAR::$dbpw=$kar['dbpw'];
DBtoAR::connect();

if (isset($_POST['ACT'])){
   switch ($_POST['ACT']){
          case  'Aggiungi':
                DBtoAR::$colonne=array('word');
                DBtoAR::$valori=array($_POST['text']);
                DBtoAR::$tabella='index';
                DBtoAR::insert();
          break;
          case  'Cancella':
                DBtoAR::$dove='ID';
                DBtoAR::$valori=$_POST['ID'];
                DBtoAR::$tabella='index';
                DBtoAR::delete();
          break;
          default:
                DBtoAR::$colonne=array('id','word');
                DBtoAR::$valori=array( $_POST['ID'],$_POST['text']);
                DBtoAR::$tabella='index';
                DBtoAR::update();
          break;
   }
}

DBtoAR::$colonne=array('ID','word');
DBtoAR::$dove='';
DBtoAR::$valori='';
DBtoAR::$tabella='index';
$index=DBtoAR::select();
echo '
<div align="center">
<table border="1" width="540">
       <tr>
           <td width="40" align="center" valign="middle">ID</td>
           <td width="200" align="center">Parola</td>
           <td width="300" align="center" valign="middle">
		       <form action="Indici.php" method="post" name="Add">
    		         <input type="input" value="" name="text" />
                     <input name="ACT" type="submit" value="Aggiungi" />
               </form>
           </td>
       </tr>
';

for($i=0;$i<$index['num'];$i++){
   echo '
       <tr>
           <td width="40" align="center" valign="middle">'.$index['ID'][$i].'</td>
           <td width="100" align="center">'.$index['word'][$i].'</td>
           <td width="300" align="center" valign="middle">
		       <form action="Indici.php" method="post" name="Mod">
    		         <input name="ID" type="hidden" value="'.$index['ID'][$i].'" />
                     <input type="input" value="" name="text" />
                     <input name="ACT" type="submit" value="Modifica" />
               </form>
		       <form action="Indici.php" method="post" name="Canc">
    		         <input name="ID" type="hidden" value="'.$index['ID'][$i].'" />
                     <input name="ACT" type="submit" value="Cancella" />
               </form>
           </td>
       </tr>
       ';
}
echo '
</table>
</div>
';
DBtoAR::disConnect();

?>
