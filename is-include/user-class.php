<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since October 2013
 * @version 0.2.1 Beta
 */

class user
{
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
}

?>