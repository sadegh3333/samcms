<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.2.5 Beta
 */

// if this is first page show 10 latest post 
if (!isset($_GET['pagen']))
{
    $qmp = $dbc->query("SELECT * FROM `content` ORDER BY `id` DESC LIMIT 10 ");
} else
{
    // set which post get for show
    $pagen = $_GET['pagen'];
    $start = ($pagen * 11);
    $end = ($pagen * 11) + 10;

    $limitpage = $start . ',' . $end;
    // make a query for show post 
    $qmp = $dbc->query("SELECT * FROM `content` ORDER BY `id` DESC LIMIT $limitpage ");

}
while ($gp = $dbc->fetch($qmp))
{

    $idc = $gp['cat'];
    $qc = $dbc->query("SELECT * FROM `cat` WHERE `id`='$idc' LIMIT 1");
    $gc = $dbc->fetch($qc);
    $gnamec = $gc['name'];
    // make a block for show post in template
    $tpl->add_block('page', array(
        'title' => $gp['title'],
        'link' => ('singlepost.php?id=' . $gp['id']),
        'cat' => $gnamec,
        'author' => $gp['author'],
        'datetime' => jdate('H:m:s Y,m,d', $gp['datetime']),
        'minicontent' => $gp['minicontent']));
}
// make a query for count all post
$q = $dbc->query("SELECT COUNT(*) `id` FROM `content`");
$nc = $dbc->fetch($q);
$nc0 = $nc['id'];
$nc1 = $nc0 / 10;

// make a part for show page number 
for ($i = 1; $i <= $nc1; $i++)
{
    $tpl->add_block('pagenumber', array('pagenumber' => '<a href="index.php?pagen=' .
            $i . '">' . $i . '</a>'));
}

?>
