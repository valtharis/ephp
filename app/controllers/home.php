<?php if(!defined('SYSPATH')){die('');} ?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Ervian
 */
class Home extends Controller{


    public function __construct() {
        parent::__construct();
        $this->tabName = 'statistic';
    }
    public function action_index(){
        
        $movie = $this->model('Movie');
        $repertoire = $this->model('Repertoire');
        $reservation = $this->model('Reservation');
        
        
        $this->view('home/index', array(
            "movieCount"=>$movie->getCount(),
            "repertoireCount"=>$repertoire->getCount(),
            "reservationWaitingCount"=>count($reservation->getToTable(0)),
            "reservationConfirmedCount"=>count($reservation->getToTable(1))

        ));
    }


    
}
