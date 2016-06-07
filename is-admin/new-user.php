<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since 2016 May
 * @version 0.1.0 Developer
 */


session_start();
require_once('../is-include/config.php');
require_once('../is-include/user-class.php');
require('../is-include/function.php');
require_once('../is-include/db-class.php');

if(isset($_POST['username']))$username = safe($_POST['username'],1);
if(isset($_POST['email']))$email = safe($_POST['email'],1);
if(isset($_POST['password']))$password = sha1(safe($_POST['password'],1));


$mu = new user();
$db = new db();

$ip = $_SERVER['REMOTE_ADDR'];
$sql = $dbc->query("INSERT INTO `metauser` (id,username,password,email,ip)VALUES ('id','$username','$password','$email','$ip');");
echo('Done!');

header('location: ../is-admin/index.php');
?>
