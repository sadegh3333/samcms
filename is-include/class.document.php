<?php


/**
 * @author Sadegh Mahdilou
 * @copyright October 2013 - 2016 November
 * @since 0.2.0
 * @version 0.6.0 Beta
 *
 */


class document
{
    var $pstcnt;

    /**
    *   Submit New Document to Table Document
    *
    *   @Since 0.2.0
    */
    public function submit_document($title, $content, $category ,$tag ,$author , $datetime ){
        global $dbc;
        
        if($dbc->query("INSERT INTO `document` (`id`, `title`, `content`, `category`, `tag`, `author`, `datetime`) 
            VALUES (`id`,'$title','$content','$category','$tag','$author','$datetime');"))
        {
            return true;
        }
        else {
            return false;
        }
        
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


    /**
    *   Remove single post 
    *
    *   @Since 0.12.1
    */
    public function remove_single_post($id){
        global $dbc;

        if ($dbc->query("DELETE FROM `document` WHERE `id`='$id'")) {
            return true;
        }
        else {
            return false;
        }
    }
}

?>