<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since  Nov 2016
 * @since version 0.4.0
 * @version 0.2.0 Beta
 */



/*
*	
*	This is load file, when access to root site url
*	load file loaded theme and another thing.
*
*/

session_start();




require_once('is-include/config.php');
require('is-include/function.php');
require('is-include/jdf.php');
require('is-include/user-class.php');
require('is-include/post-class.php');
require('is-include/category-class.php');
require('is-include/plugin.class.php');
require('is-include/template-class.php');


$plugins = new plugin_api();

$plugins->run_active_plugin();

$mu = new user();

$pst = new post();

$cat = new category();

$template = new template();


if (isset($_GET['id'])) {
	include('is-content/theme/single.php');
}
else{
// inlcude main file for theme
	include('is-content/theme/index.php');
}




?>