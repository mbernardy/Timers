<?php
/**
 * User: mbernardy
 * Date: 3/15/12
 * Time: 6:34 PM
 */

    include('Timer.php');

class Timers{

    private $timers;

    function __construct(){
        $this->timers = array();
    }


    public function startTimer($name){
        if(isset($this->timers[$name])){
            $timer = $this->timers[$name];
        }else{
            $timer = new Timer($name);
        }

        $timer.start();
    }

    public function stopTimer($name){
        if(isset($this->timers[$name])){
            $timer = $this->timers[$name];
        }else{
            throw new Exception("The timer ".$name." has not been started");
        }
        $timer.stop();

    }

    //Fuck you PHP
    public function printAll(){
        foreach($this->timers as $timer){
            print "Name: ".$timer->getName()."\n";
            print "\tTotal: ".$timer->getTotal()."\n";
            print "\tAverage: ".$timer->getAverage()."\n";
        }

    }

    public function prints($name){
        if(isset($this->timers[$name])){
            $timer = $this->timers[$name];
        }else{
            throw new Exception("The timer ".$name." does not exist");
        }
        $timer->prints();


    }

}
