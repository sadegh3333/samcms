<?php
/**
 * @author Sadegh Mahdilou
 * @copyright 2016 
 * @since 2016 May
 * @version 0.1.0
 */

?>
<?php $title = 'Register'; ?>
<?php include('header.php'); ?>

<div class="row">
	<div class="form-login">
		<div>
			<form action="new-user.php" method="POST">
				<h4 class="login-footer">if you have account,<a href="<?php echo 'metalogin.php'; ?>">login</a></h4>
				<div>
					<div>
						<label for="user-box">Username:</label>
						<input dir="ltr" id="user-box" class="form-control input-box" name="username" type="text">
					</div>
					
					<div>
					<label for="user-box">Email:</label>
						<input dir="ltr" id="user-box" class="form-control input-box" name="email" type="text">
					</div>
					<div>
						<label for="pass-box">Password:</label>
						<input dir="ltr" id="pass-box" class="form-control input-box" name="password"type="password" autocomplete="off">
					</div>

					<div>
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Register"/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php include('footer.php'); ?>