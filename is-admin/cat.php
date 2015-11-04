<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.0.1 Beta
 */
 session_start();
define('Security',true);
require_once ('../is-include/config.php');
require ('../is-include/function.php');
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
<!-- Begin part maincenter -->
<div id="maincenter-cat">
    <p><strong>You can make category :</strong></p>
<div id="formcat">
    <p><strong> Category available : </strong></p>  
<!-- start part show all item in category -->
<?php
$query = $dbc->query("SELECT * FROM `cat`"); 
while ($getcat = $dbc->fetch($query)) {
    echo ('<p>' . $getcat['name'] . '</p>');
}
?>  
</div>
<!-- end part show all item in category -->
<!-- Begin form category -->
<div id="formcat">
<form action="submitcat.php?type=cat" method="POST">
<p><label>  name category :  </label> <input name="cat" value="" type="text" /></p>
<input type="submit" value="Register" />
</form>
</div>
<!-- End form category -->
<!-- Begin form sub category -->
<div id="formcat">
<form action="submitcat.php?type=subcat" method="POST" >
<div> You can make sub category : </div>
<div>
<?php
$query1 = $dbc->query("SELECT * FROM `subcat`");

while ($getsubcat =$dbc->fetch($query1)) {
    echo ('<p>'.$getsubcat['name'].'</p>');
}
$query = $dbc->query("SELECT * FROM `cat`");
echo ('<p> <span> Please Select your category </span> <select name="cat" ><option></option>');
while ($getcat =$dbc->fetch($query)) {
    echo (' <option  value="' . $getcat['id'] . '" >' . $getcat['name'] . '</option>');
    $cat = $getcat['name'];
}
echo ('</select></p>');
?>
</p></div>
<div><span> Name sub Category :  </span> <input type="text" name="subcat" /></div>
<input id="btn" type="submit" value="Add sub categoey" /></div>
</form>
</div>
<!-- End form sub category --> 
</div>
<!-- end part maincenter -->
<!-- Begin footer part -->
<div id="footer"> Powered By <a href="http://iransoftco.ir" target="_blank"> samcms </a> .  </div>
<!-- End footer part -->
</body>
</html>