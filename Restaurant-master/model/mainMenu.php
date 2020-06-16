<?php

class mainMenu extends menu {
    private $_name;
    private $_price;
    private $_info;
    private $_image;


    /**
     * menu constructor.
     * @param $name
     * @param $price
     * @param $info
     * @param $image
     */
    function __construct($name, $price, $info, $image) {
        parent::__construct($name, $price);
        $this->_name = $name;
        $this->_price = $price;
        $this->_info = $info;
        $this->_image = $image;


    }

    /**
     * function toString
     */
    function __toString() {
        return "<div class=\"single-menu\">
        <img src=\"/328/Khamu/Restaurant-master/images/food_icon0" . $this->_image . ".jpg\" alt=\"food1\">
        <div class=\"menu-content\">
            <h4>" . $this->_name . " <span> $" . $this->_price . "</span></h4>
            <p>" . $this->_info . "</p>
            <input type='checkbox' name='mainFood[]' value='". $this->_name . "'>
        </div>
    </div>";
    }
}