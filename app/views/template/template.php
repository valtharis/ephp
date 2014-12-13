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
              
    </head>
    <body id="page">
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php HTML::printUri('');?>">Helios - Panel administracyjny</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php HTML::printUri('');?>">Statystyka</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#nav-movies">Filmy</a>
                        <ul id="nav-movies" class="collapse">
                            <li>
                                <a href="#">Dodaj film</a>
                            </li>
                            <li>
                                <a href="#">Edytuj</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#nav-repertoire">Repertuar</a>
                        <ul id="nav-repertoire" class="collapse">
                            <li>
                                <a href="#">Skomponuj repertuar</a>
                            </li>
                            <li>
                                <a href="#">Edytuj</a>
                            </li>
                            <li>
                                <a href="#">Przegląd repertuaru</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Rezerwacje</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>