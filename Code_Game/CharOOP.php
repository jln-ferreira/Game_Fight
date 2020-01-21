<?php

//-----------Character information-------------
class Char{

    //Properties CHAR -->
    protected $Name;
    protected $HP;
    protected $STR;
    protected $DEF;
    protected $AGI;
    protected $EXP;

    //getters CHAR -->
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
    function getAGI() {
        return $this->length;
    } 
    function getEXP() {
        return $this->length;
    } 

    //setters CHAR -->
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
    function setAGI($AGI) {
    $this->AGI = $AGI;
    }
    function setEXP($EXP) {
    $this->EXP = $EXP;
    }

    //contructor CHAR -->
    public function __construct($args = []){
        $this->Name = $args['Name'];
        $this->HP = $args['HP'];
        $this->STR = $args['STR'];
        $this->DEF = $args['DEF'];
        $this->AGI = $args['AGI'];
        $this->EXP = $args['EXP'];
    }

    //destructor CHAR -->
    function __destruct() {
        
    }
}


// --------------- HERO information ---------------
class Hero extends Char{

    // Properties HERO -->
    private $MANA;
    private $MyBag;

    //getters HERO -->
    function getMANA() {
        return $this->length;
    } 
     function getMyBag() {
        return $this->length;
    }

    //setters HERO -->
    function setMANA($MANA) {
    $this->MANA = $MANA;
    }
    function setMyBag($MyBag) {
    $this->MyBag = $MyBag;
    }

    //costructor HERO -->
    public function __construct($args = []){
        parent::__construct($args);
        $this->MANA = $args['MANA'];
        $this->MyBag = $args['MyBag'];
    }

    //destructor HERO -->
    function __destruct() {
        
    }

    //methods HERO -->
    function status(){
        echo "The $this->Name : <br>
            HP: $this->HP <br>
            STR: $this->STR <br>
            DEF: $this->DEF <br>
            AGI: $this->AGI <br>
            MANA: $this->MANA <br>
            EXP: $this->EXP <br>";
    }
}


// --------------- Monster information ---------------
class Monster extends Char{
    //methods Monster -->
    function status(){
        echo "The $this->Name : <br>
            HP: $this->HP <br>
            STR: $this->STR <br>
            DEF: $this->DEF <br>
            AGI: $this->AGI <br>
            EXP: $this->EXP <br>";
    }   
}

?>