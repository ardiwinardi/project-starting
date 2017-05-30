<?php
Class UserModel extends Core\Model{
	protected $table = "ch_users";
	protected $primaryKey = "ID";
		
	public function __construct(){
		parent::__construct();
	}
	
}
?>
