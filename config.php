<?php

/**
 * @author Sadegh Mahdilou
 * @copyright October 2013 - 2016 November
 * @since 0.2.0
 * @version 0.5.0 Beta
 *
 */

/**
*	This is Configuration file.
*	Please dont change it if you dont about how to setting it.
*/

/* Version Stats */
$samcms_version = '0.12.1';
$channel_release = 'Beta';
$code_name = 'Rasmus Lerdorf';
$link_code_name = 'https://en.wikipedia.org/wiki/Rasmus_Lerdorf';

/* Store Host url */
$host = $_SERVER['HTTP_HOST'];

/* Store ip user */
$ip = $_SERVER['REMOTE_ADDR'];

/**
*	Where is your root file.
*	if you are isnstalling samcms in root folder just set $rootfile to '/'
*	or if you are installing in a folder set the name it like '/samcms'
*
*/
$rootfile = '/samcms.last.version';

/* Set a define, root url */
define(Root, 'http://'.$host.$rootfile);

// Set time zone
$settime = "Asia/Tehran";
date_default_timezone_set($settime);

/* if is On show all error made with php if you dont to show it just swtich to Off */
ini_set('display_errors', 'On');

/* just set your host name. usual is localhost  */
$hostname = "localhost"; 

/* Set your username for connecting to database */
$usernamehost = "root"; 

/* Set your password for connecting to database */
$passwordhost = "SaDeGh.66"; 

/* Set your database name, you must make it in you host */
$databasename = "samcmsdb"; 


/**
*	Include Class Database 
*/
require_once('is-include/class.database.php');

/**
*	Set a Root Directory, this is Root folder Directory
*/
define( 'Root_Dir', dirname( __FILE__ ) . '/' );

/*
*	Define Plugin folder  
*/
define('PLUG_DIR', Root_Dir.'is-content/plugins/');
?>