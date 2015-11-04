<?php


/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.2.1 Beta
 */

// add title to header file
$tpl->assign('title', 'وب سایت رسمی ایران سافت , iransoftco.ir');

// make a query  for get categorys
$qc = $dbc->query("SELECT * FROM `cat` ORDER BY `id`");
while($gc = $dbc->fetch($qc) )
{

// make a block for show all category
    $tpl->add_block('cats',array('cat'=>'<li><a href="showwithcat.php?id=' . $gc['id'] . '">' . $gc['name'] . '</a>'));
}

// make a query for get post with limit 4
$qln = $dbc->query("SELECT * FROM `content`  ORDER BY `id` DESC LIMIT 4");

while ($gln = $dbc->fetch($qln))
{
    // set tag for show in template
    $tpl->assign('tag',$gln['tag']);
    // make a block for show last four post
    $tpl->add_block('latestnews', array('latestnews' =>
            '<li><a href="singlepost.php?id=' . $gln['id'] . '">' . $gln['title'] .
            '</a></li>'));
}


?>
