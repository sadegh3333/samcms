<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.2.0 Beta
 */

require_once ('../is-include/config.php');
// require('../is-include/counter.php');
require ('../is-include/jdf.php');
require ('../is-include/function.php');
require ('../is-include/template-class.php');

// make a new object from template class
$tpl = new Template();
$tpl->load_file('theme/index.htm');

// get header 
include('header.php');

// get page 
include('page.php');

// Create template for show
$tpl->print_template();

// close database connection
$dbc->close();
?>
