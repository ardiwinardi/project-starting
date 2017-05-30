<?php
include "app/config/config.php";
include "vendor/Core/global.php";

spl_autoload_register(function ($class) {
	
	$vdir = PATH.'/vendor/';
	$cdir = PATH.'/app/controller/';
	
	$vfile = $vdir . str_replace('\\', '/', $class) . '.php';
	$cfile = $cdir . str_replace('\\', '/', $class) . '.php';
	
    if (file_exists($vfile)) require $vfile;
    elseif(file_exists($cfile)) require $cfile;
});
?>
