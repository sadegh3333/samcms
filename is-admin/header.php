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

require_once('../is-include/config.php');
require('../is-include/function.php');
require('../is-include/jdf.php');
require('../is-include/user-class.php');
require('../is-include/post-class.php');


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
			<?php if ($mu->check_user_stat() == 'logedin'): ?>
				<ul class="fullwidth nav navbar-nav navbar-right ">
					<li>
						<label class="label-header"> Welcome <?php echo $_SESSION['username']; ?></label>
					</li>
					<li class="right">
						<a class="btn" href="login.php?action=logout"> Logout </a>
					</li>
				</ul>
			<?php else: ?>
				<ul class="nav navbar-nav navbar-right">
					<li class="right">
						<a class="btn" href="">Sign Up</a>
					</li>
				</ul>
			<?php endif; ?>
		</div>
	</div>
	<div class="container-fluid">

