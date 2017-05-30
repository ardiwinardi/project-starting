<?php
use Core\Request;
use Core\Database;
use Core\Flash;

Class FooController extends AppController{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('Foo');
		$this->layout = 'foo';
	}
	
	public function index(){
		$data = [
			'title' => 'Assalamualaikum'
		];
		$this->View()->load('index', $data);
	}
	
	public function add(){
		$title = 'Add New';
		$foo = $this->Foo->newEntity();
		$data = Request::data();
		
		if(Request::type('post')){
			/* patching data untuk doc */
			$foo = $this->Foo->patchEntity($foo, $data);
			$foo->ID = UUID();
			$foo->name = '';
			$foo->created = date('Y-m-d H:i:s');
			
			$db = Database::pdo();
			try{
				$db->beginTransaction();
				
				/*save foo*/
				if(!$this->Foo->save($foo)) throw new PDOException();
				Flash::success('Foo created successfully...');
				
				$db->commit();
			}catch(PDOException $e){
				$db->rollback();
				echo $e->getMessage();exit;
				Flash::error('Creating failed ...');
			}
			return redirect('foo');
		}
		
		$editable = true;
		$this->View()->load('form', compact('title','foo','data','editable'));
	}
	
	public function edit($id){
		$title = 'Updated Foo';
		
		if(!$foo = $this->Foo->get($id)){
			Flash::error('Foo not found...');
			return redirect('foo');
		}
		$data = Request::data();
		
		if(Request::type('post')){
			/* patching data untuk doc */
			$foo = $this->Foo->patchEntity($foo, $data);
			$foo->modified = date('Y-m-d H:i:s');
			$db = Database::pdo();
			try{
				$db->beginTransaction();
				
				/*update foo*/
				if(!$this->Program->save($foo)) throw new PDOException();
				Flash::success('Foo updated successfully...');
				
				$db->commit();
			}catch(PDOException $e){
				$db->rollback();
				echo $e->getMessage();exit;
				Flash::error('Updating failed...');
			}
			return redirect('foo/edit/'.$foo->ID);
		}
		
		$editable = true;
		$this->View()->load('form', compact('title','foo','data','editable'));
	}
	
	
}
?>
