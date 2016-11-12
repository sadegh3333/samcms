<!DOCTYPE html>
<html>
<head>
	<?php if (isset($title)): ?>
		<title><?php echo $title; ?></title>
	<?php else: ?>
		<title>samcms -- Content Managment System</title>
	<?php endif; ?>
	<?php $template->load_bootstarp(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $template->get_template_directory(); ?>style.css">
</head>
<body>

	<div  class="header-bar navbar navbar-inverse navbar-fixed-top" >  
		<div class="container-fluid">
			<?php if ($mu->check_user_stat() == 'logedin'): ?>
				<ul class="nav navbar-nav navbar-left">
					<li>
						<label class="label-header"> Welcome <?php echo $_SESSION['username']; ?></label>
					</li>
					<li>
						<a class="btn" href="<?php echo Root; ?>">
							Home
						</a>
					</li>					
					<li>
						<a class="btn" href="<?php echo Root; ?>/is-admin">
							Admin Panel
						</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right ">
					<li>
						<a class="btn" href="<?php echo Root; ?>/is-admin/login.php?action=logout"><i class="fa fa-power-off"></i> Logout </a>
					</li>
				</ul>
			<?php else: ?>
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a class="btn" href="<?php echo Root; ?>">
							Home
						</a>
					</li>					
					<li>
						<a class="btn" href="<?php echo Root; ?>/is-admin">
							Admin Panel
						</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="right">
						<a class="btn" href="">Sign Up</a>
					</li>
				</ul>
			<?php endif; ?>
		</div>
	</div>
