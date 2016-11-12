<?php

/**
 * @author Sadegh Mahdilou
 * @copyright October 2013 - 2016 November
 * @since version 0.2.0
 * @version 0.4.0 Beta
 *
 */


// Version Stats
$samcms_version = '0.6.11';
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

// if is On show all error made with php if you dont to show it just swtich to Off
ini_set('display_errors', 'On');

// Setting your host database information
$hostname = "localhost";
$usernamehost = "root";
$passwordhost = "SaDeGh.66";
$databasename = "samcmsdb";

require_once('is-include/class.database.php');


define( 'Root_Dir', dirname( __FILE__ ) . '/' );

// Define addr for plugin folder
define('PLUG_DIR', Root_Dir.'is-content/plugins/');
?>