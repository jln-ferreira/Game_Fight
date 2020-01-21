<?php
require_once "CharOOP.php";

//iniciate all HERO and MONSTERS AND PUT IN A ARRAY

// INICIATE HEROS -->
$Warrior = new Hero(["Name" => "Warrior","HP"=>15, "STR" => 5, "DEF" => 3, "AGI" => 3, "EXP" =>1, "MANA" => true, "MyBag" => array()]);
$Knight = new Hero(["Name" => "Knight","HP"=>18, "STR" => 5, "DEF" => 2, "AGI" => 4, "EXP" =>10, "MANA" => true, "MyBag" => array()]);
$Swordman = new Hero(["Name" => "Swordman","HP"=>20, "STR" => 7, "DEF" => 3, "AGI" => 6, "EXP" =>10, "MANA" => true, "MyBag" => array()]);
$Guardian = new Hero(["Name" => "Guardian","HP"=>20, "STR" => 8, "DEF" => 3, "AGI" => 6, "EXP" =>20, "MANA" => true, "MyBag" => array()]);
$Paladin = new Hero(["Name" => "Paladin","HP"=>21, "STR" => 9, "DEF" => 3, "AGI" => 6, "EXP" =>32, "MANA" => true, "MyBag" => array()]);
$WarLord = new Hero(["Name" => "WarLord","HP"=>23, "STR" => 10, "DEF" => 4, "AGI" => 6, "EXP" =>50, "MANA" => true, "MyBag" => array()]);
$Apollo = new Hero(["Name" => "Apollo","HP"=>25, "STR" => 11, "DEF" => 4, "AGI" => 10, "EXP" =>70, "MANA" => true, "MyBag" => array()]);


// INICIATE MONSTERS -->
$Spider = new Monster(["Name" => "Spider", "HP" => 7, "STR" => 4, "DEF" => 1, "AGI" => 1, "EXP" =>1]);
$Bull = new Monster(["Name" => "Bull", "HP" => 13, "STR" => 4, "DEF" => 2, "AGI" => 2, "EXP" =>5]);
$Skeleton = new Monster(["Name" => "Skeleton", "HP" => 15, "STR" => 6, "DEF" => 1, "AGI" => 3, "EXP" =>7]);
$Lich = new Monster(["Name" => "Lich", "HP" => 16, "STR" => 6, "DEF" => 2, "AGI" => 3, "EXP" =>10]);
$Golen = new Monster(["Name" => "Golen", "HP" => 18, "STR" => 6, "DEF" => 2, "AGI" => 4, "EXP" =>15]);
$Yety = new Monster(["Name" => "Yety", "HP" => 20, "STR" => 6, "DEF" => 3, "AGI" => 6, "EXP" =>19]);
$Warewolf = new Monster(["Name" => "Warewolf", "HP" => 25, "STR" => 6, "DEF" => 4, "AGI" => 10, "EXP" =>28]);
$Queen_Bee = new Monster(["Name" => "Queen_Bee", "HP" => 27, "STR" => 7, "DEF" => 5, "AGI" => 20, "EXP" =>32]);
$Nightmare = new Monster(["Name" => "Nightmare", "HP" => 35, "STR" => 8, "DEF" => 5, "AGI" => 15, "EXP" =>39]);
$Erohim = new Monster(["Name" => "Erohim", "HP" => 45, "STR" => 10, "DEF" => 8, "AGI" => 15, "EXP" =>45]);
$Devil = new Monster(["Name" => "Devil", "HP" => 55, "STR" => 12, "DEF" => 7, "AGI" => 20, "EXP" =>66]);
$MichaelJackson = new Monster(["Name" => "MichaelJackson", "HP" => 123, "STR" => 58, "DEF" => 10, "AGI" => 33, "EXP" =>1000]);


//DATA STRUCTURE (ARRAY)
//HERO ---------------->
$arrHero = [$Warrior, $Knight, $Swordman, $Guardian, $Paladin, $WarLord, $Apollo];

//MONSTER- ------------>
$arrMonster = [$Spider, $Bull, $Skeleton, $Lich, $Golen, $Yety, $Warewolf, $Queen_Bee, $Nightmare, $Erohim, $Devil, $MichaelJackson];



?>
