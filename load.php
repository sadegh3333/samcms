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

require_once('config.php');
require_once('is-include/samengine.php');
require('is-include/jdf.php');
require('is-include/user-class.php');
require('is-include/post-class.php');
require('is-include/category-class.php');
require('is-include/plugin.class.php');
require('is-include/template-class.php');


$plugins = new plugin_api();

$mu = new user();

$pst = new post();

$cat = new category();

$template = new template();


if (isset($_GET['id'])) {
	$post_id = $_GET['id'];
	$get_post = $pst->getpost($post_id);
	$title = $get_post['title'];

	include('is-content/theme/single.php');

}
else{
// inlcude main file for theme
	include('is-content/theme/index.php');
}




?>