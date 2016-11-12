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
require('is-include/class.user.php');
require('is-include/class.post.php');
require('is-include/class.category.php');
require('is-include/class.plugin.php');
require('is-include/class.template.php');


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