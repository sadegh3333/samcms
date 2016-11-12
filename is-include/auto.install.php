<?php 

/**
 * @author Sadegh Mahdilou
 * @copyright November 2016
 * @since 0.7.0
 * @version 0.2.0 Beta
 *
 */






/**
*	This is install step,
*	There is two step before installing.	
*	First one is check the hostname, user name, password and database-name
*	is set or not. If is set go to next step.
*	Next Step is run install_samcms function for installing database.
*
*	@Since 0.7.0
*/
function install_step(){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Installing samcms</title>
		<style type="text/css">
			.main-page {
				width: 540px;
				margin: 0px auto;
				margin-top: 150px;
				font-size: 16px;
				background-color: rgba(243, 243, 243, 0.45);
				box-shadow: 0px 0px 10px rgba(221, 221, 221, 0.74);
				border-radius: 5px;
				padding: 27px 40px;
			}
			.main-page h2 {
				font-size: 40px;
				letter-spacing: 10px;
				text-align: center;
				font-weight: 200;
				margin: 0;
			}
			.main-page p{
				margin: 10px 0px;
				font-weight: 300;
				letter-spacing: 3px;
			}
			.main-page li {
				font-weight: 300;
				letter-spacing: 2px;
				padding: 3px 0px;
			}
			.submit {
				background-color: #f4f4f4;
				border: 1px rgba(221, 221, 221, 0.33) solid;
				padding: 10px 24px;
				margin: 20px 10px;
				cursor: pointer;
				font-size: 14px;
				font-weight: bold;
				border-radius: 5px;
				box-shadow: 0px 0px 1px rgba(221, 221, 221, 0.48);
			}
			.red {
				color: red;
				font-weight: normal;
			}
		</style>

	</head>
	<body>
		<div class="main-page">
			<h2>Welcome to samcms</h2>
			<p>
				We think samcms is not installed, so please install it.<br>
				Before click to next step you must set config.php file.<br>
				There is ( in config.php file ) four <b class="red">important</b> thing:<br>
				<li>
					HostName
				</li> 
				<li>
					UserName ( for connect to database )
				</li>
				<li>
					PassWord ( For connect to database )
				</li>
				<li>
					Database Name ( You must created in your host )
				</li>
			</p>
			<hr>
			<p>
				Dont forget the default username and password for login to samcms is:<br>
				username: admin<br>
				password: 1
			</p>
			<form method="POST">
				<input type="hidden" name="runfordone" value="installing">
				<input class="submit" type="submit" value="Next Step >">
			</form>
		</div>
	</body>
	</html>
	<?php
}



/**
*	This is install Database Table and,
*	INSERT default Data to it.
*
*	@Since 0.7.0
*/
function install_samcms(){
	global $dbc;

	
	$dbc->query("SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'");
	$dbc->query("SET time_zone = '+00:00'");


	// Category Table
	$dbc->query("CREATE TABLE `category` (
		`id` int(11) NOT NULL,
		`title` varchar(100) NOT NULL,
		`parent` int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	// Document Table
	$dbc->query("CREATE TABLE `document` (
		`id` int(11) NOT NULL,
		`title` text COLLATE utf8_unicode_ci NOT NULL,
		`content` text COLLATE utf8_unicode_ci NOT NULL,
		`category` int(11) NOT NULL,
		`tag` text COLLATE utf8_unicode_ci NOT NULL,
		`author` text COLLATE utf8_unicode_ci NOT NULL,
		`datetime` text COLLATE utf8_unicode_ci NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

	// Metauser Table
	$dbc->query("CREATE TABLE `metauser` (
		`id` int(11) NOT NULL,
		`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		`lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		`username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		`password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		`email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		`age` int(11) NOT NULL,
		`tel` int(255) NOT NULL,
		`gender` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
		`ip` varchar(21) COLLATE utf8_unicode_ci NOT NULL,
		`logindate` varchar(255) COLLATE utf8_unicode_ci NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

	// Plugin Table
	$dbc->query("CREATE TABLE `plugins` (
		`id` int(11) NOT NULL,
		`name_plugin` varchar(255) NOT NULL,
		`status_plugin` int(20) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1");

	// INSERT Default data
	$dbc->query("INSERT INTO `category` (`id`, `title`, `parent`) VALUES
		(1, 'First Category', 0);");
	$dbc->query("INSERT INTO `document` (`id`, `title`, `content`, `category`, `tag`, `author`, `datetime`) VALUES
		(1, 'Hello World', '<p>Welcome to samcms. This is the first post , you can update it or add new post.</p>', 1, 'samcms , new , update', 'admin', '1478983961');
		");
	$dbc->query("INSERT INTO `metauser` (`id`, `name`, `lastname`, `username`, `password`, `email`, `age`, `tel`, `gender`, `ip`, `logindate`) VALUES
		(1, 'sadegh', 'Mahdilou', 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 'sadegh3333@gmail.com', 0, 0, '', '', '1478983873');
		");
	$dbc->query("INSERT INTO `plugins` (`id`, `name_plugin`, `status_plugin`) VALUES
		(40, 'hello-plug', 1);
		");

	$dbc->query("ALTER TABLE `category`
		ADD PRIMARY KEY (`id`)");
	$dbc->query("ALTER TABLE `document`
		ADD PRIMARY KEY (`id`)");
	$dbc->query("ALTER TABLE `metauser`
		ADD PRIMARY KEY (`id`)");
	$dbc->query("ALTER TABLE `plugins`
		ADD PRIMARY KEY (`id`)");
	$dbc->query("ALTER TABLE `category`
		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
	$dbc->query("ALTER TABLE `document`
		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
	$dbc->query("ALTER TABLE `metauser`
		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8");
	$dbc->query("ALTER TABLE `plugins`
		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43");



}

?>