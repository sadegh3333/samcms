<?php 


// Configuration part
$config = array(
	'plugin_name' => 'hello-plug',
	'version' => '0.2.0',
	'description' => 'This is the First Plugin of samcms.'
	);


function do_something() {
	$xx = '<label class="label-header"> | hello , i am plugin , run from hook system.</label>';
	echo $xx;
}


add_hook('hello_hook' , 'do_something');
?>