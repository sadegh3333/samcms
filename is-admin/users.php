<?php

/**
 * @author Sadegh Mahdilou
 * @copyright November 2016
 * @since 0.7.2
 * @version 0.7.0 Beta
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
if (isset($_POST['mission'])){
	if ($_POST['mission'] == 'remove-user') {
		
		$id = $_POST['id'];
		$username = $_POST['username'];

		if ($id != 1) {
			$mu->remove_single_user($id,$username);
		}

	}
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
							<li class="col-md-4">Name</li>
							<li class="col-md-2">Email</li>
							<li class="col-md-2">Role</li>
							<li class="col-md-2">Actions</li>
						</ul>
					</div>
				</div>
				<?php 
				if (!empty($user_list)):
					foreach ($user_list as $key):
						?>
					<div class="title_document">
						<ul>
							<li class="col-md-4"><?php echo $key['name'].' '.$key['lastname']; ?></li>
							<li class="col-md-2"><?php echo $key['email']; ?></li>
							<li class="col-md-2"><?php echo $mu->get_user_role($key['username']); ?></li>
							<li class="col-md-4 action">
								<form action="user.edit.php" method="POST">
									<input type="hidden" name="mission" value="goto-edit-user">
									<input type="hidden" name="id" value="<?php echo $key['id']; ?>">
									<input type="hidden" name="username" value="<?php echo $key['username']; ?>">
									<input type="hidden" name="email" value="<?php echo $key['email']; ?>">
									<input type="hidden" name="name" value="<?php echo $key['name']; ?>">
									<input type="hidden" name="lastname" value="<?php echo $key['lastname']; ?>">
									<input type="submit" name="edit-user" value="Edit" class="btn" >
								</form>

								<?php if ($key['id'] != 1): ?>

									<form action="" method="POST">
										<input type="hidden" name="mission" value="remove-user">
										<input type="hidden" name="id" value="<?php echo $key['id']; ?>">
										<input type="hidden" name="username" value="<?php echo $key['username']; ?>">
										<input type="submit" name="remove-user" value="Remove" class="btn btn-danger">
									</form>
								<?php endif ?>
							</li>

						</ul>
					</div>
				<?php endforeach; endif; ?>
			</div>
		</div>
	</div>



	<?php include('footer.php'); ?>