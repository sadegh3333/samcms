<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since October 2013 - 2016 june
 * @version 0.6.0 Beta
 */



/**
*   This is User Class,
*   Everything we need to work with user is here.
*
*/
class user
{

    /**
    *   Store all user role in this array.
    *   Default Roles is:
    *   100.Administrator (GOD user)
    *   0.simple user (user)
    *
    *   @Since 0.8.0
    */
    public $user_role_list = array();


    /**
    *   when create a user object run this function.
    *   Set the default settings
    *
    *   @Since 0.2.0
    */
    public function __construct() {

     /* Set user roles default */
     $this->user_role_list['administrator'] = 100;
     $this->user_role_list['user'] = 0;

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


/**
*   Return all users registered in database
*
*   @Since 0.7.2
*/
public function get_all_user_list(){
    global $dbc;

    $user_list = $dbc->query("SELECT * FROM `metauser`");

    return $user_list;
}


/**
*   Add a new Role for users
*
*   @Since 0.8.0
*/
public function add_role(){


}

/**
*   Set a Role for single user
*
*   @Since 0.8.0
*/
public function set_role(){

}

/**
*   Remove a Role for single user
*
*   @Since 0.8.0
*/
public function remove_role(){

}

/**
*   Return user Role from single user
*
*   @Since 0.8.0
*/
public function get_user_role($user_id){
    global $dbc;

    $user = $dbc->query("SELECT * FROM `metauser` WHERE id='$user_id'");

    $role = $dbc->fetch($user);
    
    return  array_search($role['role'], $this->user_role_list);
}

}
?>