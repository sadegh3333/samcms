<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2015  Dec
 * @since 2013-2015 
 * @version 0.6.0
 */

?>
<?php 
session_start();

require_once('../is-include/config.php');
require('../is-include/function.php');
require('../is-include/jdf.php');
require('../is-include/user-class.php');


$mu = new user();
?>

<html>
<head>
	<?php Get_bootstarp(); ?>
	<link href='style.css' rel='stylesheet' type='text/css'>
	<style type="text/css">
body{
	   font-family: 'Lato', sans-serif;
    font-weight: 400;
}
		.header-bar {
			background-color: #191818;
			padding: 0px 33px;
		}
		.header-bar .right {
			float: right;
		}
		.header-bar .btn {
			color: #EFEFEF;
			font-weight: bold;
			border: 0px ;
			border-radius: 0px;
			float: right;
		}
		.header-bar .btn:hover {
			background-color: #FDFDFD;
			color: #2F2F2F;
		}
		.fullwidth {
			width: 100%;
		}
		.label-header {
			color: #fefefe;
			height: 14%;
			text-align: center;
			vertical-align: middle;
			padding: 16px 0px;
			margin: 0px auto;
		}
	</style> 
</head>
<body>
	<div class="container-fluid">
		<div  class="row header-bar" > 
			<?php if ($mu->check_user_stat() == 'logedin'): ?>
				<ul class="fullwidth nav navbar-nav navbar-right">
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
