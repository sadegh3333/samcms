<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013  February
 * @since 2013 January-February
 * @version 0.5.0 Beta
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
?>