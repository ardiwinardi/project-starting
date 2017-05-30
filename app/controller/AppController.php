<?php
use Core\Request;

Class AppController extends Core\Controller{
	
	public function __construct(){
		AuthController::check();
	}
	
}
?>
