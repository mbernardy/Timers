<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mbernardy
 * Date: 3/15/12
 * Time: 6:37 PM
 * To change this template use File | Settings | File Templates.
 */
class Timer
{
       private $name;
       private $last_start;
       private $started;
       private $times;

       function __construct($name){
           $this->name = $name;
           $this->started = false;
           $this->times = array();
       }

       public function start(){
           if($this->started){
               throw new Exception("Can't start an already started timer moron");
           }

           $this->last_start = microtime(true);
           $this->started = true;
       }

        public function stop(){
            if(!$this->started){
                throw new Exception("Can't stop an time that hasn't been started, moron");
            }

            $curr_time = microtime(true);
            $this->times[] = $curr_time - $this->last_start;
            $this->started = false;
        }

        public function prints(){


        }

        public function getName(){
            return $this->name;
        }

        protected  function getTimes(){
            return $this->times;
        }

        protected function getAverage(){
            $total = $this->getTotal();
            return $total / count($this->times);

        }
        protected function getTotal(){
            $total = 0.0;
            foreach($this->times as $time){
                $total += $time;
            }
            return $total;
        }

}
