<?php if(!defined('SYSPATH')){die('');} ?>
<?php
/**
 * Description of App
 *
 * @author Ervian
 */
class Auth {

    public static $sessionName = 'session';

    public function __construct() {
       
    }

    
    public static function isLogged(){
        if(isset($_SESSION['logged']) && $_SESSION['logged']===true){
            return true;
        }else{
            return false;
        }
    }
    public static function logIn(){
        $_SESSION['logged'] = true;
    }
    public static function logOut(){
        $_SESSION['logged'] = false;
        if (isset($_COOKIE[session_name()])) { 
           setcookie(session_name(), '', time()-42000, '/'); 
        }
        session_destroy();
    }
    
    public static function auth(){
        
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
}
    }
    

    

}
