<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since October 2013 - 2015 December
 * @version 0.6.2 Beta
 */

?>
<?php $title = 'New post'; ?>
<?php include ('header.php'); ?>

<?php 
$mu = new user();
add_default_cap_to_user();

global $user_info;

if ($mu->check_user_stat() == 'logedout' || $mu->user_can_be($user_info['username'] , 'posts') ) {
    $message_system = 'You can not access to Posts page !';
    session_destroy();
    header("Location: metalogin.php?message_system=$message_system");
}

$cat = new category();

$pst = new document();

if(isset($_POST['mission'])){
    if ($_POST['mission'] == 'add-new-post') {
        $title = safe($_POST['title'],1); 
        $content = safe($_POST['content'],1);
        $author = safe($_SESSION['username'],1);
        $tag = safe($_POST['tag'],1);
        $category = safe($_POST['category'],1);
        $datetime = time();

        if($pst->submit_document($title,$content,$category,$tag,$author,$datetime)){

            header('location: showallpost.php');
        }
        else {
            echo $title . $content . $author . $tag . $category ;
            echo "Wrong";
        }
    } 
}
?>


<div class="row">
    <div class="col-md-2 sidebar">
        <?php include ('sidebar.php'); ?>
    </div>
    <div class="col-md-10">


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
            <form action="post.php" method="POST">
                <input type="hidden" name="mission" value="add-new-post">
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
            <label class="label-input"> Content: </label>
            <textarea class="form-control"  name="content" style="height: 500px;"></textarea>
            <p><label class="label-input"> Tag: </label> <input class="form-control" type="text" name="tag" id="textinput" /></p>
            <p> <input class="btn btn-success" type="submit" /> </p>
        </form>
        <!-- End Form -->
    </div>
</div>




</div>
</div>



<?php include('footer.php'); ?>