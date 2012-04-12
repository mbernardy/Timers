<?php
  
  include('Timers.php');
  
  
  $timers = new Timers();
  
  
  
  for ($i=0; $i <  100; $i++) { 
  	$timers->startTimer("iloop");
	for($j=0; $j < 10; $j++){
		$timers->startTimer('jloop');
		sleep(.0005);
		$timers->stopTimer('jloop');
	}   
	$timers->stopTimer('iloop'); 
  }
  
  $timers->write();
  
  
    
?>