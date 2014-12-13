<?php if(!defined('SYSPATH')){die('');} ?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <title><?php if(!isset($this->title)){ echo 'Panel Administracyjny'; }else{echo $this->title;} ?></title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
        <link rel="shortcut icon" href="<?php HTML::printUri('public/media/img/favicon.ico');?>" type="image/x-icon" />
        <link rel="stylesheet" href="<?php HTML::printUri('public/media/css/vendor.css');?>" />
        <link rel="stylesheet" href="<?php HTML::printUri('public/media/css/style.css');?>" /> 
        <script type="text/javascript" src="<?php HTML::printUri('public/media/js/jquery.vendor.js');?>" ></script> 
         
        <script type="text/javascript" src="<?php HTML::printUri('public/media/js/scripts.js');?>" ></script>
              
    </head>
    <body id="page">
    <div id="wrapper">

