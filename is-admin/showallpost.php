<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since October 2013 - 2015 December
 * @version 0.2.0 Beta
 */

?>




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
		<div id="maincenter-post"> 
			<div id="formcat" dir="rtl">
				<p><strong> نمایش تمام پست های ارسال شده : </strong></p> 
				<?php

				$sap = new post();
				$show = $sap->showallpost();
				?>
			</div>
		</div>
	</div>
</div>



<?php include('footer.php'); ?>
