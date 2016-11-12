<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since October 2013 - 2016 june
 * @version 0.3.0 Beta
 */

class user
{
   function __construct() {
     $user = array(
        'username' => '',
        'password' => '',
        'state' =>'logout'
        );
 }
 function login($username = '', $password = '')
 {
    global $dbc;
    $logindate = time();
    echo ('get username is : ' . $username . ' password : ' . $password . '<br />');
    if (!empty($username) && !empty($password))
    {
        echo ('this is ok');
        $q = $dbc->query("SELECT `username`,`password` FROM `metauser` WHERE username = '$username' LIMIT 1");
        $res = $dbc->fetch($q);
        $user = $res['username'];
        $pass = $res['password'];
        echo ('The user is : ' . $user . ' Pass : ' . $pass . '<br />');
        if ($username == $user and sha1($password) == $pass)
        {
            echo ('Welcome my legend!');
            $q1 = $dbc->query("UPDATE `metauser` SET `ip`='$ip',`logindate`='$logindate' WHERE `username`='$user'");
            $_SESSION['username'] = $username;
            setcookie('username', $username, time() + 18000);
            header('location: index.php');
        }
    }
}
function logout()
{
    session_destroy();
    header('location: index.php');
}

function check_user_stat() {
    if (isset($_SESSION['username'])) {
        return $userstat = 'logedin';
    }
    else{
        return $userstat = 'logedout';
    }
}

function get_userdata($username) {
    global $dbc;
    
    $userdata = array();
    $q = $dbc->query("SELECT * FROM `metauser` WHERE username ='$username'");

    $res = $dbc->fetch($q);
    $this->userdata = array(
        'username' => $res['username'],
        );
}

}
?>