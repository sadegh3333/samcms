<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015
 * @since January 2013-2015 December
 * @version 0.6.1
 */

?>
<?php 
session_start();


require_once('../config.php');
require_once('../is-include/samengine.php');
require('../is-include/class.user.php');
require('../is-include/class.document.php');
require('../is-include/class.category.php');
require('../is-include/class.plugin.php');

$plugins = new plugin_api();

$mu = new user();
?>

<html>
<head>
	<meta  charset='utf-8'>
	<title> <?php echo $title.' -- samcms '; ?> </title>
	<?php Get_bootstarp(); ?>
	<link href='style.css' rel='stylesheet' type='text/css'>
</head>
<body>
	<div  class="header-bar navbar navbar-inverse navbar-fixed-top" >  
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-left ">
				<?php if ($mu->check_user_stat() == 'logedin'): ?>
					<li>
						<label class="label-header"> Welcome <?php echo $_SESSION['username']; ?></label>
					</li>
					<li>
						<a class="btn" href="<?php echo Root; ?>">
							Home
						</a>
					</li>
					<li>
						<?php do_hook('hello_hook');?>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a class="btn" href="login.php?action=logout"><i class="fa fa-power-off"></i> Logout </a>
					</li>
				</ul>
			<?php else: ?>
				<li>
					<a class="btn" href="<?php echo Root; ?>">
						Home
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
<div class="container-fluid">

