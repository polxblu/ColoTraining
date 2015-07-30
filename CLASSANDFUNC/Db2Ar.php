<?php

// Questa funzione comunica col DataBase
class Db2Ar{
    var $db=0;// Handle Database
    var $dbname='';//Nome Database
    var $query='';//Query comunicazione Database
    var $dirSel='ASC';// Alternativo DESC
    var $joinMode='INNER';// Metodo del join Default INNER
    var $distinct=false;//Se true fa un select distinct
    var $random=false;//Se true ritorno gli elementi in ordine cosuale
    var $list=false;//Se true ritorno forza array di rotorno con idndicece numerico, anche con un solo risultato 
    var $opeWh=array();//Operatori di condizione per il WHERE Default '='
    var $typWh=array();// operatori di tipo AND o OR per WHERE ignora indice 0 Default AND
    var $colWh=array();//Colonne di puntamento per WHERE
    var $valWh=array();//Valori di Ricerca per WHERE
    var $colDt=array();//colonne target per Dati tipo UPDATE o INSERT
    var $valDt=array();//valori da inserire per Dati tipo UPDATE o INSERT
    var $colOr=array();//Colonne per ORDER BY
    var $colGr=array();//Colonne per GROUP BY
  
    // Collega al DBase
    function __construct($dbhost,$dbuser,$dbpw,$dbname){

        $this->dbname=$dbname;
        $this->db = @mysql_connect($dbhost, $dbuser, $dbpw);
        if ($this->db == FALSE)
           die ("Sito in aggiornamento attendere....NoHost");
        mysql_select_db($dbname, $this->db)
           or die ("Sito in aggiornamento attendere....NoDB");
    }

    // Disconnette dal DBase
    function __desctruct(){
        mysql_close($this->db);
    }

    // Debug
    function debug(){
       $error = mysql_error();
	   echo $error.'<BR>';
       echo $this->query.'<BR>';
    }

    //Reset Variabili
    function resVar(){
  	    $this->dirSel = 'ASC';
        $this->joinMode='INNER';
        $this->list=$this->distinct = $this->random = false;
        $this->colDt=$this->valDt=$this->typWh=$this->opeWh=$this->colWh=$this->valWh=$this->colOr=$this->colGr=array();
    }
  
    function setOpeWh($in){$this->opeWh=$in;}
  
    function setJoinMode($in){$this->joinMode=$in;}
  
    function setTypWh($in){$this->typWh=$in;}

    function setColWh($in){$this->colWh=$in;}
  
    function setValWh($in){$this->valWh=$in;}

    function setColDt($in){$this->colDt=$in;}
  
    function setValDt($in){$this->valDt=$in;}
  
    function setColOr($in){$this->colOr=$in;}
  
    function setcolGr($in){$this->colGr=$in;}
  
    function setdirSel($in){$this->dirSel=$in;}

    function setDistinct($in){$this->distinct=$in;}
  
    function forceList(){$this->list=true;}
  
    function listTable($table){
        $temp = mysql_list_fields($this->dbname, $table, $this->db);
        $num = mysql_num_fields($temp);

        for ($i = 0; $i < $num; $i++) {
            $res[$i]=mysql_field_name($temp, $i);
        }
        return $res;
    }
    
    function buildWhere(){
        $typ=" WHERE ";
	foreach ($this->colWh as $key => $value){
            if (isset($this->opeWh[$key])) {
                $ope = $this->opeWh[$key];
            } else {
                $ope = '=';
            }
            $this->query .= ($typ.$value.$ope."'".$this->valWh[$key]."'");
            if (isset($this->typWh[$key])) {
                $typ = ' ' . $this->typWh[$key] . ' ';
            } else {
                $typ = ' AND ';
            }
        }
    }
  
    
    /* Metodo delete
        $opeWh;//Operatori di condizione per il WHERE se non Dichiarato Default '=' (array)
        $typWh=array();// operatori di tipo AND o OR per WHERE ignora indice 0 Default AND (array)(opzionale)
        $colWh;//Colonne di puntamento per WHERE (array)
        $valWh;//Valori di Ricerca per Where (array)
        $tabIn;//tabaella desiderata (campo singolo)
        $typWh=;// operatori di tipo AND o OR per WHERE ignora indice 0, Default AND (array)
    */
    function delete($tabIn){
        $tab=$this->dbname.'.'.$tabIn;
	$this->query  = ("DELETE FROM ".$tab);
        $this->buildWhere();
        mysql_query($this->query,$this->db);
        $this->resVar();
    }

