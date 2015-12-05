<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013  February
 * @since 2013 January-February
 * @version 0.2.1 Beta
 */


session_start();
require_once('../is-include/config.php');
require_once('../is-include/user-class.php');
require('../is-include/function.php');

if(isset($_POST['username']))$username = safe($_POST['username'],1);
if(isset($_POST['password']))$password = safe($_POST['password'],1);
$mu = new user();
if($_GET['action'] == 'login')
{
	$mu->login($username,$password);
}


if($_GET['action'] == 'logout')
{
	$mu->logout();
}
if(!isset($_SESSION['username']))header('location: index.php');
?>
