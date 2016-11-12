<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since October 2013 - 2015 December
 * @version 0.5.0 Beta
 */
?>

<?php $title = 'Edit post '; ?>

<?php include ('header.php'); ?>

<?php 
$mu = new user();
if ($mu->check_user_stat() == 'logedout') {
    header('Location: metalogin.php');
}

$cat = new category();
?>


<div class="row">
    <div class="col-xs-2 sidebar">
        <?php include ('sidebar.php'); ?>
    </div>
    <div class="col-xs-10 col-xs-offset-2">

        <?php

        $pst = new document();
        $id = $_GET['id'];
        if (isset($_POST['mission']))
        {
            $mission = safe($_POST['mission'], 1);
            $title = safe($_POST['title'], 1);
            $content = safe($_POST['content'],1);
            $author = safe($_SESSION['username'], 1);
            $tag = safe($_POST['tag'], 1);
            $category = safe($_POST['category'], 1);
            $datetime = time();
            if ($mission == 'update')
            {
                $pst->update($id,$title, $content, $author, $tag, $category,$datetime);
                header('location: index.php');
            }
        }
        $getpost = $pst->getpost($id);

        ?>


        <!-- TinyMCE -->
        <script type="text/javascript" src="../is-include/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({  selector: "textarea"  });
        </script>
        <!-- /TinyMCE -->



        <!-- Begin Form -->
        <div class="edit-box">
            <h3 class="title">Edit document </h3>
            <form action="edit-post.php?id=<?php echo($id); ?>" method="POST">
                <input hidden="" value="<?php echo($id); ?>" name="id" />
                <input  name="mission" value="update" hidden="" /> 
                <div>
                    <label class="label-input"> Title: </label>
                    <input  class="form-control" value="<?php echo ($getpost['title']); ?>" name="title" type="text"/>
                </div>
                <!-- Begin Get cat -->
                <div>
                   <label class="label-input">Category: </label>
                   <select class="form-control" name='category'>
                       <?php $this_category = $cat->get_single_category($getpost['category']);  ?>
                       <option value="0" >
                           <?php if ($this_category == 0){ ?>
                            <?php echo 'this is not category'; ?>
                           <?php }else{ ?>
                           <?php echo $this_category['title']; ?>
                       <?php } ?>
                       </option>
                       <?php 
                       $getcat = $cat->get_all_category();
                       foreach ($getcat as $key) {
                        echo "<option value=".$key[id].">";
                        echo $key['title'];
                        echo "</option>";
                    }

                    ?>

                </select>
            </div>
            <!-- End Get cat -->
            <label class="label-input"> Content: </label>
            <textarea name="content"> 
                <?php echo safe($getpost['content'],1); ?> 
            </textarea>
            <div>
                <label class="label-input"> Tag: </label>
                <input class="form-control" type="text" name="tag" value="<?php echo ($getpost['tag']); ?>" />
            </div>
            <div class="divsubmit"> 
                <input class="btn btn-success" type="submit" />
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>




</div>
</div>



<?php include('footer.php'); ?>