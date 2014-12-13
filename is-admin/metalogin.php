<?php
/**
 * @author Sadegh Mahdilou
 * @copyright 2013  February
 * @since 2013 January-February
 * @version 0.6.0 Beta
 */

 ?>
<html>
	<head>
		<style type="text/css">
			#inputbox {
			border:1px #DDDDDD solid;
			}

			#paddingdiv {
			padding-top:11px;
			}

			#btn {
			height:32px;
			box-shadow:inset 0px 0px 0px 1px rgb(255,255,255);
			background-color:#0078F0;
			color:#FFFFFF;
			border:thin #0078C8 solid;
			}

			#btn input:hover,input:focus {
			border:thin #9A9A9A solid;
			background-color:#0066FF;
			}

			#icant {
			text-decoration:none;
			font-weight:normal;
			color:#3366FF;
			font-family:Arial,Helvetica,sans-serif, "2 Mehr ", "B Nazanin ", "B Koodak ";
			}

			#icant a:hover {
			text-decoration:underline;
			color:#0000FF;
			}

			#headerbarpadding {
			padding-bottom:150px;
			}

			#headerbar {
			background-color:#333333;
			color:#F2F2F2;
			height:28px;
			padding-right:11px;
			padding-top:4px;
			}

			#headerbar a {
			text-decoration:none;
			color:#F4F4F4;
			}

			#headerbar a:hover {
			color:#CCCCCC;
			text-decoration:underline;
			}

			#divborder {
			border:thin #DCDCDC solid;
			background-color:#F7F7F7;
			width:333px;
			height:240px;
			}
		</style>
	</head>
	<body style="border: 0px; padding: 0px; margin: 0px; height: 98%; ">
		<div id="headerbarpadding">
			<div id="headerbar" dir="rtl">
				<a href="#"><span> Login  </span></a>
			</div>
		</div>
		<center>
			<div style="width: 360px; height: auto;">
				<div>
					<form action="login.php" method="GET">
						<div id="divborder">
							<div style="padding: 21px;text-align: left;">
								<div id="header">
									<span>
									Login
									</span>
								</div>
								<div>
									<div style="padding-top: 11px;">
										<strong>
										User name :
										</strong>
									</div>
									<div>
										<input dir="ltr" id="inputbox" name="username" type="text" style="height: 30px; width: 290px; background-color: #FFFFFF;">
									</div>
								</div>
								<div>
									<div style="padding-top: 11px;">
										<strong>
											Password :
										</strong>
									</div>
									<div>
										<input dir="ltr" id="inputbox" name="password" type="password" autocomplete="off" style="height: 30px; width: 290px; background-color: #FFFFFF;">
									</div>
								</div>
								<div id="paddingdiv">
									<input type="submit" value="Login" id="btn"/>
								</div>
								<div id="paddingdiv">

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</center>
	</body>

</html>