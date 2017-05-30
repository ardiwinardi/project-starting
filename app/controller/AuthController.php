<?php
use Core\Request;
use Core\Flash;
use RememberMe\RememberMe;

Class AuthController extends Core\Controller{
	
	public function __construct(){
		$this->loadModel('User');
		$this->layout = 'login';
	}
	
	public static function check(){
		if(empty($_SESSION['_login_status'])){
			redirect('login');
		}
	}
	
	public function login(){
		if(!empty($_SESSION['_login_status']) && $_SESSION['_login_status'] == 'valid'){
			redirect('home');
		}
		
		$data = Request::data();
		if(Request::type('post')){
			if($user = $this->User->select()->where(sprintf("user_email = '%s'",$data->user_email))->first()){
				if($user->user_pass == md5($data->user_pass)){
					if(!empty($data->rememberme)){
						RememberMe::rememberData([
							'_cook_user_email'=>$user->user_email,
							'_cook_user_pass'=>$user->user_pass
						]);
					}
					
					$_SESSION['_login_status'] = 'valid';
					$_SESSION['_login_user_id'] = $user->ID;
					$_SESSION['_login_user_login'] = $user->user_login;
					$_SESSION['_login_user_email'] = $user->user_email;
					$_SESSION['_login_display_name'] = $user->display_name;
					redirect('');
				}
			}else{
				Flash::error('Email dan password tidak valid.');
			}
		}
		
		if($rememberData = RememberMe::getRememberedData()){
			if($user = $this->User->select()->where(sprintf("user_email = '%s'",$rememberData->_cook_user_email))->first()){
				if($user->user_pass == $rememberData->_cook_user_pass){
					RememberMe::rememberData([
						'_cook_user_email'=>$user->user_email,
						'_cook_user_pass'=>$user->user_pass
					]);
					
					$_SESSION['_login_status'] = 'valid';
					$_SESSION['_login_user_login'] = $user->user_login;
					$_SESSION['_login_user_email'] = $user->user_email;
					$_SESSION['_login_display_name'] = $user->display_name;
					redirect('');
				}
			}
		}
		
		$this->View()->load('login-form', compact('data'));
	}
	
	public function logout(){
		session_destroy();
		session_unset();
		RememberMe::removeRememberedData();
		redirect('login');
	}
	
}
?>
