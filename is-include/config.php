<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.1.0 Beta
 */

require_once ('db-class.php');
// Get host and ip
$host = $_SERVER['HTTP_HOST'];
$ip = $_SERVER['REMOTE_ADDR'];
// Set time zone
$settime = "Asia/Tehran";
date_default_timezone_set($settime);

// Class for coonet to DataBase

$hostname = "localhost";
$usernamehost = "root";
$passwordhost = "";
$databasename = "samcmsdb";

// Create query to connect to DB ,  We use mysqli
$dbc = new db();
$dbc->connectdb($hostname, $usernamehost, $passwordhost, $databasename);
$dbc->query("SET CHARACTER SET utf8;");

?>