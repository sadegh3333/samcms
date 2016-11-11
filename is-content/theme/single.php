<?php include('header.php') ?>

<?php 
	
	$post_id = $_GET['id'];

?>

<div class="container-fluid  main-page">

	<div class="container">
		<div class="col-md-12 welcome">
		<?php 

		$get_post = $pst->getpost($post_id);

		?>


		<div class="title">
			<?php echo $get_post['title']; ?>
		</div>
		<div class="content">
			<?php echo htmlspecialchars_decode($get_post['content']); ?>
		</div>
		</div>
	</div>
	
</div>



<?php include('footer.php'); ?>