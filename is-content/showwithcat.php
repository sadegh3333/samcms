<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.2.0 Beta
 */

require_once ('../is-include/config.php');
// require('../is-include/counter.php');
require ('../is-include/jdf.php');
require ('../is-include/function.php');
require ('../is-include/template-class.php');

if (isset($_GET['id']))
{
    $id = safe($_GET['id'], 1);
} else
{
    exit();
}
$tpl = new Template();
$tpl->load_file('theme/showwithcat.htm');

include ('header.php');

$qmp = $dbc->query("SELECT * FROM `content` WHERE `cat`='$id'");
$gp = $dbc->fetch($qmp);
$countpost = count($gp);
if ( $countpost == 0)
{
    $tpl->assign('nomore','<div id="post"><p align="center">مطلبی در این بخش موجود نمی باشد .</p></div>');

}

while ($gp = $dbc->fetch($qmp))
{

    $idc = $gp['cat'];
    $qc = $dbc->query("SELECT * FROM `cat` WHERE `id`='$idc' LIMIT 1");
    $gc = $dbc->fetch($qc);
    $gnamec = $gc['name'];
    $tpl->add_block('page', array(
        'title' => $gp['title'],
        'link' => ('singlepost.php?id=' . $gp['id']),
        'cat' => $gnamec,
        'author' => $gp['author'],
        'datetime' => jdate('H:m:s Y,m,d', $gp['datetime']),
        'minicontent' => $gp['minicontent']));
}


// Create template for show
$tpl->print_template();

?>