<?php
// print_r($_POST);
// die();
$fname = $_POST['fnameValue'];
$lname = $_POST['lnameValue'];
$email = $_POST['emailValue'];
$password = $_POST['passwordValue'];


// instantiate RegisterContr class
include "../classes/dbh.class.php";
include "../classes/register.class.php";
include "../classes/register-contr.class.php";
$register = new RegisterContr($fname, $lname, $email, $password);


// run error handlers and user register
$register->registerUser();

if ($register->err) {
    echo $register->err;
} else {

    // Send the user to welcome page
    // use echo to send it as a response to js

    echo $register->location;
}
