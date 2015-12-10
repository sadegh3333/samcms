<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since October 2013
 * @version 0.1.6 Beta
 */

class post
{
    var $pstcnt;

    function sendpost($title, $minicontent, $fullcontent, $author, $tag, $cat, $subcat,
        $datetime)
    {
        global $dbc;
        $idcat = $this->setcat($cat);
        $idsubcat = $this->setsubcat($subcat);
        $q = $dbc->query("INSERT INTO `content` (id,title,minicontent,fullcontent,cat,subcat,tag,author,datetime,counter,dedicatedlink) VALUES ('id','$title','$minicontent','$fullcontent','$idcat','$idsubcat','$tag','$author','$datetime','0','0')");
        echo ('done....!');
    }
    function setcat($cat)
    {
        global $dbc;
        $name = $cat;
        $q = $dbc->query("SELECT * FROM `cat` WHERE name='$name' LIMIT 1");
        $res = $dbc->fetch($q);
        $id = $res['id'];
        $sub = $res['sub'];
        return $id;
    }
    function getcat($idcat){
        global $dbc;
        $idcat = $idcat;
        $q = $dbc->query("SELECT * FROM `cat` WHERE id='$idcat' LIMIT 1");
        $res = $dbc->fetch($q);
        $cat = $res['name'];
        return $cat;
    }
    function setsubcat($subcat)
    {
        global $dbc;
        $name = $subcat;
        $q = $dbc->query("SELECT * FROM `subcat` WHERE name='$name' LIMIT 1");
        $res = $dbc->fetch($q);
        $id = $res['id'];
        $sub = $res['subcatid'];
        return $id;
    }
    function getsubcat($idsubcat){
        global $dbc;
        $idsubcat = $idsubcat;
        $q = $dbc->query("SELECT * FROM `subcat` WHERE id='$idsubcat' LIMIT 1");
        $res = $dbc->fetch($q);
        $subcat = $res['name'];
        return $subcat;
    }
    function getpost($id)
    {
        global $dbc;

        $q = $dbc->query("SELECT * FROM `content` WHERE `id`=$id LIMIT 1");
        while ($res = $dbc->fetch($q))
        {
            $pstcnt = array(
                'title' => safe($res['title'], 1),
                'minicontent' => safe($res['minicontent'],1),
                'fullcontent' => safe($res['fullcontent'], 1),
                'tag' => safe($res['tag'], 1),
                'cat' => safe($res['cat'], 1),
                'subcat' => safe($res['subcat'], 1),
                'datetime' => $res['datetime'],
                );

        }
        return $pstcnt;
    }


    function showallpost()
    {

        global $dbc;
        $q = $dbc->query("SELECT * FROM `content` ORDER BY `id` DESC");
        while ($res = $dbc->fetch($q))
        {
            $document[] = $res;
        }

        return $document;
    }
    function update($id,$title, $minicontent, $fullcontent, $author, $tag, $cat, $subcat,
        $datetime)
    {
        global $dbc;
        $q = $dbc->query("UPDATE `content` SET  title='$title',minicontent='$minicontent',fullcontent='$fullcontent',cat='$cat',subcat='$subcat',tag='$tag',author='$author',datetime='$datetime' WHERE id='$id'");
        echo('Done...!');
    }
}

?>