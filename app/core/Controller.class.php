<?php if(!defined('SYSPATH')){die('');} ?>
<?php

/**
 * Description of Controller
 *
 * @author Ervian
 */
class Controller {
    public $id;
    public $model;
    public $tabName = '';
    
    
    public function __construct() {
        //$this->model = lcfirst (get_class());
    }
    
    public function model($model){
        require_once "app/models/".$model.".php";
        $model = $model."_model";
        return new $model();
    }
    
    public function view($view,$data = array()){
        require_once 'app/views/'. $view .'.php';
    }
    
    public function getParamId($param1 = ''){
        $array = explode(',',rtrim($param1,'/'));
        if(count($array)!=2){
            return 0;
        }else{
                if(!is_numeric($array[1] = rtrim($array[1],'.html'))){
                    return 0;
                }else{
                    return $array[1];
                }
        }
                
    }
    public function checkAccess(){
        if(!defined('SYSPATH')){die('no direct access!');}
    }
    
    public function activeTab($tabName,$methodTabName){
        if(isset($methodTabName) && isset($tabName)){
            if($methodTabName===$tabName){
                echo 'active';
            }
        }
    }
    


}
