<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since  October 2013 - 2015 December
 * @version 0.2.1 Beta
 */

require_once ('db-class.php');

// Version Stats
$samcms_version = '0.2.7';
$channel_release = 'Beta';
$code_name = 'Dennis Ritchie';
$link_code_name = 'https://en.wikipedia.org/wiki/Dennis_Ritchie';

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