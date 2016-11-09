<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since  October 2013 - 2015 December
 * @version 0.2.2 Beta
 */

require_once ('db-class.php');

// Version Stats
$samcms_version = '0.5.0';
$channel_release = 'Beta';
$code_name = 'Rasmus Lerdorf';
$link_code_name = 'https://en.wikipedia.org/wiki/Rasmus_Lerdorf';

// Get host and ip
$host = $_SERVER['HTTP_HOST'];
$ip = $_SERVER['REMOTE_ADDR'];

// Where is your root file
$rootfile = '/samcms.last.version';
define(Root, 'http://'.$host.$rootfile);

// Set time zone
$settime = "Asia/Tehran";
date_default_timezone_set($settime);

// add display error on
ini_set('display_errors', 'On');

// Class for coonet to DataBase
$hostname = "localhost";
$usernamehost = "root";
$passwordhost = "SaDeGh.66";
$databasename = "samcmsdb";

// Create query to connect to DB ,  We use mysqli
$dbc = new db();
$dbc->connectdb($hostname, $usernamehost, $passwordhost, $databasename);
$dbc->query("SET CHARACTER SET utf8;");



define('PLUG_DIR', '../is-content/plugins');
?>