<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since October 2013 - 2015 December
 * @version 0.0.5 Beta
 */
?>

<?php $title = 'Dashboard'; ?>

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

	</div>
</div>



<?php include('footer.php'); ?>