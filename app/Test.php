<?php

namespace App;
class Test {
    
    public function __construct($name){
        $this->name = $name;
    }

    public function greet(){
        return 'hello '.$this->name;
    }
}