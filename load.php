<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since  Nov 2016
 * @since version 0.4.0
 * @version 0.5.0 Beta
 */



/**
*	This is load file, when access to root site url
*	load file loaded theme and another thing.
* 
*/

session_start();

/* Require config.php file, if it isnt exist system wont be work. */
require_once('config.php');

/* include Auto-install file for check system is installed or if it doesnt install it.  */
require_once('is-include/auto.install.php');

/**
*	Check samcms is installed
*	if yes go next,
*	else go to install proccess.
*/

global $dbc;

/*
*	Check the system is installed or not.  
*	How does it work. when user access to root system check the metauser table exist or not.
*	if not go to installing proccess. or if system is installed so go to else part and run system.
*/
if (!$dbc->query("SELECT * FROM `metauser`")){

	if (!isset($_POST['runfordone'])) {
		install_step();
	}
	else{
		install_samcms();
		header('Location: index.php');
	}	
}
else{

/**
*	Include neccessary files,
*
*/
require_once('is-include/samengine.php');
require('is-include/class.user.php');
require('is-include/class.document.php');
require('is-include/class.category.php');
require('is-include/class.plugin.php');
require('is-include/class.template.php');


$plugins = new plugin_api();

$mu = new user();

$pst = new document();

$cat = new category();

$template = new template();




/**
*	Show page to user when user access to single post show single page.
*	and if its home page show home page.
*
*/
if (isset($_GET['id'])) {
	$post_id = $_GET['id'];
	$get_post = $pst->getpost($post_id);
	$title = $get_post['title'];

	include('is-content/theme/single.php');

}
else{
	/* Inlcude main file ( Home page ) */
	include('is-content/theme/index.php');
}


}


?>