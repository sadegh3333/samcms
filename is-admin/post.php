<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since October 2013 - 2015 December
 * @version 0.2.0 Beta
 */

?>
<?php $title = 'New post'; ?>
<?php include ('header.php'); ?>

<?php 
$mu = new user();
if ($mu->check_user_stat() == 'logedout') {
    header('Location: metalogin.php');
}

$pst = new post();

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


<div class="row">
    <div class="col-xs-3 sidebar">
        <?php include ('sidebar.php'); ?>
    </div>
    <div class="col-xs-9 col-xs-offset-3">


        <!-- TinyMCE -->
        <script type="text/javascript" src="../is-include/tinymce/tinymce.min.js"></script>
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




    </div>
</div>



<?php include('footer.php'); ?>