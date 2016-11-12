<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since October 2013
 * @version 0.2.0 Beta
 */

// Create Class for connect and proccess in DataBase
class db
{
    var $connection;

    function connectdb($hostname, $usernamehost, $passwrodhost, $databasename)
    {
        $this->connection = mysqli_connect($hostname, $usernamehost, $passwrodhost, $databasename) or
        die(mysqli_error());
    }
    
    function close(){
        $this->connection = mysqli_close($this->connection) or die(mysqli_error());
    }
    function query($sql)
    {
        $backq = mysqli_query($this->connection, $sql);
        return $backq;
    }

    function fetch($backq)
    {
        $result = mysqli_fetch_assoc($backq);
        return $result;
    }
    function getrow($result)
    {
        $result = mysqli_fetch_row($result);
        return $result;
    }
    
}

// Create query to connect to DB ,  We use mysqli
$dbc = new db();
$dbc->connectdb($hostname, $usernamehost, $passwordhost, $databasename);
$dbc->query("SET CHARACTER SET utf8;");
?>