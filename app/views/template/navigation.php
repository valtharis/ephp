<?php if(!defined('SYSPATH')){die('');} ?>
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
            <li class="<?php $this->activeTab('statistic',$this->tabName); ?>">
                <a href="<?php HTML::printUri('');?>"><span class="glyphicon glyphicon-stats"></span> Statystyka</a>
            </li>
            <li class="<?php $this->activeTab('movie',$this->tabName); ?>">
                <a href="javascript:;" data-toggle="collapse" data-target="#nav-movies"><span class="glyphicon glyphicon-film"></span> Filmy</a>
                <ul id="nav-movies" class="collapse">
                    <li>
                        <a href="<?php HTML::printUri('movie/add');?>"><span class="glyphicon glyphicon-file"></span> Dodaj film</a>
                    </li>
                    <li>
                        <a href="<?php HTML::printUri('movie/edit');?>"><span class="glyphicon glyphicon-pencil"></span> Edytuj</a>
                    </li>
                    <li>
                        <a href="<?php HTML::printUri('movie/preview');?>"><span class="glyphicon glyphicon-list"></span> Przegląd filmów</a>
                    </li>
                </ul>
            </li>
            <li class="<?php $this->activeTab('repertoire',$this->tabName); ?>">
                <a href="javascript:;" data-toggle="collapse" data-target="#nav-repertoire"><span class="glyphicon glyphicon-facetime-video"></span> Repertuar</a>
                <ul id="nav-repertoire" class="collapse">
                    <li>
                        <a href="<?php HTML::printUri('repertoire/add');?>"><span class="glyphicon glyphicon-file"></span> Skomponuj repertuar</a>
                    </li>
                    <li>
                        <a href="<?php HTML::printUri('repertoire/edit');?>"><span class="glyphicon glyphicon-pencil"></span> Edytuj</a>
                    </li>
                    <li>
                        <a href="<?php HTML::printUri('repertoire/preview');?>"><span class="glyphicon glyphicon-list"></span> Przegląd repertuaru</a>
                    </li>
                </ul>
            </li>
            <li class="<?php $this->activeTab('reservation',$this->tabName); ?>">
                <a href="javascript:;" data-toggle="collapse" data-target="#nav-reservation"><span class="glyphicon glyphicon-phone"></span> Rezerwacje</a>
                <ul id="nav-reservation" class="collapse">
                    <li>
                        <a href="<?php HTML::printUri('reservation/waiting');?>"><span class="glyphicon glyphicon-list"></span> Oczekujące</a>
                    </li>
                    <li>
                        <a href="<?php HTML::printUri('reservation/confirmed');?>"><span class="glyphicon glyphicon-ok"></span> Zrealizowane</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>