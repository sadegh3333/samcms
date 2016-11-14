<?php

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since  Nov 2016
 * @since version 0.6.0
 * @version 0.2.0 Beta
 */


/*
*	This is samcms Engine File , Core of system.
*	The Core Functions and another thing need for running system, Store here.
*
*/


/**
*	Safe anything connecting to database, when INSERT somthing in DataBase
*	Before Safe it and then INSERT.
*
*	@Since 0.2.0
*/
function safe($value,$type='0'){
	global $dbc;
	$value = trim($value);
	$value = str_replace("|nline|","",$value);
	$value = str_replace("|rnline|","",$value);
	$value = str_replace("\r\n","|rnline|",$value);
	$value = str_replace("\n","|nline|",$value);
//$value = mysqli_real_escape_string($dbc->connection, $value );
	$value = str_replace("|nline|","\n",$value);
	$value = str_replace("|rnline|","\r\n",$value);
	if($type != '1')
	{
		$value		= htmlspecialchars($value);
		$value		= strip_tags($value);
		$value 		= str_replace(array("<",">","'","&#1740;","&amp;","&#1756;"),array("&lt;","&gt;","&#39;","&#1610;","&","&#1610;"),$value);
	}
	return $value;
}



/**
*	add_hook is working hook system. when developer add something
*	can run with do_hook functions every where.
*	Every hook store in this array and when include by do_hook do working.
*
*	@Since 0.6.0
*/

// Store Hooks 
global $hook_list;
$hook_list = array();

/* Developer can add somthing to this hook and run where use do_hook function. */
function add_hook($hook_name ,$do_something ){
	global $hook_list;
	
	$hook_list[] = array($hook_name,$do_something);
}

/* Developer can use it when run a hook submited */
function do_hook($hook_name){
	global $hook_list;

	foreach ($hook_list as $key ){
		if ($key[0] == $hook_name):
			$func = $key[1];
		if (function_exists($func)):
			call_user_func($func);
		endif;
		endif;
	}

}


/**
*	Function for get bootstrap files. 
*	Developer can use this function for get bootstrap in theme.
* 
*	@Since 0.3.0
*/
function Get_bootstarp(){
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




function add_default_cap_to_user(){

	global $mu;

	$user_info = $mu->user_info($mu->this_user_username());
	if ($mu->get_user_role($user_info['username']) == 'administrator') {
		$mu->user_capabilities[] = 'admin_bar';
		$mu->user_capabilities[] = 'dashboard';
		$mu->user_capabilities[] = 'posts';
		$mu->user_capabilities[] = 'category';
		$mu->user_capabilities[] = 'plugins';
		$mu->user_capabilities[] = 'users';
		$mu->user_capabilities[] = 'site';
	}
}