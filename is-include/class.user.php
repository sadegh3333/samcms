<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since October 2013 - 2016 November
 * @version 0.18.0 Beta
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
    *   Store all user capabilities in this array.
    *
    *   @Since 0.9.1
    */
    public $user_capabilities = array();  


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

    /**
    *   Login user , check username and password if is correct set a session
    *
    *   @Since 0.2.0
    */

    function login($username = '', $password = '',$ip)
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
                $root = Root;
                header("location: $root");
            }
        }
    }


    

    /**
    *   add_new_user , prepare user to add new user in metauser table
    *
    *   @Since 0.9.21
    */
    function add_new_user($username,$password,$email){
        global $dbc;

        $password = sha1($password);

        if ($dbc->query("INSERT INTO `metauser` (`id`, `name`, `lastname`, `username`, `password`, `email`, `ip`, `last.login`, `role`) VALUES
            (`id`, '', '', '$username', '$password', '$email', '', '', 0);"))
        {
            return true;
        }
        else {
            return false;
        }    
    }


    /**
    *   logout user, when run this function session will destroy and user logout.
    *
    *   @Since 0.2.0
    */
    function logout()
    {
        session_destroy();
        header('location: index.php');
    }


    /**
    *   Cehck the user stat, is logged in or not.
    *
    *   @Since 0.2.0
    */
    function check_user_stat() {
        if (isset($_SESSION['username'])) {
            return $userstat = 'logedin';
        }
        else{
            return $userstat = 'logedout';
        }
    }


    /**
    *   Get signle user data.
    *
    *   @Since 0.2.0
    */
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
    public function get_user_role($username){

        $role = $this->user_info($username);
        return  array_search($role['role'], $this->user_role_list);
    }



    /**
    *   add user capabilities for single user
    *
    *   @Since 0.9.1
    */
    public function add_user_capabilities($cap){

        $this->user_capabilities[] = $cap;
    }


    /**
    *   Return user capabilities for single user
    *
    *   @Since 0.9.1
    */
    public function get_user_capabilities($username){

        return $this->user_capabilities;
    }


    /**
    *   Return check user is admin
    *
    *   @Since 0.9.1
    */
    public function is_admin($username){

        $user_info =  $this->user_info($username);

        if ($user_info['role'] == 100 ) {
           return true;
       }
       else {
           return false;
       }

   }


    /**
    *   Return data user 
    *
    *   @Since 0.9.1
    */
    public function user_info($username){
        global $dbc;

        $user = $dbc->query("SELECT * FROM `metauser` WHERE username='$username'");

        $user_info = $dbc->fetch($user);

        return $user_info;
    }


    /**
    *   Return This user username ( if is logged-in ) 
    *
    *   @Since 0.9.1
    */
    public function this_user_username(){

        if (isset($_SESSION['username'])) {
            return $_SESSION['username'];
        }
        else {
            return false;
        }
    }


    /**
    *   Check user can be. 
    *
    *   @Since 0.9.10
    */
    public function user_can_be($username , $page){

        $user_cap = $this->get_user_capabilities($username);

        $check = array_search($page, $this->user_capabilities);
        if ($check == NULL) {
            return true;
            echo 'You can access to this page, enjoy it.';
        }
        else {
            return false;
            echo  "Are you kidding me???!!! You can not access to this page.";
        }
    }



    /**
    *   Update information user
    *
    *   @Since 0.10.3
    */
    public function update_info_user($id,$username ,$password ,$email ,$name ,$lastname ){
        global $dbc;

        if($dbc->query("UPDATE `metauser` SET `name`='$name',`lastname`='$lastname',`username`='$username',`password`='$password',`email`='$email' WHERE `id`='$id'"))
        {
            return true;
        }
        else {
            return false;
        }
    }

}
?>