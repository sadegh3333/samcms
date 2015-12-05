<?php
/**
 * @author Sadegh Mahdilou
 * @copyright 2015  Dec
 * @since 2013-2015
 * @version 0.7.0
 */

?>
<?php include('header.php'); ?>

<div class="row">
	<div class="form-login">
		<div>
			<form action="login.php?action=login" method="POST">
				<div>
					<div>
						<label for="user-box">Username:</label>
						<input dir="ltr" id="user-box" class="form-control input-box" name="username" type="text">
					</div>
					<div>
						<label for="pass-box">Password:</label>
						<input dir="ltr" id="pass-box" class="form-control input-box" name="password"type="password" autocomplete="off">
					</div>

					<div class="checkbox">
						<label>
							<input type="checkbox" value="remember-me"> Remember me
						</label>
					</div>
					<div>
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Login"/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php include('footer.php'); ?>