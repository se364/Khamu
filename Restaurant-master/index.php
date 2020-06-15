<?php

/*
 * Shah Emran
 * 4/17/2020
 *
 * Dating Website
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();


//Require the autoload file
require_once("vendor/autoload.php");
require_once("model/data-layer.php");
require_once ("model/validation.php");
require_once ("model/menu.php");



// Create an instance of the Base Class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function(){
    //echo '<h1> Pet Home</h1>';
    $view = new Template();
    echo $view->render('views/home.html');
}
);

//Order route
$f3->route('GET|POST /menu', function($f3) {

    $outdoor = getBeverages();
    $indoor =  getSides();
    $price =  getSidePrices();
    $beverage = getBeveragesPrices();
//
//    //If the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//
//        //valid data
//        if (!validIndoor($_POST['indoor'])) {
//
//            // set an error variable in the f3 hive
//            $f3->set('errors["indoor"]', 'Choose an indoor activity');
//        }
//        if (!validOutdoor($_POST['outdoor'])) {
//
//            // set an error variable in the f3 hive
//            $f3->set('errors["outdoor"]', 'Choose an outdoor activity');
//        }
//
//
//
//        //Store the data in the session array

        $_SESSION['indoor'] = $_POST['indoor'];
        $_SESSION['outdoor'] = $_POST['outdoor'];
//
        //Redirect to summary page
        $f3->reroute('summery');

    }
//

    require ("model/db.php");

    $sql = "SELECT * FROM menu";

//Send the query to the db
    $result = mysqli_query($cnxn, $sql);

//convert the query into menu objects
    $i = 0;
    foreach($result as $row){
        //var_dump($row);

        $name = $row['Name'];
        $price = $row['Price'];
        $info = $row['Info'];
        $id = $row['ID'];

        $object = new menu($name, $price, $info, $id);

        $menuArray[$i] = $object->toString();

        $i++;

    }

    $f3->set('menu', $menuArray);

    $f3->set('indoor', $indoor);
    $f3->set('outdoor', $outdoor);
//    $f3->set('selectIndoor', $_POST['indoor']);
//    $f3->set('selectOutdoor', $_POST['outdoor']);

    $view = new Template();
    echo $view->render('views/menu(db).html');

});


//Breakfast route

$f3->route('GET|POST /reservation', function($f3) {


    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(!validName($_POST['first_name'])) {
            $f3->set('errors["first_name"]', "Please provide a name");
        }

        if(!validName($_POST['last_name'])) {
            $f3->set('errors["last_name"]', "Please provide a name");
        }

        if(!validEmail($_POST['email'])) {
            $f3->set('errors["email"]', "Please provide a name");
        }

        if(!validDate($_POST['datepicker'])) {
            $f3->set('errors["datepicker"]', "Please provide a name");
        }

        if(!validPhone($_POST['phone'])) {
            $f3->set('errors["phone"]', "Please provide a name");
        }


        if (empty($f3->get('errors'))) {

            $msg = $_POST['first_name'] . " " . $_POST['last_name'] . " has made a reservation for " . $_POST['datepicker']
            . "\n\nEmail: " . $_POST['email'] . "\n\nPhone: " . $_POST['phone'];

            mail($_POST['email'], "reservation made!", $msg);

            mail('Semran@mail.greenriver.edu', "reservation made!", $msg);
        }
    }

    $view = new Template();
    echo $view->render('views/reservation.html');
});


// Summary of the profile
$f3->route('GET /summery', function() {
    //echo '<h1>Thank you for your order!</h1>';

    $view = new Template();
    echo $view->render('views/summery.html');

    session_destroy();
});

// Run fat free
$f3->run();

?>