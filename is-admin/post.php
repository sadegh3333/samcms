<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since October 2013 - 2015 December
 * @version 0.4.0 Beta
 */

?>
<?php $title = 'New post'; ?>
<?php include ('header.php'); ?>

<?php 
$mu = new user();
if ($mu->check_user_stat() == 'logedout') {
    header('Location: metalogin.php');
}

$cat = new category();

$pst = new post();

if(isset($_GET['mission']))
{
    $mission = safe($_GET['mission'],1);
    $title = safe($_POST['title'],1); 
    $minicontent = safe($_POST['minicontent'],1);
    $fullcontent = safe($_POST['fullcontent'],1);
    $author = safe($_SESSION['username'],1);
    $tag = safe($_POST['tag'],1);
    $category = safe($_POST['category'],1);
    $datetime = time();
    if($mission == 'send')
    {
        $pst->sendpost($title,$minicontent,$fullcontent,$author,$tag,$category,$datetime);
        header('location: index.php');
    } 
}
?>


<div class="row">
    <div class="col-xs-2 sidebar">
        <?php include ('sidebar.php'); ?>
    </div>
    <div class="col-xs-10 col-xs-offset-2">


        <!-- TinyMCE -->
        <script type="text/javascript" src="../is-include/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({ selector:'textarea' });
        </script>
        <!-- /TinyMCE -->

        <style type="text/css">

        </style>
        <!-- Begin Form -->
        <div class="edit-box">
            <h3 class="title">Add document </h3>
            <form action="post.php?mission=send" method="POST">
                <div>
                    <label class="label-input"> Title: </label>
                    <input class="form-control" name="title" type="text" autofocus />
                </div>
                <!-- Begin Get cat -->

                <label class="label-input">Category: </label>
                <select class="form-control" name='category'>
                   <option value="0" ></option>
                       <?php 
                       $getcat = $cat->get_all_category();
                       foreach ($getcat as $key) {
                        echo "<option value=".$key[id].">";
                        echo $key['title'];
                        echo "</option>";
                    }
                    ?>
                </select>

                <!-- End Get cat -->
                <label class="label-input"> Mini Content: </label>
                <textarea class="form-control" name="minicontent" style="height: 500px;"></textarea>
                <label class="label-input"> Full Content: </label>
                <textarea class="form-control"  name="fullcontent" style="height: 500px;"></textarea>
                <p><label class="label-input"> Tag: </label> <input class="form-control" type="text" name="tag" id="textinput" /></p>
                <p> <input class="btn btn-success" type="submit" /> </p>
            </form>
            <!-- End Form -->
        </div>
    </div>




</div>
</div>



<?php include('footer.php'); ?>