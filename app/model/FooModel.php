<?php
Class FooModel extends Core\Model{
	protected $table = "foo_table";
	protected $primaryKey = "ID";
		
	public function __construct(){
		parent::__construct();
	}
}
?>
