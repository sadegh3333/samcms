<?php

/**
 * @author Sadegh Mahdilou
 * @copyright November 2016
 * @since 0.7.2
 * @version 0.2.0 Beta
 *
 */

?>




<?php $title = 'Users'; ?>

<?php include ('header.php'); ?>

<?php 
$mu = new user();
if ($mu->check_user_stat() == 'logedout') {
	header('Location: metalogin.php');
}
$cat = new category();
?>

<div class="row">
	<div class="col-xs-2 sidebar">
		<?php include ('sidebar.php'); ?>
	</div>
	<div class="col-xs-10 col-xs-offset-2"> 
		<div class="edit-box">
			<h3 class="title"> Users Management  </h3> 
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