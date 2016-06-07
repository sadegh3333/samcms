<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since January 2013 - 2015 December 
 * @version 0.6.1 Beta
 */


?>

<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li>
			<a href="<?php echo $Root.'/is-admin'; ?>"><i class="fa fa-tachometer"></i>Dashboard</a>
		</li>
		<li>
			<a href="<?php echo $Root.'/is-admin/showallpost.php'; ?>"><i class="fa fa-archive"></i> Posts</a>
			<ul>
				<li>
					<a href="<?php echo $Root.'/is-admin/post.php'; ?>"><i class="fa fa-plus-square"></i>Add post</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="<?php echo $Root.'/is-admin/category.php'; ?>"><i class="fa fa-briefcase"></i>Category</a>
		</li>
	</ul>
</div>