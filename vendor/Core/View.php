<?php
namespace Core;

Class View{
	
	public $layout = "";
	public $message = "message";
	private $_vfolder; //view folder
	private $_lfolder; //layout folder
	private $_vars = [];
	
	public function __construct($subFolder = ''){
		$subFolder = empty($subFolder)? '' : '/'.str_replace('Controller','',$subFolder);
		$this->_vfolder = PATH."/app/view".$subFolder;
		$this->_lfolder = PATH."/app/view/Layout";
	}
	
	public function load($view, $vars = []){
		$_SESSION['csrf_token'] = UUID();
		
		$path = $this->_vfolder."/{$view}.php";
		if($html = $this->get_html($path,$vars)){
			$vars['content'] = $html;
			echo $this->layout($vars);
		}else{
			echo "view {$path} not exists!";
		}
	}
	
	private function layout($vars = []){
		global $a,$m;
		
		$path = $this->_lfolder."/{$this->message}.php";
		$vars['message'] = $this->get_html($path,Flash::getMessage());
		$vars['a'] = $a;
		$vars['m'] = $m;
		
		$path = $this->_lfolder."/{$this->layout}.php";
		if($html = $this->get_html($path, $vars)){
			return $html;
		}else{
			echo 'layouts not exists!';
		}
	}
	
	private function get_html($path, $vars = []){
		$html = false;
		
		if (file_exists($path)) {
			$vars = array_merge($this->_vars, $vars);
			extract($vars);
			ob_start();
			include($path);
			$html = ob_get_contents();
			ob_end_clean();
		}		
		return $html;
	}
	
	public function set($vars = []){
		foreach($vars as $key=>$val)
			$this->_vars[$key] = $val;
		return $this;
	}
}
?>
