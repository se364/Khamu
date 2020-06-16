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
        require ("mainMenu.php");
        require ("sideMenu.php");
        require ("beverageMenu.php");


        if ($menuOption == 1) {
            $sql = "SELECT * FROM  menu";
        }
        elseif($menuOption == 2){
            $sql = "SELECT * FROM  sides";
        }
        elseif($menuOption == 3){
            $sql = "SELECT * FROM  beverages";
        }

        //Send the query to the db
        $result = mysqli_query($cnxn, $sql);

        //convert the query into menu objects
        $i = 0;
        foreach($result as $row) {
            //var_dump($row);

            $name = $row['name'];
            $price = $row['price'];


            if ($menuOption == "menu") {
                $info = $row['info'];
                $id = $row['id'];
                $object = new mainMenu($name, $price, $info, $id);
            }
            elseif($menuOption == "sides"){
                $object = new sideMenu($name, $price);
            }
            elseif($menuOption == "beverages"){
                $object = new beverageMenu($name, $price);
            }

            $menuArray[$i] = $object;

            $i++;

        }

        return $menuArray;
    }