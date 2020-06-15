<?php

/**
 * Class menu
 */
class menu
{
    private $info;
    private $price;
    private $name;
    private $image;

    /**
     * menu constructor.
     * @param $name
     * @param $price
     * @param $info
     * @param $image
     */
    function __construct($name, $price, $info, $image) {
        $this->name = $name;
        $this->price = $price;
        $this->info = $info;
        $this->image = $image;

    }

    /**
     * function toString
     */
    function toString() {
        echo "<div class=\"single-menu\">
        <img src=\"/328/Khamu/Restaurant-master/images/food_icon0" . $this->image . ".jpg\" alt=\"food1\">
        <div class=\"menu-content\">
            <h4>" . $this->name . " <span> $" . $this->price . "</span></h4>
            <p>" . $this->info . "</p>
        </div>
    </div>";
    }
}
