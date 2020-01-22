<?php
    require_once "ItemOOP.php";

    //iniciate all ITENS PUT IN A ARRAY

    // INICIATE ITENS -->
    $SmallPotionHealth = new Item(["Name" => "Small Health Potion", "HP" => 7, "STR" => 0, "DEF" => 0]);
    $SmallPotionSTR = new Item(["Name" => "Small Streght Potion", "HP" => 0, "STR" => 4, "DEF" => 0]);
    $SmallPotionDEF = new Item(["Name" => "Small Defense Potion", "HP" => 0, "STR" => 0, "DEF" => 4]);
    $PotionWAR = new Item(["Name" => "Small War Potion", "HP" => 4, "STR" => 3, "DEF" => 3]);
    $HealthPotion = new Item(["Name" => "Health Potion", "HP" => 15, "STR" => 1, "DEF" => 1]);
    $SuperPotion = new Item(["Name" => "Super Health Potion", "HP" => 25, "STR" => 3, "DEF" => 3]);
    $MarioStar = new Item(["Name" => "Mario Star", "HP" => 13, "STR" => 7, "DEF" => 7]);
    $Mushroom = new Item(["Name" => "Mushroom", "HP" => 30, "STR" => 3, "DEF" => 0]);
    $Steroids = new Item(["Name" => "Steroids", "HP" => 0, "STR" => 18, "DEF" => 10]);
    $DragonBalls = new Item(["Name" => "DragonBalls", "HP" => 40, "STR" => 10, "DEF" => 5]);
    $InfinityStones = new Item(["Name" => "Infinity Stones", "HP" => 45, "STR" => 19, "DEF" => 15]);

    $arrItem = [$SmallPotionHealth, $SmallPotionSTR, $SmallPotionDEF, $PotionWAR, $HealthPotion, $SuperPotion, $MarioStar, $Mushroom, $Steroids, $DragonBalls, $InfinityStones];

?>