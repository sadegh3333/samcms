<?php include('header.php') ?>

<div class="container-fluid  main-page">

	<div class="container">
		<div class="col-md-12 post">


			<div class="title">
				<h3><?php echo $get_post['title']; ?></h3>
			</div>
			<div class="details">
				<span><i class="fa fa-book"></i>  Author: <?php echo $get_post['author']; ?></span>
				|
				<span><i class="fa fa-bookmark"></i>  Date: <?php echo  date('Y.M.d',$get_post['datetime']); ?></span>
				|
				<span><i class="fa fa-briefcase"></i> Category: <?php echo $cat->get_single_category($get_post['category'])['title']; ?></span>
			</div>
			<div class="content">
				<?php echo htmlspecialchars_decode($get_post['content']); ?>
			</div>
			<div class="tags">
				<i class="fa fa-tag"></i> <?php echo $get_post['tag']; ?>
			</div>
		</div>
	</div>
	
</div>


<?php include('footer.php'); ?>