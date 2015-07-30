<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<link href="CONFIG/videopage.css" rel="stylesheet" type="text/css"/>
<link href="CONFIG/index.css" rel="stylesheet" type="text/css"/>
<link href="CONFIG/barra.css" rel="stylesheet" type="text/css"/>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="CLASSANDFUNC/scriptmenu.js"></script>

</head>

<body>

<div id='cssmenu' class="align-center">
<ul>
   <?php
       include_once 'COMMON/menu.php';
       include_once 'COMMON/lingue.php'; 
       if(isset($_SESSION['id'])) include_once 'COMMON/loggedIn.php'; 
       else include_once 'COMMON/logIn.php'; 
   ?>
</ul>
</div>

<?php include_once 'PAGES/'.$var['pag'].'.php'; ?>

</body>

</html>