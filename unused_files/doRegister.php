<?php
// initialize variables
$okay = true;

$first_name = "";
$last_name = "";
$username = "";
$verify_username = "";
$password = "";
$verify_password = "";

// get posted form data
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$username = $_REQUEST['username'];
$verify_username = $_REQUEST['verify_username'];
$password = $_REQUEST['password'];
$verify_password = $_REQUEST['verify_password'];

//$whatever = $_REQUEST['whatever'];

// ensure that all fileds are entered
if(($first_name == "")
  || ($last_name == "")
  || ($username == "")
  || ($verify_username) == ""
  || ($password == "")
  || ($verify_password == "")) {
    $okay = false;
}

// first name must be >= 3 characters
if (strlen($first_name) < 3){
  $okay = false;
}

// last name must be >= 3 characters
if (strlen($last_name) < 3){
  $okay = false;
}

// username must match verify username
if ($username != $verify_username){
  $okay = false;
}

// password must match verify password
if ($password != $verify_password){
  $okay = false;
}

if (!($okay)){
  $msg = "You missed of the form data. Please re-enter and try again";
  $_SESSION['msg'] = $msg;
  header("Location: register.php");
  exit();
}

// write all values to screen
foreach ($_REQUEST as $name => $value) {
  echo ucfirst(str_replace('_',' ',$name)) . " = " . $value . "<br>";
}
