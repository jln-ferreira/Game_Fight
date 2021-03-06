
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
        return $this->STR;
    } 
    function getDEF() {
        return $this->DEF;
    }
    function getAGI() {
        return $this->AGI;
    } 
    function getEXP() {
        return $this->EXP;
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
    private $MyBag = array();

    //getters HERO -->
    function getMANA() {
        return $this->MANA;
    } 
     function getMyBag() {
        return $this->MyBag;
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
        return "<table id='status_hero' class='table table-sm'>
                  <tr>
                    <th id='status_hero_Name' colspan='2'>" . $this->Name ." </th>
                  </tr>
                  <tr>
                    <td>HP</td>
                    <td id='status_hero_HP'>" . $this->HP . "</td>
                  </tr>
                    <tr>
                    <td>STR</td>
                    <td id='status_hero_STR'>" . $this->STR . "</td>
                  </tr> 
                    <tr>
                    <td>DEF</td>
                    <td id='status_hero_DEF'>" . $this->DEF . "</td>
                  </tr>
                    <tr>
                    <td>AGI</td>
                    <td id='status_hero_AGI'>" . $this->AGI . "</td>
                  </tr>
                    <tr>
                    <td>MANA</td>
                    <td id='status_hero_MANA'>" . $this->MANA . "</td>
                  </tr>
                    <tr>
                    <td>EXP</td>
                    <td id='status_hero_EXP'>" . $this->EXP ."</td>
                  </tr>
             </table>";
    }    
}
    

// --------------- Monster information ---------------
class Monster extends Char{
    //methods Monster -->
    function status(){
        return "<table class='table table-sm'>
                    <tr>
                        <th id='status_monster_Name' colspan='2'>" . $this->Name . "</th>
                    </tr>
                    <tr>
                        <td>HP</td>
                        <td id='status_monster_HP'>" . $this->HP . "</td>
                    </tr>
                    <tr>
                        <td>STR</td>
                        <td id='status_monster_STR'>" . $this->STR . "</td>
                    </tr>
                    <tr>
                        <td>DEF</td>
                        <td id='status_monster_DEF'>" . $this->DEF . "</td>
                    </tr>
                    <tr>
                        <td>AGI</td>
                        <td id='status_monster_AGI'>" . $this->AGI . "</td>
                    </tr>
                    <tr style='display: none;'>
                        <td>EXP</td>
                        <td id='status_monster_EXP'>" . $this->EXP ."</td>
                    </tr>
                </table>";
    }   
}