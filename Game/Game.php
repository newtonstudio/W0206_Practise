<?php
class Game {

    private $participants = array();

    //type casting
    public function joinGame(Animal $animal){
        $this->participants[] = $animal;
    }

    public function preparing(){
        if(!empty($this->participants)) {
            foreach($this->participants as $v) {
                $v->greet().'<br/>';
                $v->prepare().'<br/>';
            }
        }
    }

    public function run(){
        if(!empty($this->participants)) {
            foreach($this->participants as $v) {
                $v->run().'<br/>';                
            }
        }
    }

    public function winner(){

        $tmp = array();
        if(!empty($this->participants)) {
            foreach($this->participants as $v) {
                $speed = $v->getSpeed();                
                $tmp[$v->getName()] = $speed;
            }
        }

        
        $topAnimal = array_search(max($tmp),$tmp); 

        echo '<h1>'.$topAnimal." is the winner</h1>";

    }

}
?>