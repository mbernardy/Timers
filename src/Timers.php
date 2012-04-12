<?php
/**
 * User: mbernardy
 * Date: 3/15/12
 * Time: 6:34 PM
 */

include('Timer.php');
include('Table.php');

class Timers{

    private $timers;
	private $hierarchy;

    function __construct(){
        $this->timers = array();
		$this->hierarchy = array();
    }
	
	


    public function startTimer($name, $parent = null){
        if(isset($this->timers[$name])){
            $timer = $this->timers[$name];
        }else{
            $timer = new Timer($name);
			$this->timers[$name] = $timer;
        }

		if($parent != null){
			$children = array();
			if(isset($this->hierarchy[parent])){	
			}
		}

        $timer->start();		
		return $timer;
    }
	
	
	

    public function stopTimer($name){
        if(isset($this->timers[$name])){
            $timer = $this->timers[$name];
        }else{
            throw new Exception("The timer ".$name." has not been started");
        }
        $timer->stop();

    }

    public function write(){
    	
		$columns = array();
		$columns[] = array('name' => "Name", 'alignment' => 'left');
		$columns[] = array('name' => "Count", 'alignment' => 'right');
		$columns[] = array('name' => "Avg", 'alignment' => 'right');
		$columns[] = array('name' => "Total (ms)", 'alignment' => 'right');
		
		$rows = array();
		foreach($this->timers as $timer){
			$currRow = array();
			$currRow[] = $timer->getName();
			$currRow[] = $timer->getCount();
			$currRow[] = $timer->getAverage();
			$currRow[] = $timer->getTotal();
			$rows[] = $currRow;
		}
		
		//TODO do some sorting here
		
		$table = new Table($rows, $columns);
		$table->printText();
		
    }

}
