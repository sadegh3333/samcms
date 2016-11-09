<?php 

/**
 * @author Sadegh Mahdilou
 * @copyright 2016
 * @since  Nov 2016
 * @since version 0.4.0
 * @version 0.2.0 Beta
 */



/*
*	This is Plugin API
*/



class plugin_api 
{

	public $id;
	public $name_plugin;
	public $status_plugin;



	function __construct(){

	}


	public function get_all_plugin_folder(){
		$getall = scandir(PLUG_DIR);
		return $getall;
	}

	public function check_plugin_in_database(){
		global $dbc;
		$getall = $this->get_all_plugin_folder();
		unset($getall[0]);
		unset($getall[1]);
		$getall = array_values($getall);



		$plugin_check = array();
		foreach ($getall as $key) {
			$check_plug_q = $dbc->query("SELECT * FROM `plugins` WHERE name_plugin='$key' LIMIT 1");
			$res = $dbc->fetch($check_plug_q);
			$plugin_name_in_db = $res['name_plugin'];

			if ($plugin_name_in_db == '') {
				$insert_to_db = $dbc->query("INSERT INTO `plugins` (id, name_plugin, status_plugin) VALUES (id,'$key','0') ");
			}
			else {
				$plugin_check[] = $plugin_name_in_db; 
			}

		}
		return $plugin_check;	
	}

	public function check_plugin_in_folder(){
		global $dbc;
		$getall = $this->get_all_plugin_folder();
		unset($getall[0]);
		unset($getall[1]);
		$getall = array_values($getall);


		$check_plug_q = $dbc->query("SELECT * FROM `plugins`");

		$all_in_db = array();
		foreach ($check_plug_q as $key ) {
			$all_in_db[] = $key['name_plugin'];
		}
		$a = array_diff($all_in_db, $getall);

		foreach ($a as $key ) {
			
			$remove =  $dbc->query("DELETE FROM `plugins` WHERE name_plugin='$key' LIMIT 1 ");

		}
		
		$plugin_check = array();
		return $plugin_check;
	}


	public function enable_plugin($id){
		global $dbc;

		$q = $dbc->query("UPDATE `plugins` SET  status_plugin='1' WHERE id='$id'");
	}

	public function disable_plugin($id){
		global $dbc;

		$q = $dbc->query("UPDATE `plugins` SET  status_plugin='0' WHERE id='$id'");
	}


	public function run_active_plugin(){
		global $dbc;
		$q = $dbc->query("SELECT * FROM `plugins` WHERE status_plugin='1'");

		foreach ($q as $key) {
			include(PLUG_DIR.'/'.$this->get_single_plugin_index_file($key['name_plugin']));
		}

	}

	public function get_single_plugin_index_file($plugin_root){
		return $plugin_root.'/index.php';
	}

	public function check_status($plugin_name){
		global $dbc;
		$plugin_name = $plugin_name;
		$q = $dbc->query("SELECT * FROM `plugins` WHERE name_plugin='$plugin_name' LIMIT 1");
	}


	public function get_all_plugin(){
		global $dbc;
		$q = $dbc->query("SELECT * FROM `plugins`");
		while ($res = $dbc->fetch($q))
		{
			$plugins_list[] = $res;
		}

		return $plugins_list;
	}



}




?>