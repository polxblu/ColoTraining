<div id="cPannel">
<?php
   switch ($var['pag']){

	  case 'user':// gestione User
          require('../MODULES/adminUser.php');
	  break;

	  case 'video':// gestione Video
          require('../MODULES/adminVideo.php');
	  break;

	  case 'webTxt':// Testi interni sito
          require('../MODULES/adminTxtWebSite.php');
	  break;

	  case 'modCategoryOrd':// Gestione Ordine Categorie
          require('../MODULES/categoryOrd.php');
	  break;

	  case 'skedaTr':// Skeda Training
          require('../MODULES/skedaTraining.php');
	  break;

	  case 'category':// Gestione Categorie
          require('../MODULES/adminCategories.php');
	  break;

	  case 'lingue':// Pagina modifica aggiunta lingue
          require('../MODULES/adminLanguages.php');
	  break;

	  case 'chgImage':// Pagina Cambio Immagini
          require('../COMMON/chgImage.php');
	  break;

	  case 'chgText':// Pagina Cambio Testi
          require('../COMMON/chgText.php');
	  break;

	  case 'chgFile':// Pagina Cambio Files
          require('../COMMON/chgFile.php');
	  break;

	  case 'setGrants':// Pagina Setup Privilegi Utenti
          require('../MODULES/setGrants.php');
	  break;

	  default://LogOut  DEVE ASSOLUTAMENTE ESSERE il ULTIMO
          
          echo '<br/>'.$testo['home']['intro'].'<br/><br/>';
          
	  break;

   }
?>
</div>
