<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since January 2013 - 2015 December 
 * @version 0.6.0 Beta
 */


?>

<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li>
			<a href="<?php echo $Root.'/is-admin'; ?>">Dashboard</a>
		</li>
		<li>
			<a href="<?php echo $Root.'/is-admin/showallpost.php'; ?>">Posts</a>
			<ul>
				<li>
					<a href="<?php echo $Root.'/is-admin/post.php'; ?>">Add post</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="<?php echo $Root.'/is-admin/cat.php'; ?>">Category</a>
		</li>
	</ul>
</div>