<?php 
    class Game{

        private $participants = array();

        public function join_game(Animal $animal){

            $this->participants[] = $animal;
        }

        public function preparing(){
            if(!empty($this->participants)){
                foreach($this->participants as $v){
                    $v->greet();
                    echo "<br/>";
                    $v->prepare();
                }
            }
        }

        public function winner(){
            $tmp = array();

            if(!empty($this->participants)){
                foreach($this->participants as $v){
                    $speed = $v->getSpeed();

                    $tmp[$v->get_name()] = $speed;
                }
            }
        }
    }

?>