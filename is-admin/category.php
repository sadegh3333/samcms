<?php 

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since  May 2016
 * @since version 0.3.0
 * @version 0.2.0 Beta
 */


// set title page
$title = 'Category';

// include header 
include('header.php');

$mu = new user();

add_default_cap_to_user();

global $user_info;

if ($mu->check_user_stat() == 'logedout' || $mu->user_can_be($user_info['username'] , 'category') ) {
	$message_system = 'You can not access to Category page !';
	session_destroy();
    header("Location: metalogin.php?message_system=$message_system");
}

$cat = new category();


if (isset($_GET['mission']) ) {
	if ($_GET['mission'] == 'create_category') {
		
		$title = $_POST['title'];
		$parent = $_POST['parent'];

		$newcat = $cat->create_category($title,$parent);
		if ($newcat == 0) {
			$message_system = 'The problem when Create a new category';
		}
		else {
			$message_system = 'successful Create "'.$title.'" Category';
		}
	}
}
?>

<div class="row">
	<div class="col-xs-2 sidebar">
		<?php include ('sidebar.php'); ?>
	</div>
	<div class="col-xs-10 col-xs-offset-2">
		<!-- Begin part maincenter -->
		<div class="edit-box">
			<h3 class="title">Categories</h3>
			<div class="row">
				
				<div class="col-xs-8 show-category-box ">
					<div class="row show-box-title-category">
						<div class="col-xs-2">
							Id
						</div>
						<div class="col-xs-6">
							Name
						</div>
						<div class="col-xs-2">
							parent
						</div>
					</div>
					<?php 
					$gac = $cat->get_all_category();
					foreach ($gac as $key) {
						?>
						<li class="row show-category-data">
							<div class="col-xs-2">
								<?php echo $key['id']; ?>
							</div>
							<div class="col-xs-6">
								<?php echo $key['title']; ?>
							</div>	
							<div class="col-xs-2">
								<?php echo $cat->get_parent_category($key['parent'])['title']; ?>
							</div>
						</li>
						<?php
					}			
					?>
				</div>
				<div class="col-xs-4 box-add-category">
					<form action="category.php?mission=create_category" method="POST">
						<div>
							<label class="label-input" >  Title category:  </label>
							<input class="form-control" name="title" value="" type="text" />
						</div>
						<div>
							<label class="label-input"> Parent Category: </label>
							<select class="form-control" name='parent'>
								<option value="0" > No Parent </option>
								<?php 
								$getcat = $cat->get_all_category();
								foreach ($getcat as $key) {
									echo "<option value=".$key[id].">";
									echo $key['title'];
									echo "</option>";
								}

								?>

							</select>
						</div>
						<div class="divsubmit"><input class="btn btn-success"  type="submit" value="Add Category" /></div>
					</form>
				</div>

			</div>
		</div>
		<!-- end part maincenter -->
	</div>
</div>