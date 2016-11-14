<?php

/**
 * @author Sadegh Mahdilou
 * @copyright November 2016
 * @since 0.7.2
 * @version 0.4.0 Beta
 *
 */

?>




<?php $title = 'Users'; ?>

<?php include ('header.php'); ?>

<?php 
$mu = new user();

add_default_cap_to_user();

global $user_info;

if ($mu->check_user_stat() == 'logedout' || $mu->user_can_be($user_info['username'] , 'users') ) {
	$message_system = 'You can not access to Users page !';
	session_destroy();
	header("Location: metalogin.php?message_system=$message_system");
}
$cat = new category();
?>



<?php 

if (isset($_POST['mission'])) {
	$mission = $_POST['mission'];

}


?>
<div class="row">
	<div class="col-md-2 sidebar">
		<?php include ('sidebar.php'); ?>
	</div>
	<div class="col-md-10"> 
		<div class="edit-box">
			<div class="row head-title">

				<div class="col-md-6 big-title">
					<h3"> Users Management  </h3> 
				</div>
				<div class="col-md-6 add-new-part">
					<form action="" method="POST">
						<input type="hidden" name="mission" value="add_new_user">
						<input class="btn btn-success" type="submit" name="add_new_user" value="Add New">
					</form>
				</div>	
			</div>

			<?php
			$user_list = $mu->get_all_user_list();
			?>
			<div class="row">
				<div class="title_document_header">
					<ul>
						<li class="col-md-3">Name</li>
						<li class="col-md-3">Email</li>
						<li class="col-md-3">Role</li>
					</ul>
				</div>
				<?php 
				if (!empty($user_list)):
					foreach ($user_list as $key):
						?>
					<div class="title_document">
						<ul>
							<li class="col-md-3"><?php echo $key['name'].' '.$key['lastname']; ?></li>
							<li class="col-md-3"><?php echo $key['email']; ?></li>
							<li class="col-md-3"><?php echo $mu->get_user_role($key['id']); ?></li>
						</ul>
					</div>
				<?php endforeach; endif; ?>
			</div>
		</div>
	</div>



	<?php include('footer.php'); ?>