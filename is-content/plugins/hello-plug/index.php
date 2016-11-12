<?php 


add_hook('hello_hook' , 'do_something');
add_hook('hello_hook' , 'do_something_1');

function do_something() {
	$xx = '<label class="label-header"> | hello , i am plugin , run from hook system.</label>';
	echo $xx;
}

function do_something_1(){
	$xx = '<label class="label-header"> | This is the Second Hook.</label>';
	echo $xx;	
}


?>