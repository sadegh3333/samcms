<?php 

/**
 * @author Sadegh Mahdilou
 * @copyright  May 2016
 * @since version 0.3.0
 * @version 0.2.0 Beta
 */


// set title page
$title = 'Plugins';

// include header 
include('header.php');

$mu = new user();
if ($mu->check_user_stat() == 'logedout') {
	header('Location: metalogin.php');
}




if (isset($_POST['enable'])) {
	$plugin_id = $_POST['plugin-id'];

	$plugins->enable_plugin($plugin_id);
	header('Location: plugin.php');
}


if (isset($_POST['disable'])) {
	$plugin_id = $_POST['plugin-id'];

	$plugins->disable_plugin($plugin_id);
	header('Location: plugin.php');

}

?>

<div class="row">
	<div class="col-xs-2 sidebar">
		<?php include ('sidebar.php'); ?>
	</div>
	<div class="col-xs-10 col-xs-offset-2">
		<!-- Begin part maincenter -->
		<div class="edit-box">
			<h3 class="title">Plugins</h3>
			<h4 class="message-system"> <?php if(isset($message_system)) echo $message_system; ?> </h4>
			<?php
			/* print_r($plugins->get_all_plugin_folder());*/
			$all_plug = $plugins->check_plugin_in_database();
			$all_plug0 = $plugins->check_plugin_in_folder();


			?>
			<div class="row">
				
				<div class="col-xs-8 show-category-box ">
					<div class="row show-box-title-category">
						<div class="col-xs-2">
							Id
						</div>
						<div class="col-xs-6">
							Name plugin
						</div>
						<div class="col-xs-2">
							Status plugin
						</div>
					</div>
					<?php 
					$gap = $plugins->get_all_plugin();
					foreach ($gap as $key) {
						?>
						<form action="plugin.php" method="POST">
							<li class="row show-category-data">
								<div class="col-xs-2">
									<input type="hidden" name="plugin-id" value="<?php echo $key['id']; ?>">
									<?php echo $key['id']; ?>
								</div>
								<div class="col-xs-6">
									<?php echo $key['name_plugin']; ?>
								</div>	
								<div class="col-xs-2">
									<?php
									$status_plugin = $key['status_plugin'];
									if ($status_plugin) {
										echo '<input class="btn btn-warning" type="submit" name="disable" value="Disable" >';
									}
									else{
										echo '<input class="btn btn-success" type="submit" name="enable" value="Enable" >';
									}
									?>
								</div>

							</li>
						</form>
						<?php
					}			
					?>
				</div>

			</div>
		</div>
		<!-- end part maincenter -->
	</div>
</div>