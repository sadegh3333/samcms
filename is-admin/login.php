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
if(isset($_GET['username']))$username = safe($_GET['username'],1);
if(isset($_GET['password']))$password = safe($_GET['password'],1);
$mu = new user();
if(isset($_GET['username']))
{
    $mu->login($username,$password);
}

if(isset($_GET['logout'])){
   $mu->logout();
   
}
if(!isset($_SESSION['username']))header('location: index.php');
?>
