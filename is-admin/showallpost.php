<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2013
 * @since October 2013 - 2015 December
 * @version 0.4.0 Beta
 */

?>


<?php $title = 'Posts'; ?>

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
			<h3 class="title"> All Document </h3> 
			<?php
			$sap = new post();
			$show = $sap->showallpost();
print_r($show);
			?>
			<div class="row">
				<div class="title_document_header">
					<ul>
						<li class="col-xs-5">Title</li>
						<li class="col-xs-2">Category</li>
						<li class="col-xs-2">Author</li>
						<li class="col-xs-2">Date</li>
						<li class="col-xs-1">Functions</li>
					</ul>
				</div>
				<?php 
				if (!empty($show)):
					foreach ($show as $key):
						?>
					<div class="title_document">
						<ul>
							<li class="col-xs-5">  <a href="../is-admin/edit-post.php?id=<?php echo $key['id']; ?>">  <?php echo $key['title']; ?> <a> </li>
							<li class="col-xs-2"> <?php echo $cat->get_single_category(($key['category']))['title']; ?> </li>
							<li class="col-xs-2"><?php echo $key['author']; ?></li>
							<li class="col-xs-2"><?php echo date('Y/m/d',$key['datetime']); ?></li>
							<li class="col-xs-1"> <a href="../is-admin/edit-post.php?id=<?php echo $key['id']; ?>"> Edit </a> | <a href="<?php echo Root; ?>/?id=<?php echo $key['id']; ?>">View</a></li>
						</ul>
					</div>
				<?php endforeach; endif; ?>
			</div>
		</div>
	</div>



	<?php include('footer.php'); ?>