<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since October 2013
 * @version 0.1.1 Beta
 */

session_start();
require_once ('../is-include/config.php');
require_once ('../is-include/post-class.php');
require ('../is-include/function.php');
require ('../is-include/jdf.php');

$pst = new post();
if (!($_SESSION['username']))
{
    header('location: metalogin.php');
}

if(isset($_GET['mission']))
{
    $mission = safe($_GET['mission'],1);
    $title = safe($_POST['title'],1); 
    $minicontent = safe($_POST['minicontent'],1);
    $fullcontent = safe($_POST['fullcontent'],1);
    $author = safe($_SESSION['username'],1);
    $tag = safe($_POST['tag'],1);
    $cat = safe($_POST['cat'],1);
    $subcat = safe($_POST['subcat'],1);
    $datetime = time();
    if($mission == 'send')
    {
        $pst->sendpost($title,$minicontent,$fullcontent,$author,$tag,$cat,$subcat,$datetime);
        header('location: index.php');
    } 
}
?>

<html>
<head>

<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" />
<!-- TinyMCE -->
<script type="text/javascript" src="/is-include/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>
<!-- /TinyMCE -->
</head>
<body>
<div id="maindiv"> 
<!-- Begin header bar  -->
<?php include ('headerbar.php'); ?>
<!-- End header bar  -->
<!-- Begin menu part -->
<div id="menuleft"> 
<?php include ('menuleft.php'); ?>
</div>
<!-- End menu part -->


<!-- Begin Form -->
<div id="maincenter-post">
<form action="post.php?mission=send" method="POST" style="width: 100%;">
<p><label> Title : </label><input name="title" type="text" id="textinput"/></p>
<!-- Begin Get cat -->
<p><span> <label>Category : </label><select name="cat">
<option></option>
<?php

$q = $dbc->query("SELECT * FROM `cat`");
while ($res = $dbc->fetch($q))
{
    echo ('<option>' . $res['name'] . '</option>');
}

?>
</select> </span> 
<span> <label> Sub Category :  </label>
<select name="subcat">
<option></option>
<?php

$q = $dbc->query("SELECT * FROM `subcat`");
while ($res = $dbc->fetch($q))
{
    echo ('<option>' . $res['name'] . '</option>');
}

?>
</select></span></p>
<!-- End Get cat -->
<label> Mini Content : </label>
<textarea name="minicontent" style="height: 500px;"></textarea>
<label> Full Content : </label>
<textarea name="fullcontent" style="height: 500px;"></textarea>
<p><label> Tag : </label> <input type="text" name="tag" id="textinput" /></p>
<p> <input type="submit" /> </p>
</form>
<!-- End Form -->
</div>
</div>
<!-- Begin footer part -->
<div id="footer"> Powered By <a href="http://iransoftco.ir" target="_blank"> samcms </a> .  </div>
<!-- End footer part -->
</body>
</html>