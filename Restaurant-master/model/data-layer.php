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