<?php if(!defined('SYSPATH')){die('');} ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Connection
 *
 * @author Ervian
 */
class Database{
    public static $host;
    public static $dbname;
    public static $dbuser;
    public static $dbpass;
    public static $reqCount=0; 


    public function  __construct() {
        
    }

    static function getPDO($get_count = false){
        
       $pdo = new PDO('mysql:dbname='.Database::$dbname.';host='.  Database::$host,  Database::$dbuser,  Database::$dbpass);
       $pdo -> query ('SET NAMES utf8');
       $pdo -> query ('SET CHARACTER_SET utf8_unicode_ci');
       return $pdo; 
    }
}