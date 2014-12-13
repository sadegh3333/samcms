<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.2.1 Beta
 */

require_once ('../is-include/config.php');
// require('../is-include/counter.php');
require ('../is-include/jdf.php');
require ('../is-include/function.php');
require ('../is-include/template-class.php');

$id = $_GET['id'];
$tpl = new Template();
$tpl->load_file('theme/singlepost.htm');

include('header.php');

$qmp = $dbc->query("SELECT * FROM `content` WHERE `id`='$id' LIMIT 1");
while ($gp = $dbc->fetch($qmp))
{

    $idc = $gp['cat'];
    $qc = $dbc->query("SELECT * FROM `cat` WHERE `id`='$idc' LIMIT 1");
    $gc = $dbc->fetch($qc);
    $gnamec = $gc['name'];
    $tpl->add_block('page', array(
        'tag' => $gp['tag'],
        'title' => $gp['title'],
        'link' => ('singlepost.php?id=' . $gp['id']),
        'cat' => $gnamec,
        'author' => $gp['author'],
        'datetime' => jdate('H:m:s Y,m,d', $gp['datetime']),
        'fullcontent' => $gp['fullcontent']));
}

include('footer.php');

// Create template for show
$tpl->print_template();

?>