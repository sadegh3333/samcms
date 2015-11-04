<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013  February
 * @since 2013 January-February
 * @version 0.5.0 Beta
 */


include('../is-include/config.php');

$username = 'sadegh3333';
$password = sha1('1');
$name = 'sadegh';
$email = 'sadegh3333@gmail.com';
$ip = $_SERVER['REMOTE_ADDR'];
$sql = $dbc->query("INSERT INTO `metauser` (id,username,password,name,email,ip)VALUES ('id','$username','$password','$name','$email','$ip');");
echo('Done!');

?>