    /* Metodo update
        $opeWh=array();//Operatori di condizione per il WHERE Default '=' (array)(opzionale)
        $typWh=array();// operatori di tipo AND o OR per WHERE ignora indice 0 Default AND (array)(opzionale)
        $colWh=array();//Colonne di puntamento per WHERE (array)
        $valWh=;//Valori di Ricerca per WHERE (array)
        $colDt=array();//colonne target per SET (array)
        $valDt=array();//valori dei Dati per SET (array)
        $tabIn='';//tabella puntata (campo singolo)
    */
    function update($tabIn){
        $tab=$this->dbname.'.'.$tabIn;
	$this->query  = "UPDATE ".$tab;
        $typ=" SET ";
	foreach ($this->colDt as $key => $value){
            $this->query .= ($typ.$value."='".$this->valDt[$key]."'");
            $typ=', '; 
        }
        $this->buildWhere();
        mysql_query($this->query,$this->db);
        $this->resVar();
      }

    /* Metodo insert
        $colDt=array();//colonne target per INTO (array)
        $valDt=array();//valori da inserire per VALUES (array) 
        $tabIn='';//tabella puntata (campo singolo)
    */
    function insert($tabIn){
        $tab=$this->dbname.'.'.$tabIn;
       	$this->query = "INSERT INTO ".$tab." (";
   	
        $ins='';
        foreach ($this->colDt as $key => $value){
            $this->query .= ($ins.$value);
            $ins=', ';
	}
			
        $this->query .= ") VALUES (";

        $ins='';
        foreach ($this->valDt as $key => $value){
            $this->query .= ($ins."'".$value."'");
            $ins=', ';
	}
	$this->query .=")";
	mysql_query($this->query,  $this->db);
        $this->resVar();
    }
      

    /* Metodo select
        $dirSel = Opzionale Default ASC (Campo Singolo)
        $distinct = Opzionale Default false, se true fa un select distinct (campo singolo)
        $random = Opzionale Default true se true ritorno gli elementi in ordine casuale ed ignora l' ORDER BY (campo singolo)
        $colOr = Opzionale Colonne per ORDER BY (array)
        $colGr = Opzionale Colonne per GROUP BY (array)
        $opeWh = Opzionale operatori di condizione per il WHERE Default '=' (array)
        $typWh = Opzionale operatori di tipo AND o OR per WHERE ignora indice 0 Default AND (array)
        $colWh = Opzionale colonne di puntamento per WHERE (array)
        $valWh = Opzionale valori di Ricerca per WHERE (array)
        $list  = Opzionale se true forza il risultato con indice numerico
        $tabIn = tabella puntata (campo singolo)
    */

    function select($tabIn){

        $tab =  $this->dbname.'.'.$tabIn;
	$this->query  = 'SELECT ';
        if ($this->distinct) {
            $this->query .= 'DISTINCT ';
        }
        $col =  $this->listTable($tabIn);
        $sepa='';
        foreach ($col as $key => $value){
            $this->query .= $sepa.$value;
            $sepa=', ';
        }
        $this->query .= (' FROM '.$tab);
        if (isset($this->colWh[0])) {
            $this->buildWhere();
        }
        if ($this->random){
            $this->query .= ' ORDER BY RAND()';
        }elseif(isset($this->colOr[0])){
	    $this->query .= (' ORDER BY '.$this->colOr[0]);
            foreach ($this->colOr as $key => $value){
                if ($key != 0) {
                    $this->query .= (',' . $value);
                }
            }
            $this->query.=' '.$this->dirSel;
        }
        if(isset($this->colGr[0])){
	    $this->query .= (' GROUP BY '.$this->colGr[0]);
            foreach ($this->colGr as $key => $value){
                if ($key != 0) {
                    $this->query .= (',' . $value);
                }
            }
            $this->query.=' '.$this->dirSel;
        }
        $res=mysql_query($this->query,$this->db);
        $result['num']=mysql_affected_rows();
        if( ($result['num']>1) ||  ( $result['num']==1 && !(isset($this->colWh[0])) ) ){
            foreach ($col as $key => $value){
                for ($i=0;$i<$result['num'];$i++){
                    $result[$value][$i]=mysql_result($res,$i,$value);
                }
            }
        }else{
            if ($result['num']>0){
                if($this->list){
                    foreach ($col as $key => $value){
                        $result[$value][0]=mysql_result($res,0,$value);
                    }
                }else{
                    $result=mysql_fetch_array($res);
                }
            }
        }
        
        mysql_free_result($res);
        $this->resVar();
        return $result;
    }
    
