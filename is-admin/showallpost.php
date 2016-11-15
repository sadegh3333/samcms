<?php

/**
 * @author Sadegh Mahdilou
 * @copyright October 2013 - 2016 November
 * @since 0.2.0
 * @version 0.5.0 Beta
 *
 */

?>


<?php $title = 'Posts'; ?>

<?php include ('header.php'); ?>

<?php 
$mu = new user();
add_default_cap_to_user();

global $user_info;

if ($mu->check_user_stat() == 'logedout' || $mu->user_can_be($user_info['username'] , 'posts') ) {
	$message_system = 'You can not access to Posts page !';
	session_destroy();
	header("Location: metalogin.php?message_system=$message_system");
}
$cat = new category();

$sap = new document();
$show = $sap->showallpost();

?>


<?php
if (isset($_POST['mission'])){
	if ($_POST['mission'] == 'remove-post') {
		
		$id = $_POST['id'];

		if ($id != 1) {
			if ($sap->remove_single_post($id)){
				header('Location: showallpost.php');
			}
		}

	}
}
?>

<div class="row">
	<div class="col-xs-2 sidebar">
		<?php include ('sidebar.php'); ?>
	</div>
	<div class="col-xs-10 col-xs-offset-2"> 
		<div class="edit-box">
			<h3 class="title"> All Document </h3> 
			<div class="row">
				<div class="title_document_header">
					<ul>
						<li class="col-md-5">Title</li>
						<li class="col-md-2">Category</li>
						<li class="col-md-1">Author</li>
						<li class="col-md-1">Date</li>
						<li class="col-md-3 center">Functions</li>
					</ul>
				</div>
				<?php 
				if (!empty($show)):
					foreach ($show as $key):
						?>
					<div class="title_document">
						<ul>
							<li class="col-md-5">  <a href="../is-admin/edit-post.php?id=<?php echo $key['id']; ?>">  <?php echo $key['title']; ?> <a> </li>
							<li class="col-md-2"> <?php echo $cat->get_single_category(($key['category']))['title']; ?> </li>
							<li class="col-md-1"><?php echo $key['author']; ?></li>
							<li class="col-md-1"><?php echo date('Y/m/d',$key['datetime']); ?></li>
							<li class="col-md-3 right">
								<a class="btn btn-info" href="../is-admin/edit-post.php?id=<?php echo $key['id']; ?>"> Edit </a>
								<a  class="btn btn-success" href="<?php echo Root; ?>/?id=<?php echo $key['id']; ?>">View</a>
								<form action="" method="POST">
									<input type="hidden" name="mission" value="remove-post">
									<input type="hidden" name="id" value="<?php echo $key['id']; ?>">
									<input type="submit" name="submit" value="Remove" class="btn btn-danger">
								</form>
							</li>
						</ul>
					</div>
				<?php endforeach; endif; ?>
			</div>
		</div>
	</div>



	<?php include('footer.php'); ?>