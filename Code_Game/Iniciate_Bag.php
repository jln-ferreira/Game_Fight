<?php

//-----------Item information-------------
class Item{

    //Properties ITEM -->
    protected $Name;
    protected $HP;
    protected $STR;
    protected $DEF;

    //getters item -->
    function getName() {
        return $this->Name;
    } 
      function getHP() {
        return $this->HP;
    } 
    function getSTR() {
        return $this->height;
    } 
    function getDEF() {
        return $this->width;
    }


    //setters item -->
    function setName($Name) {
    $this->Name = $Name;
    }
    function setHP($HP) {
    $this->HP = $HP;
    }
    function setSTR($STR) {
    $this->STR = $STR;
    }
    function setDEF($DEF) {
    $this->DEF = $DEF;
    }


    //contructor item -->
    public function __construct($args = []){
        $this->Name = $args['Name'];
        $this->HP = $args['HP'];
        $this->STR = $args['STR'];
        $this->DEF = $args['DEF'];
    }

    //destructor item -->
    function __destruct() {
        
    }

    //methods Item -->
    function status(){
        echo "The $this->Name : <br>
            HP: $this->HP <br>
            STR: $this->STR <br>
            DEF: $this->DEF <br>";
    }   
}


//----------------just a test----------------
$jose = new Item([
    "Name" => "Jose",
    "HP" => 10,
    "STR" => 70,
    "DEF" => 13 
]);

$jose->status();



?>