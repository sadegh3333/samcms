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
				
				<div class="col-md-12 show-category-box ">
					<div class="row show-box-title-category">
						<div class="col-md-3">
							Plugins
						</div>
						<div class="col-md-6">
							Description
						</div>
						<div class="col-md-1">
							Version
						</div>
						<div class="col-md-1">
							Status
						</div>
					</div>
					<?php 
					$gap = $plugins->get_all_plugin();
					foreach ($gap as $key) {
						include(PLUG_DIR.$plugins->get_single_plugin_config_file($key['name_plugin']));
						?>
						<form action="plugin.php" method="POST">
							<li class="row show-category-data">
								<div class="col-md-3">
									<input type="hidden" name="plugin-id" value="<?php echo $key['id']; ?>">
									<?php echo $config['plugin_name'];?>
								</div>
								<div class="col-md-6">
									<?php echo $config['description']; ?>
								</div>
								<div class="col-md-1">
									<?php echo $config['version']; ?>
								</div>	
								<div class="col-md-1">
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