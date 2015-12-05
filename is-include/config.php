<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.2.0 Beta
 */

require_once ('db-class.php');
// Get host and ip
$host = $_SERVER['HTTP_HOST'];
$ip = $_SERVER['REMOTE_ADDR'];

global $Root;
// Where is your root file
$rootfile = '/sam/samcms';
$Root = 'http://'.$host.$rootfile;

// Set time zone
$settime = "Asia/Tehran";
date_default_timezone_set($settime);

// add display error on
ini_set('display_errors', 'On');

// Class for coonet to DataBase
$hostname = "localhost";
$usernamehost = "root";
$passwordhost = "ju1bNELAzq1k";
$databasename = "samcmsdb";

// Create query to connect to DB ,  We use mysqli
$dbc = new db();
$dbc->connectdb($hostname, $usernamehost, $passwordhost, $databasename);
$dbc->query("SET CHARACTER SET utf8;");

?>