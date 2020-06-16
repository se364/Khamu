<?php
class sideMenu extends menu {

    private $_name;
    private $_price;
    /**
     * menu constructor.
     * @param $name
     * @param $price
     */
    function __construct($name, $price) {
        parent::__construct($name, $price);
        $this->_name = $name;
        $this->_price = $price;

    }

    /**
     * function toString
     */
    function __toString() {
        return "<div class=\"col-md-3\">
                <div class=\"form-check\">
                    <label class=\"form-check-label\" ><input class=\"form-check-input\" type=\"checkbox\" value=\" ". $this->_name . "\" id=side[] name=\"side[]\">
                        " . $this->_name . ", $" . $this->_price . "
                    </label>
                </div>
              </div>";
    }
}