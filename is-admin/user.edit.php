<?php

/**
 * @author Sadegh Mahdilou
 * @copyright November 2016 
 * @since 0.10.2
 * @version 0.2.0 Beta
 *
 */
?>


<?php $title = 'Edit User'; ?>

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
	if ($mission == 'add_new_user') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email =  $_POST['email'];

		if($mu->add_new_user($username,$password,$email)){
			$message_system = "$username added.";
		}
		else {
			$message_system = "wrong";
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

			<form action="" method="POST">
				<div class="row head-title">

					<div class="col-md-6 big-title">
						<h3> Edit User </h3> 
					</div>
					<div class="col-md-6 add-new-part">
						<input type="hidden" name="mission" value="add_new_user">
						<input class="btn btn-success" type="submit" name="add_new_user" value="submit">
					</div>	
				</div>

				<div class="row">
					<div class="col-md-6">
						<div>
							<label>username:</label>
							<input class="form-control" type="text" name="username" required>
						</div>
						<div>
							<label>Password:</label>
							<input class="form-control" type="password" name="password" required>
						</div>
						<div>
							<label>Email:</label>
							<input class="form-control" type="email" name="email" required>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>



	<?php include('footer.php'); ?>