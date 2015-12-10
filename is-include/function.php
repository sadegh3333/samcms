<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015  December
 * @since  January 2013 - 2015 December 
 * @version 0.6.0 Stable
 */

require_once('config.php');
// safe function
function safe($value,$type='0'){
	global $dbc;
	$value = trim($value);
	$value = str_replace("|nline|","",$value);
	$value = str_replace("|rnline|","",$value);
	$value = str_replace("\r\n","|rnline|",$value);
	$value = str_replace("\n","|nline|",$value);
//$value = mysqli_real_escape_string($dbc->connection, $value );
	$value = str_replace("|nline|","\n",$value);
	$value = str_replace("|rnline|","\r\n",$value);
	if($type != '1')
	{
		$value		= htmlspecialchars($value);
		$value		= strip_tags($value);
		$value 		= str_replace(array("<",">","'","&#1740;","&amp;","&#1756;"),array("&lt;","&gt;","&#39;","&#1610;","&","&#1610;"),$value);
	}
	return $value;
}

/* Function for get bootsrap files */
function Get_bootstarp(){
global $Root;
	?>
	<!-- add css bootstrap files -->
	<link rel="stylesheet" type="text/css" href="<?php echo $Root.'/is-include/css/bootstrap.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $Root.'/is-include/css/bootstrap.min.css'; ?>">
	<!-- add js bootstrap files -->
	<script type="text/javascript" src="<?php echo $Root.'/is-include/js/jquery-2.1.4.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo $Root.'/is-include/js/bootstrap.js';  ?>"></script>
	<script type="text/javascript" src="<?php echo $Root.'/is-include/js/bootstrap.min.js'; ?>"></script>
	<?php	
}


?>