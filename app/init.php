<?php
if(!defined('SYSPATH')){die('no direct access!');};
//error_reporting(0);
error_reporting(E_ALL);

//##############################################################################
// CORE/CLASS LOADER
function CoreLoader($classname) {
    $locations = array(
        '/core/',
    );
    for($i=0;$i<count($locations);$i++){
        if(file_exists(dirname(__FILE__).$locations[$i].$classname.'.class.php')){
            require_once (dirname(__FILE__).$locations[$i].$classname.'.class.php');
        }        
    }

}
spl_autoload_register('CoreLoader');
//##############################################################################
// SESSTION NAME
Auth::$sessionName = "pssim";
session_name (Auth::$sessionName);
session_start();
//##############################################################################
// APLICATION DIR
App::$appDir = '/android/';
App::$salt = 'pssim+';


//##############################################################################
// DATABASE CONNECTION
Database::$host='192.168.0.151';
Database::$dbname='psim';
Database::$dbuser='ervian';
Database::$dbpass='skill09';