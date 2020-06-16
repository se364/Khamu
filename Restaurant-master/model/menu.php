<?php

/**
 * Class menu
 */
class menu
{

    private $price;
    private $name;


    /**
     * menu constructor.
     * @param $name
     * @param $price
     */
    function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;


    }

}
