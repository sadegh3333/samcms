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

if(isset($_POST['mission-0'])){
	if ($_POST['mission-0'] == 'edit-user') {

		if (isset($_POST['id'])) {
			$id = $_POST['id'];
		}
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
		}
		if (isset($_POST['password'])) {
			$password = sha1($_POST['password']);
		}		
		if (isset($_POST['email'])) {
			$email =  $_POST['email'];
		}
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		if (isset($_POST['lastname'])) {
			$lastname = $_POST['lastname'];
		}


		if($mu->update_info_user($id ,$username ,$password ,$email ,$name ,$lastname )){
			$message_system = "$username information is changed.";
		}
		else {
			$message_system = "wrong";
		}
	}
}



?>

<?php 

if (isset($_POST['mission']) || isset($_POST['mission-0'])):
/*	if ($_POST['mission'] == 'goto-edit-user' || $_POST['mission-0'] == 'edit-user'):*/

		if (isset($_POST['id'])) {
			$id = $_POST['id'];
		}		
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
		}	
		if (isset($_POST['email'])) {
			$email =  $_POST['email'];
		}
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		if (isset($_POST['lastname'])) {
			$lastname = $_POST['lastname'];
		}
		?>

		<div class="row">
			<div class="col-md-2 sidebar">
				<?php include ('sidebar.php'); ?>
			</div>
			<div class="col-md-10"> 
				<div class="edit-box">

					<div class="msg-sys">
						<?php 
						if (!empty($message_system)) {
							echo $message_system;
						}
						?>
					</div>
					<form action="" method="POST">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="mission-0" value="edit-user">

						<div class="row head-title">
							<div class="col-md-6 big-title">
								<h3> Edit User </h3> 
							</div>
							<div class="col-md-6 add-new-part">
								<input class="btn btn-success" type="submit" name="add_new_user" value="submit">
							</div>	
						</div>


						<div class="row">
							<div class="col-md-6">
								<div>
									<label>username:</label>
									<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
								</div>
								<div>
									<label>Password:</label>
									<input class="form-control" type="password" name="password" required>
								</div>
								<div>
									<label>Email:</label>
									<input class="form-control" type="email" name="email" value="<?php echo $email; ?>" required>
								</div>
								<div> 
									<label>Name:</label>
									<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
								</div>
								<div>
									<label>LastName:</label>
									<input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<?php 
			endif;

			?>

			<?php include('footer.php'); ?>