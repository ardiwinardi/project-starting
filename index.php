<?php
session_start();
define('PATH',__DIR__);

include "vendor/autoload.php";
$defaultConn = Core\Database::connect($dbconf);
Core\Route::autoload();
?>
