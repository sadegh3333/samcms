<?php


/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since 2013 October
 * @version 0.2.1 Beta
 */

$tpl->assign('title', 'وب سایت رسمی ایران سافت , iransoftco.ir');


$qc = $dbc->query("SELECT * FROM `cat` ORDER BY `id`");
while($gc = $dbc->fetch($qc) )
{

    $tpl->add_block('cats',array('cat'=>'<li><a href="showwithcat.php?id=' . $gc['id'] . '">' . $gc['name'] . '</a>'));
}


$qln = $dbc->query("SELECT * FROM `content`  ORDER BY `id` DESC LIMIT 4");

while ($gln = $dbc->fetch($qln))
{
    $tpl->assign('tag',$gln['tag']);
    $tpl->add_block('latestnews', array('latestnews' =>
            '<li><a href="singlepost.php?id=' . $gln['id'] . '">' . $gln['title'] .
            '</a></li>'));
}


?>