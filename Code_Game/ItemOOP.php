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
    // i if quantity of itens Hero has
    function status($i){

        //Creating BAG:
        //<table id='BagHTML' class='table table-sm'></table>

        echo"<tr>
                <td id='Name_Item_" . $i . "'>" . $this->Name . "</td>
                <td id='Status_Item_HP_" . $i . "'>" . $this->HP . "</td>
                <td id='Status_Item_STR_" . $i . "'>" . $this->STR . "</td>
                <td id='Status_Item_DEF_" . $i . "'>" . $this->DEF . "</td>
                <td><button id='Use_Item_" . $i . "' type='button' class='btn btn-success'>Use</button></td>
            </tr>";
    }   
}
?>