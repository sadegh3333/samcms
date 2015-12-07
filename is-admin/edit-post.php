<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since October 2013 - 2015 December
 * @version 0.3.0 Beta
 */
?>

<?php $title = 'Edit post '; ?>

<?php include ('header.php'); ?>

<?php 
$mu = new user();
if ($mu->check_user_stat() == 'logedout') {
    header('Location: metalogin.php');
}
?>


<div class="row">
    <div class="col-xs-3 sidebar">
        <?php include ('sidebar.php'); ?>
    </div>
    <div class="col-xs-9 col-xs-offset-3">

        <?php

        $pst = new post();
        $id = $_GET['id'];
        if (isset($_POST['mission']))
        {
            $mission = safe($_POST['mission'], 1);
            $title_document = safe($_POST['title'], 1);
            $minicontent = safe($_POST['minicontent'],1);
            $fullcontent = safe($_POST['fullcontent'], 1);
            $author = safe($_SESSION['username'], 1);
            $tag = safe($_POST['tag'], 1);
            $cat = safe($_POST['cat'], 1);
            $subcat = safe($_POST['subcat'], 1);
            $datetime = time();
            if ($mission == 'update')
            {
                $pst->update($id,$title_document, $minicontent, $fullcontent, $author, $tag, $cat, $subcat,
                    $datetime);
                header('location: index.php');
            }
        }
        $getpost = $pst->getpost($id);

        ?>


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
                {title_document: 'Test template 1', content: 'Test 1'},
                {title_document: 'Test template 2', content: 'Test 2'}
                ]
            });
        </script>
        <!-- /TinyMCE -->



        <!-- Begin Form -->
        <div id="maincenter-post">
            <form action="edit-post.php?id=<?php echo($id); ?>" method="POST" style="width: 100%;">
                <input hidden="" value="<?php echo($id); ?>" name="id" />
                <input name="mission" value="update" hidden="" /> 
                <p><label> Title : </label><input value="<?php

                echo ($getpost['title']);

                    ?>" name="title_document" type="text"/></p>
                    <!-- Begin Get cat -->
                    <p><span> <label>Category : </label><select name="cat">
                        <option></option>
                        <?php

                        $q = $dbc->query("SELECT * FROM `cat`");
                        while ($res = $dbc->fetch($q))
                        {

                            echo ('<option value="'.$res['id'].'">' . $res['name'] . '</option>');
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
                                echo ('<option value="'.$res['id'].'">' . $res['name'] . '</option>');
                            }

                            ?>
                        </select></span></p>
                        <!-- End Get cat -->
                        <label> Mini Content : </label>
                        <textarea name="minicontent" > <?php
                            $fc = safe($getpost['minicontent'],1);
                            echo ($fc);

                            ?> </textarea>
                            <label> Full Content : </label>
                            <textarea name="fullcontent"> <?php

                                echo ($getpost['fullcontent']);

                                ?> </textarea>
                                <p><label> Tag : </label> <input type="text" name="tag" value="<?php

                                    echo ($getpost['tag']);

                                    ?>" /></p>
                                    <p> <input type="submit" /> </p>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>




                    </div>
                </div>



                <?php include('footer.php'); ?>