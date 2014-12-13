<?php if(!defined('SYSPATH')){die('');} ?>
<?php
/**
 * Description of App
 *
 * @author Ervian
 */
class App {

    static $appDir = '/';
    static $salt = '';
    static $filesDir = 'public/files';
    
    protected $controller = 'home';
    protected $method = 'action_index';
    protected $params = '';


    public function __construct() {
        
        $url = $this->parseUrl();
        if(file_exists('app/controllers/'. $url[0] .'.php')){    
            $this->controller = $url[0];
            unset($url[0]);
        }
        
        require_once 'app/controllers/'. $this->controller .'.php';
        $this->controller = new $this->controller;
        
        if(isset($url[1])){
            if(method_exists($this->controller, 'action_'.$url[1])){
                
                $this->method = 'action_'.$url[1];
                unset($url[1]);
            }
        }
        
        $this->params = $url ? array_values($url) : array();
        
        call_user_func_array(array($this->controller,  $this->method), $this->params);        
    }
    
    public function parseUrl(){
        if(isset($_GET['url'])){     
            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
        };
    }
    
    public static function baseUrl(){
        return 'http://'.$_SERVER['HTTP_HOST'].App::$appDir;
    }
    public static function getFilesDir(){
        return HTML::uri('').App::$filesDir;
    }
    

    

}
