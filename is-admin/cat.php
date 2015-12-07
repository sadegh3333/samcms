<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since  October 2013 - 2015 December 
 * @version 0.2.0 Beta
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
	<div class="col-xs-3 sidebar">
		<?php include ('sidebar.php'); ?>
	</div>
	<div class="col-xs-9 col-xs-offset-3">


		<!-- Begin part maincenter -->
		<div id="maincenter-cat">
			<p><strong>You can make category :</strong></p>
			<div id="formcat">
				<p><strong> Category available : </strong></p>  
				<!-- start part show all item in category -->
				<?php
				$query = $dbc->query("SELECT * FROM `cat`"); 
				while ($getcat = $dbc->fetch($query)) {
					echo ('<p>' . $getcat['name'] . '</p>');
				}
				?>  
			</div>
			<!-- end part show all item in category -->
			<!-- Begin form category -->
			<div id="formcat">
				<form action="submitcat.php?type=cat" method="POST">
					<p><label>  name category :  </label> <input name="cat" value="" type="text" /></p>
					<input type="submit" value="Register" />
				</form>
			</div>
			<!-- End form category -->
			<!-- Begin form sub category -->
			<div id="formcat">
				<form action="submitcat.php?type=subcat" method="POST" >
					<div> You can make sub category : </div>
					<div>
						<?php
						$query1 = $dbc->query("SELECT * FROM `subcat`");

						while ($getsubcat =$dbc->fetch($query1)) {
							echo ('<p>'.$getsubcat['name'].'</p>');
						}
						$query = $dbc->query("SELECT * FROM `cat`");
						echo ('<p> <span> Please Select your category </span> <select name="cat" ><option></option>');
						while ($getcat =$dbc->fetch($query)) {
							echo (' <option  value="' . $getcat['id'] . '" >' . $getcat['name'] . '</option>');
							$cat = $getcat['name'];
						}
						echo ('</select></p>');
						?>
					</p></div>
					<div><span> Name sub Category :  </span> <input type="text" name="subcat" /></div>
					<input id="btn" type="submit" value="Add sub categoey" /></div>
				</form>
			</div>
			<!-- End form sub category --> 
		</div>
		<!-- end part maincenter -->




	</div>
</div>



<?php include('footer.php'); ?>
