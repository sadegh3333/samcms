<?php

/**
 * @author Sadegh Mahdilou
 * @copyright November 2016
 * @since 0.7.2
 * @version 0.6.0 Beta
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


<div class="row">
	<div class="col-md-2 sidebar">
		<?php include ('sidebar.php'); ?>
	</div>
	<div class="col-md-10"> 
		<div class="edit-box">
			<div class="row head-title">

				<div class="col-md-6 big-title">
					<h3> Users Management  </h3> 
				</div>
				<div class="col-md-6 add-new-part">
					<a href="user.new.php" class="btn btn-success"> Add New </a> 
				</div>	
			</div>

			<?php
			$user_list = $mu->get_all_user_list();
			?>
			<div class="row">
				<div class="col-md-12">
					<div class="title_document_header">
						<ul>
							<li class="col-md-3">Name</li>
							<li class="col-md-3">Email</li>
							<li class="col-md-3">Role</li>
						</ul>
					</div>
				</div>
				<?php 
				if (!empty($user_list)):
					foreach ($user_list as $key):
						?>
					<div class="title_document">
						<ul>
							<li class="col-md-3"><?php echo $key['name'].' '.$key['lastname']; ?></li>
							<li class="col-md-3"><?php echo $key['email']; ?></li>
							<li class="col-md-3"><?php echo $mu->get_user_role($key['username']); ?></li>
							<form action="user.edit.php" method="POST">
								<li class="col-md-3">
									<input type="hidden" name="mission" value="goto-edit-user">
									<input type="hidden" name="id" value="<?php echo $key['id']; ?>">
									<input type="hidden" name="username" value="<?php echo $key['username']; ?>">
									<input type="hidden" name="email" value="<?php echo $key['email']; ?>">
									<input type="hidden" name="name" value="<?php echo $key['name']; ?>">
									<input type="hidden" name="lastname" value="<?php echo $key['lastname']; ?>">


									<input type="submit" name="edit-user" value="Edit" class="btn" >
								</li>
							</form>
						</ul>
					</div>
				<?php endforeach; endif; ?>
			</div>
		</div>
	</div>



	<?php include('footer.php'); ?>