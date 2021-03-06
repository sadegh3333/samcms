<?php

/**
 * @author Sadegh Mahdilou
 * @copyright January 2013 - 2016 November
 * @since 0.2.0
 * @version 0.7.0 Beta
 *
 */

?>

<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li>
			<a href="<?php echo Root.'/is-admin'; ?>"><i class="fa fa-tachometer"></i>Dashboard</a>
		</li>
		<li>
			<a href="<?php echo Root.'/is-admin/showallpost.php'; ?>"><i class="fa fa-archive"></i> Posts</a>
			<ul>
				<li>
					<a href="<?php echo Root.'/is-admin/post.php'; ?>"><i class="fa fa-plus-square"></i>Add post</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="<?php echo Root.'/is-admin/category.php'; ?>"><i class="fa fa-briefcase"></i>Category</a>
		</li>
		<li>
			<a href="<?php echo Root.'/is-admin/plugin.php'; ?>"><i class="fa fa-plus-circle"></i>Plugins</a>
		</li>
		<li>
			<a href="<?php echo Root.'/is-admin/users.php'; ?>"><i class="fa fa-user"></i>Users</a>
		</li>
	</ul>
</div>