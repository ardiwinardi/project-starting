<?php
use Core\Request;
use Core\Database;
use Core\Flash;

Class UserController extends AppController{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('User');
		$this->layout = 'admin';
	}
	
	public function edit(){
		$title = 'Perbaharui Profil';
		$id = getUserId();
		if(!$usr = $this->User->get($id)){
			Flash::error('User tidak ditemukan...');
			return redirect('home');
		}
		
		$data = Request::data();
		if(Request::type('post')){
			
			/*validasi pass*/
			if(!empty($data->user_pass_old) && $usr->user_pass != md5($data->user_pass_old)){
				Flash::error('Password Lama tidak sesuai...');
				return redirect('profil');
			}
			
			/* patching data untuk user */
			$usr = $this->User->patchEntity($usr, $data);
			$db = Database::pdo();
			try{
				$db->beginTransaction();
				
				/*simpan user*/
				if(!$this->User->save($usr)) throw new PDOException();
				Flash::success('profil berhasil diperbaharui...');
				
				$db->commit();
			}catch(PDOException $e){
				$db->rollback();
				echo $e->getMessage();exit;
				Flash::error('profil gagal diperbaharui...');
			}
			return redirect('profil');
		}
		
		$editable = true;
		$this->View()->load('profile-form', compact('title','usr','data','editable'));
	}
}
?>
