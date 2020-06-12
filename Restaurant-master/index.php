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
//require_once("model/data-layer.php");
require_once ("model/validation.php");


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

//    $genders = getGender();
//
//    //If the form has been submitted
//    if($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//        //["food"]=>"tacos" [$_POST);"meal"]=>"lunch"
//
//        //Validate the data
//
//
//        if (!validName($_POST['fname'])) {
//
//            // set an error variable in the f3 hive
//            $f3->set('errors["fname"]', 'Invalid First Name');
//        }
//        if (!validName($_POST['lname'])) {
//
//            // set an error variable in the f3 hive
//            $f3->set('errors["lname"]', 'Invalid Last Name');
//        }
//        if (!validAge($_POST['age'])) {
//
//            // set an error variable in the f3 hive
//            $f3->set('errors["age"]', 'Invalid Age');
//
//        }
//        if (!validPhone($_POST['phone'])) {
//
//            // set an error variable in the f3 hive
//            $f3->set('errors["phone"]', 'Invalid Phone Number');
//
//        }
//
//        // data is valid
//
//        if(empty($f3->get('errors'))) {
//
//            //Store the data in the session array
//            $_SESSION['fname'] = $_POST['fname'];
//            $_SESSION['lname'] = $_POST['lname'];
//            $_SESSION['age'] = $_POST['age'];
//            $_SESSION['gender'] = $_POST['gender'];
//            $_SESSION['phone'] = $_POST['phone'];
//
//            //Redirect to Order 2 page
//            $f3->reroute('profile');
//        }
//    }
//
//
//    $f3->set('gender', $genders);
//    $f3->set('fname', $_POST['fname']);
//    $f3->set('lname', $_POST['lname']);
//    $f3->set('age', $_POST['age']);
//    $f3->set('phone', $_POST['phone']);
    $view = new Template();
    echo $view->render('views/menu.html');

});

//Order route
//$f3->route('GET|POST /profile', function($f3) {
//
//    $seeks = getSeek();
//
//    //If the form has been submitted
//    if($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//        if (!validEmail($_POST['email'])) {
//
//            // set an error variable in the f3 hive
//            $f3->set('errors["email"]', 'Invalid Email');
//        }
//
//        if (empty($f3->get('errors'))) {
//
//            //Store the data in the session array
//            $_SESSION['email'] = $_POST['email'];
//            $_SESSION['state'] = $_POST['state'];
//            $_SESSION['seek'] = $_POST['seek'];
//            $_SESSION['bio'] = $_POST['bio'];
//
//
//            //Redirect to summary page
//            $f3->reroute('interest');
//        }
//    }
//
//    $f3->set('seek', $seeks);
//    $f3->set('email', $_POST['email']);
//    $view = new Template();
//    echo $view->render('views/ProfileInfo.html');
//});

//Breakfast route

$f3->route('GET|POST /reservation', function($f3) {

//    $outdoor = getOutdoor();
//    $indoor =  getIndoor();
//
//    //If the form has been submitted
//    if($_SERVER['REQUEST_METHOD'] == 'POST') {
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
//        $_SESSION['indoor'] = $_POST['indoor'];
//        $_SESSION['outdoor'] = $_POST['outdoor'];
//
//
//        //Redirect to summary page
//        $f3->reroute('summary');
//
//    }
//
//    $f3->set('indoor', $indoor);
//    $f3->set('outdoor', $outdoor);
//    $f3->set('selectIndoor', $_POST['indoor']);
//    $f3->set('selectOutdoor', $_POST['outdoor']);

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

            mail(Semran@mail.greenriver.edu, "reservation made!", $msg);
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