<?php
class sideMenu extends menu {

    /**
     * menu constructor.
     * @param $name
     * @param $price
     */
    function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;

    }

    /**
     * function toString
     */
    function toString() {
        echo "<div class=\"col-md-3\">
                <div class=\"form-check\">
                    <label class=\"form-check-label\" ><input class=\"form-check-input\" type=\"checkbox\" value=\" ". $this->name . "\" id=side[] name=\"side[]\">
                        " . $this->name . ", $" . $this->price . "
                    </label>
                </div>
              </div>";
    }
}