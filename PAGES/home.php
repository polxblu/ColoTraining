<div id="formaazzurra" class="sologrande"></div>
<div id="formaazzurrasmall" class="solopiccolo"></div>
<img id="pictop" src="IMAGES/HOME/pictop.jpg"/>

<div id="registrazione">
    <span style="font-size:35px;">
        Crea la tua scheda,<br />inizia il tuo allenamento.
    </span>
    
    <hr style="width:100%; height:4px; background-color:white;"/>
    
    <form action="index.php<?php if(isset($_GET['token'])) echo '?token='.$_GET['token'];?>" method="post" name="chgText" id="chgText">
        <?php echo $testo['home']['homeName'];?>:<br />
        <input class="formreg" name="name" type="text" value="<?php if(isset($_SESSION['name']))echo $_SESSION['name'];?>"/><br /><br />
        
        <?php echo $testo['home']['homeMail'];?>:<br />
        <input value="<?php if(isset($_SESSION['email']))echo $_SESSION['email'];?>" class="formreg" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" name="email" required/><br/><br/>
        
        
        <?php echo $testo['home']['homeAge'];?>:<br />
        <?php
        for($i=0;$i<$kar['rangeAgeNum'];$i++){
            echo '<input ';
            if(isset($_SESSION['age']))if($_SESSION['age']==$i)echo ' checked ';
            echo 'name="age" value="'.$i.'" type="radio"/>'.$kar['rangeAge'][$i].'&nbsp;&nbsp;';
        }
        ?>
        <br /><br />
        <button class="formreg" style="font-size:17px;" name="ACT" type="submit" value="<?php echo $testo['buttons']['register']; ?>">
            <?php echo $testo['buttons']['freeTrial']; ?>
        </button>
        <br /><br />
        <?php
        if (!isset($_SESSION['id'])) 
            echo '
        <button class="formreg" style="font-size:17px;" name="ACT" type="submit" value="'.$testo['buttons']['register'].'">
            '.$testo['buttons']['register'].'
        </button>
            ';
        ?>
    </form>
</div>

<div id="maincontent">
    <div id="titolo">
    	<img src="IMAGES/COMMON/title.png" height="100%"/>
    </div>
    
<div id="stepscontainer">
    	<div id="step1" class="step">
        	<img src="IMAGES/HOME/step1.jpg" width="100%" height="100%"/>
            <div id="step1descr" class="stepdescr">
            	Programma i tuoi allenamenti
            </div>
        </div>
        <div id="step2" class="step">
        	<img src="IMAGES/HOME/step2.jpg" width="100%" height="100%"/>
            <div id="step2descr" class="stepdescr">
            	Porta i video sempre con te
            </div>
        </div>
        <div id="step3" class="step">
        	<img src="IMAGES/HOME/step3.png" width="100%" height="100%"/>
            <div id="step3descr" class="stepdescr">
            	Scopri consigli e ricette per il tuo allenamento
            </div>
        </div>
</div>

<div id="videotableind">
	
    <div class="videoicon">
    	<img class="videopic" src="IMAGES/COMMON/videoicontest.jpg"> <br/>
        <big><b>Rotazione Basculande doppia</b></big> <br/>
        <div class="videoinfo">
        	Addominali
			<br/>
        	<img src="IMAGES/COMMON/diff_on.png" width="20"/>
    		<img src="IMAGES/COMMON/diff_on.png" width="20"/>
            <img src="IMAGES/COMMON/diff_off.png" width="20"/>
        </div>
        <br/><small>12:20</small>
    </div>
    
   <div class="videoicon">
    	<img class="videopic" src="IMAGES/COMMON/videoicontest.jpg"> <br/>
        <big><b>Rotazione Basculande doppia</b></big> <br/>
        <div class="videoinfo">
        	Addominali
			<br/>
        	<img src="IMAGES/COMMON/diff_on.png" width="20"/>
    		<img src="IMAGES/COMMON/diff_on.png" width="20"/>
            <img src="IMAGES/COMMON/diff_off.png" width="20"/>
        </div>
        <br/><small>12:20</small>
    </div>
    
    <div class="videoicon">
    	<img class="videopic" src="IMAGES/COMMON/videoicontest.jpg"> <br/>
        <big><b>Rotazione Basculande doppia</b></big> <br/>
        <div class="videoinfo">
        	Addominali
			<br/>
        	<img src="IMAGES/COMMON/diff_on.png" width="20"/>
    		<img src="IMAGES/COMMON/diff_on.png" width="20"/>
            <img src="IMAGES/COMMON/diff_off.png" width="20"/>
        </div>
        <br/><small>12:20</small>
    </div>
    
    <div class="videoicon">
    	<img class="videopic" src="IMAGES/COMMON/videoicontest.jpg"> <br/>
        <big><b>Rotazione Basculande doppia</b></big> <br/>
        <div class="videoinfo">
        	Addominali
			<br/>
        	<img src="IMAGES/COMMON/diff_on.png" width="20"/>
    		<img src="IMAGES/COMMON/diff_on.png" width="20"/>
            <img src="IMAGES/COMMON/diff_off.png" width="20"/>
        </div>
        <br/><small>12:20</small>
    </div>
    
    <div class="videoicon">
    	<img class="videopic" src="IMAGES/COMMON/videoicontest.jpg"> <br/>
        <big><b>Rotazione Basculande doppia</b></big> <br/>
        <div class="videoinfo">
        	Addominali
			<br/>
        	<img src="IMAGES/COMMON/diff_on.png" width="20"/>
    		<img src="IMAGES/COMMON/diff_on.png" width="20"/>
            <img src="IMAGES/COMMON/diff_off.png" width="20"/>
        </div>
        <br/><small>12:20</small>
    </div>
  
</div>

</div>