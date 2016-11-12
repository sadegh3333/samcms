<?php

/**
 * @author Sadegh Mahdilou
 * @copyright October 2013 - November 2016
 * @since 0.2.0
 * @version 0.4.0 Beta
 */

class document
{
    var $pstcnt;

    function submit_document($title, $content, $category ,$tag ,$author , $datetime ){
        global $dbc;
        $q = $dbc->query("INSERT INTO `document`(id, title, content, category, tag, author, datetime) VALUES (id,'$title','$content','$category','$tag','$author','$datetime') ");
        echo ('done....!');
    }
    function getpost($id)
    {
        global $dbc;

        $q = $dbc->query("SELECT * FROM `document` WHERE `id`=$id LIMIT 1");
        while ($res = $dbc->fetch($q))
        {
            $pstcnt = array(
                'title' => safe($res['title'], 1),
                'content' => safe($res['content']),
                'category' => safe($res['category'], 1),
                'tag' => safe($res['tag'], 1),
                'author' => safe($res['author']),
                'datetime' => $res['datetime'],
                );
        }
        return $pstcnt;
    }


    function showallpost()
    {

        global $dbc;
        $q = $dbc->query("SELECT * FROM `document` ORDER BY `id` DESC");

        while ($res = $dbc->fetch($q))
        {
            $document[] = $res;
        }
        return $document;
    }
    function update($id,$title, $content,  $author, $tag, $category, $datetime){
        global $dbc;
        $q = $dbc->query("UPDATE `document` SET  title='$title',content='$content',category='$category',tag='$tag',author='$author',datetime='$datetime' WHERE id='$id'");
        echo('Done...!');
    }
}

?>