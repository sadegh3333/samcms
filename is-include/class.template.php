<?php 

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since  Nov 2016
 * @since version 0.4.0
 * @version 0.2.0 Beta
 */


/*
*
*	This is template class
*	Everything about templale functions and anything create here.
*	created new object when run theme
*/




class template 
{

	function __construct(){

	}

	/* Function for get bootsrap files */
	function load_bootstarp(){
		?>
		<!-- add css bootstrap files -->
		<link rel="stylesheet" type="text/css" href="<?php echo Root.'/is-include/css/bootstrap.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo Root.'/is-include/css/bootstrap.min.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo Root.'/is-include/css/font-awesome.min.css'; ?>">
		<!-- add js bootstrap files -->
		<script type="text/javascript" src="<?php echo Root.'/is-include/js/jquery-2.1.4.min.js'; ?>"></script>
		<script type="text/javascript" src="<?php echo Root.'/is-include/js/bootstrap.js';  ?>"></script>
		<script type="text/javascript" src="<?php echo Root.'/is-include/js/bootstrap.min.js'; ?>"></script>
		<?php	
	}


	// load template directory
	public function get_template_directory(){
		return Root.'/is-content/theme/';
	}


	// back home url
	public function home_url(){
		return Root;
	}

}