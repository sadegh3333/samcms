<?php 


// Configuration part
$config = array(
	'plugin_name' => 'hello-plug',
	'version' => '0.2.0',
	);


function do_something() {
	$xx = '<label class="label-header">| hello , i am hook , run from hook system.</label>';
	echo $xx;
}


add_hook('hello_hook' , 'do_something');
?>