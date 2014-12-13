<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.2.1 Beta
 */
  session_start();
define('Security',true);
require_once ('../is-include/config.php');
require ('../is-include/function.php');

$type = safe($_GET['type'],1);
$cat = safe($_POST['cat'],1);
if ($type == 'cat')
    {        
    if (!empty($cat)) {
        $getsubid = $dbc->fetch($dbc->query("SELECT * FROM `cat` ORDER BY  `id` DESC "));
        $getsubn = $getsubid['sub'] + 1;

        $sql = $dbc->query("INSERT INTO `cat` (id,name,sub)VALUES ('id','$cat','$getsubn');");
        echo ('the category is added !');
        header('location: cat.php');
    } else {
        echo ('please insert feild in form !');
    }

    }
    
if ($type == 'subcat')
{
    $cat = safe($_POST['cat'],1);
    $subcat = safe($_POST['subcat'],1);
    if (!empty($cat) && !empty($subcat)) {
        $qgetsubn = $dbc->query("SELECT * FROM `cat`  WHERE `id` = '$cat'");
        $getsubnfetch = $dbc->fetch($qgetsubn);
        $getsubn = $getsubnfetch['sub'];
        $sql1 = $dbc->query("INSERT INTO `subcat` (id , subcatid, name) VALUES ('id' , '$getsubn' , '$subcat');");
        //echo('<script> alert(" sub menu added ! ") </script>');
        header("location: cat.php");
    } else {
        echo ("You should select a category and then fill feild for insert sub category ");
    }

}

?>