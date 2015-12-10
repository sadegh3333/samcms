<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since  October 2013 - 2015 December 
 * @version 0.3.0 Beta
 */
?>

<?php $title = 'Category'; ?>
<?php include ('header.php'); ?>

<?php 
$mu = new user();
if ($mu->check_user_stat() == 'logedout') {
	header('Location: metalogin.php');
}
?>


<div class="row">
	<div class="col-xs-2 sidebar">
		<?php include ('sidebar.php'); ?>
	</div>
	<div class="col-xs-10 col-xs-offset-2">


		<!-- Begin part maincenter -->
		<div class="edit-box">
			<h3 class="title">Categories</h3>
			<div class="row">
				<div class="col-xs-6">
					<h4 class="title_document_inside"> Category: </h4>  
					<!-- start part show all item in category -->
					<?php
					$query = $dbc->query("SELECT * FROM `cat`"); 
					while ($getcat = $dbc->fetch($query)) {
						echo ('<p>' . $getcat['name'] . '</p>');
					}
					?>  
					<!-- Begin form category -->
					<div >
						<form action="submitcat.php?type=cat" method="POST">
						<div><label class="label-input" >  Name category:  </label> <input class="form-control" name="cat" value="" type="text" /></div>
							<div class="divsubmit"><input class="btn btn-success"  type="submit" value="Add Category" /></div>
						</form>
					</div>
					<!-- End form category -->
				</div>
				<!-- end part show all item in category -->
				<!-- Begin form sub category -->
				<div class="col-xs-6">
					<form action="submitcat.php?type=subcat" method="POST" >
						<h4 class="title_document_inside"> Sub category: </h4>
						<div>
							<?php
							$query1 = $dbc->query("SELECT * FROM `subcat`");

							while ($getsubcat =$dbc->fetch($query1)) {
								echo ('<p>'.$getsubcat['name'].'</p>');
							}
							$query = $dbc->query("SELECT * FROM `cat`");
							echo ('<p> <label class="label-input"> Category parent: </label> <select class="form-control" name="cat" ><option></option>');
							while ($getcat =$dbc->fetch($query)) {
								echo (' <option  value="' . $getcat['id'] . '" >' . $getcat['name'] . '</option>');
								$cat = $getcat['name'];
							}
							echo ('</select></p>');
							?>
						</div>
						<div><label class="label-input"> Name sub Category :  </label> <input class="form-control" type="text" name="subcat" /></div>
						 <div class="divsubmit"><input class="btn btn-success" type="submit" value="Add sub categoey" /></div>

					</form>
				</div>
				<!-- End form sub category --> 
			</div>
		</div>
		<!-- end part maincenter -->




	</div>
</div>



<?php include('footer.php'); ?>
