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
add_default_cap_to_user();

global $user_info;

if ($mu->check_user_stat() == 'logedout' || $mu->user_can_be($user_info['username'] , 'dashboard') ) {
	$message_system = 'You can not access to Dashboard page !';
	session_destroy();
	header('Location: metalogin.php?message_system=You can not access to this page');
}
?>


<div class="row">
	<div class="col-xs-2 sidebar">
		<?php include ('sidebar.php'); ?>
	</div>
	<div class="col-xs-10 col-xs-offset-2">

	</div>
</div>



<?php include('footer.php'); ?>