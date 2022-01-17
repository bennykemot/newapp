<?php

function dsuEncode($var){
	$var = $var*1919;
	$var = str_replace('7', 'D', $var);
	$var = str_replace('4', 'S', $var);
	$var = str_replace('8', 'U', $var);
	$var = str_replace('9', 'a', $var);
	return $var;
}

function dsuDecode($var){
	$var = str_replace('D', '7', $var);
	$var = str_replace('S', '4', $var);
	$var = str_replace('U', '8', $var);
	$var = str_replace('a', '9', $var);
	$var = $var/1919;
	return $var;
}