    /*
    Metodo seletctJoin permette di incrociare i risultati tra piu tabelle
        $dirSel = Opzionale Default ASC (Campo Singolo)
        $colOr = Opzionale Colonne per ORDER BY IMPORTANTE SPECIFICARELEATABELLE (ex array('t1.c1','t2.c1',etc)) (array)
        $colGr = Opzionale Colonne per GROUP BY IMPORTANTE SPECIFICARELEATABELLE (ex array('t1.c1','t2.c1',etc)) (array)
        $opeWh = Opzionale operatori di condizione per il WHERE Default '=' (array)
        $typWh = Opzionale operatori di tipo AND o OR per WHERE ignora indice 0 Default AND (array)
        $colWh = Opzionale colonne di puntamento per WHERE IMPORTANTE SPECIFICARELEATABELLE (ex array('t1.c1','t2.c1',etc))  (array)
        $valWh = Opzionale valori di Ricerca per WHERE (array)
        $colDt = colonne target per ON -> IMPORTANTE SPECIFICARELEATABELLE (ex array('t1.c1','t2.c1',etc)) (array)
        $valDt = colonne corrispondenza per ON -> IMPORTANTE SPECIFICARELEATABELLE (ex array('t1.c1','t2.c1',etc)) (array)
        $tabIn = tabelle interessate (array)
        $joinMode = Opzioneale Metodo del join Default INNER     
    */

    function selectJoin($tabIn){
        $this->query  = ('SELECT ');
        $nTab=0;
        $sepa='';
        foreach ($tabIn as $key => $value){
            $tab[$key] = $this->dbname.'.'.$value;
            $nTab++;
            $col[$value]=$this->listTable($value);
            foreach ($col[$value] as $key2 =>$value2){
                    $this->query .= $sepa.$value.'.'.$value2;
                    $sepa = ', ';
            }
        }
        $this->query .= ' FROM '.$tab[0].' '.$this->joinMode.' JOIN (';
        for ($i=1;$i>$nTab;$i++){
            $this->query .= ', '.$tab[$i];
        }
        $this->query .= ' ) ON ( ';
	$sepa='';
	foreach ($this->colDt as $key => $value){
            $this->query .= $sepa.$this->colDT[$key].' = '.$this->valDt[$key];
		$sepa = ' AND ';
	}
        $this->query .= ' ) ';
        if (isset($this->colWh[0])){
            $this->buildWhere();
        }
        if(isset($this->colGr[0])){
	    $this->query .= (' GROUP BY '.$this->colGr[0]);
            foreach ($this->colGr as $key => $value){
                if ($key != 0) {
                    $this->query .= (',' . $value);
                }
            }
        }
        $this->query.=' '.$this->dirSel;
        $res=mysql_query($thi->query,$this->db);
   	    $result['num']=mysql_affected_rows();

        for ($i=0;$i<$nTab;$i++){
            foreach ($col[$tabIn[$i]] as $key => $value){
                for ($j=0;$j<$result['num'];$j++){
                    $result[$value][$j]=mysql_result($res,$j,$value);
                }
            }
        }

        mysql_free_result($res);
        return $result;
    }

}
?>