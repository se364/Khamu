<?php

    //data-layer.php


    /** getSidesPrices()
     * Returns an array of prices for side dishes
     * @return array
     */

    function getSidePrices(){
        return array(2, 3, 3, 3, 3, 3, 4, 5);
    }
    /** getBeveragesPrices()
    * Returns an array of prices for beverages
    * @return array
    */
    function getBeveragesPrices(){
        return array(2, 2, 2, 2, 2, 2, 2, 2);
    }


    /** getSides()
     * Returns an array of side dishes
     * @return array
     */
    function getSides()
    {
        $indoor = array("French Fries", "Onion Rings", "Mozzarella Stick","Nachos","Salsa & Chips","Waffle Fries", "Fried Eggplants", "Small pot pie");
        return $indoor;
    }

    /** getBeverages()
    * Returns an array of beverages
    * @return array
    */
    function getBeverages()
    {
        $outdoor = array("Coke", "Diet Coke", "Dr.Pepper", "Fanta","Sprite","Fruit Punch","Mango Juice","Lemonade");
        return $outdoor;
    }

function setMenu($menuOption) {

    require ("db.php");
    require_once ("mainMenu.php");
    require_once ("sideMenu.php");
    require_once ("beverageMenu.php");


    if($menuOption == "main") {
        $mysqli = "SELECT * FROM menu";
    }

    if($menuOption == "side") {
        $mysqli = "SELECT * FROM sides";
    }

    if($menuOption == "beverage") {
        $mysqli = "SELECT * FROM beverages";
    }

    //Send the query to the db
    $result = mysqli_query($cnxn, $mysqli);

    //convert the query into menu objects
    $i = 0;
    $menuArray = [];
    foreach($result as $row) {
        //var_dump($row);

        $name = $row['name'];
        $price = $row['price'];

        if ($menuOption == "main") {
            $info = $row['info'];
            $id = $row['id'];
            $object = new mainMenu($name, $price, $info, $id);
            $menuArray[$i] = $object;

        }

        if($menuOption == "side"){
            $object = new sideMenu($name, $price);
            $menuArray[$i] = $object;

        }
        if($menuOption == "beverage"){
            $object = new beverageMenu($name, $price);
            $menuArray[$i] = $object;
        }

        $i++;


    }


    return $menuArray;
}