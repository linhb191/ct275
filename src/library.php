<?php

function redirect($path)
{
	header('Location: ' . $path);
	exit;
}

function view($document, $vars = array())
{
	$path = PATH_VIEW . "/{$document}.php";
	extract($vars, EXTR_PREFIX_SAME, '__var_');
	require($path);
}
