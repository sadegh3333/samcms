<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since October 2013
 * @version 0.0.5 Beta
 */
session_start();
require_once('../is-include/config.php');
require('../is-include/function.php');
require('../is-include/jdf.php');

if(!($_SESSION['username'])){
    header('location: metalogin.php');
}

?>
<!doctype html >
<html> 
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div id="maindiv"> 
<!-- Begin header bar  -->
<?php include ('headerbar.php'); ?>
<!-- End header bar  -->
<!-- Begin menu part -->
<div id="menuleft"> 
<?php include ('menuleft.php'); ?>
</div>
<!-- End menu part -->



</div>
<!-- Begin footer part -->
<div id="footer"> Powered By <a href="http://iransoftco.ir" target="_blank"> samcms </a> .  </div>
<!-- End footer part -->
</body>
</html>