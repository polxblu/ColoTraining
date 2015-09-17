<?php
$uar=array(); //inizzializzazione array x URL 
$testo=array(); //inizzializzazione array x TESTO
$video=array(); //inizzializzazione array x VIDEO

$liste=array( //inizzializzazione array dele Liste e categorie
      'type'  => array (  // Tipi di categorie
                       'num'    =>  2   //numero di oggetti
                      ,'idc'  =>  array('main','slave')      //definizione di oggetti
                      )
     ,'property'  => array (  // propieta liste Tabelle
                       'num'    =>  3   //numero di oggetti
                      ,'idc'  =>  array(
                            'videoCategory'      //Workout, panca,etc    
                           ,'videoMuscleGroup'   // gruppo muscolare
                           ,'typeTraining'       // Tipi di allenamento    
                           )         //definizione di oggetti
                      )
     );   

// Definizione Array Costruzione Sito
$definitions=array(
      'commonTxt'  => array (  // Tipi di Testo
                       'num'    =>  7   //numero di oggetti
                      ,'idc'  =>  array('menu','errors','buttons','login','common','category','messages')      //definizione di oggetti
                      )
     ,'pagesTxt'  => array (  // Tipi di Testo
                       'num'    =>  2   //numero di oggetti
                      ,'idc'  =>  array('admin','home')      //definizione di oggetti
                      )
     ,'menu'  => array (  // Elenco menu
                      'admin'  => array (  // Elenco menu admin
                             'num'  =>  9   //numero di oggetti
                            ,'idc'  =>  array('home','skedaTr','skedaDt','skedaAD','video','category','webTxt','lingue','user')     //definizione di oggetti
                            ,'priv' =>  array(false,false,false,false,false,false,false,true,true)      //definizione di oggetti
                            )
                     ,'home'  => array (  // Elenco menu admin
                             'num'  =>  6   //numero di oggetti
                            ,'idc'  =>  array('home', 'videoH', 'workout', 'ricette', 'selfie', 'contatting')     //definizione di oggetti
                            )
                      )
    );


// DEFINIZIONI UTILIZZO TABLE
$DBtable=array(
     'user'   => array (  // Tabella User
           'num'   =>  5    
          ,'fields'=> array('name','surname','age','difLevel','remTime')
          ,'modFields'=> array(true,true,true,true,false)
          )  
     ,'languages' => array (  // Tabella lingue
           'flag'     =>  true   
          ,'flago'    =>  true
          ,'cCode'    =>  true
          )  
    );


?>
