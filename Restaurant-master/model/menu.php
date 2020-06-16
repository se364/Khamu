<?php

/**
 * Class menu
 */
class menu
{

    protected $price;
    protected $name;


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


