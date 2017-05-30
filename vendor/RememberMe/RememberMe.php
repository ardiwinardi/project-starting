<?php
namespace RememberMe;

Class RememberMe{
	
	public static $config = [
        'cookieName' => "rememberme"
    ];
	
	/**
     * Stores data in cookie
     *
     * @param mixes $data Data to store in cookie
     * @return bool
     */
    public static function rememberData($data = null){
        if (empty($data)) {
            return false;
        }
		
		$period = time() + 86400 * 14;
        $encryptedData = self::security('encode',json_encode($data));
        setcookie(self::$config['cookieName'], $encryptedData, $period);
        return true;
    }
    
    /**
     * Returns data stored in cookie
     *
     * @return mixed Stored data otherwise false
     */
	public static function getRememberedData(){
		$cookieData = isset($_COOKIE[self::$config['cookieName']])?$_COOKIE[self::$config['cookieName']] : '';
		if (!empty($cookieData)) {
			$data = self::security('decode',$cookieData);
			return json_decode($data);
        } else {
            return false;
        }
    }
    
    /**
     * Removes data
     *
     * @return void
     */
    public static function removeRememberedData(){
		unset($_COOKIE[self::$config['cookieName']]);
        setcookie(self::$config['cookieName'], '', self::$config['period']);
    }
    
    /**
     * Enkripsi
     *
     * @return string
     */
	private static function security($action, $string) {
		$output = false;

		$encrypt_method = "AES-256-CBC";
		$secret_key = '123AksdyFsskyz'; //change here
		$secret_iv = '4l71hdfkxcSW'; //change here

		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encode' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		}else if( $action == 'decode' ){
			$output = openssl_decrypt($string, $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
}
?>
