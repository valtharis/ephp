<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lang
 *
 * @author Ervian
 */
class Lang {
    //put your code here
    private static $lang = array();
    
    public function __construct() {
        //$this->lang = array();
    }


    public static function get($text){
        Lang::init();
        if(array_key_exists($text, Lang::$lang)){
            return Lang::$lang[$text];
        }else{
            return $text;
        }
    }
    
    private static function init(){
        Lang::$lang = array(
            "Sunday"=>"Niedziela",
            "Saturday"=>"Sobota",
            "Monday"=>"Poniedziałek",
            "Tuesday"=>"Wtorek",
            "Wednesday"=>"Środa",
            "Thursday"=>"Czwartek",
            "Friday"=>"Piątek",
            "Sun"=>"Nd",
            "Sat"=>"So",
            "Mon"=>"Pon",
            "Tue"=>"Wt",
            "Wen"=>"Śr",
            "Thu"=>"Cz",
            "Fri"=>"Pt",

            "January"=>"Styczeń",
            "February"=>"Luty",
            "March"=>"Marzec",
            "April"=>"Kwiecień",
            "May"=>"Maj",
            "June"=>"Czerwiec",
            "July"=>"Lipiec",
            "August"=>"Sierpień",
            "September"=>"Wrzesień",
            "October"=>"Październik",
            "November"=>"Listopad",
            "December"=>"Grudzień",
        );
    }
}
