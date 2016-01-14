<?php namespace Acme\Validation;

use Respect\Validation\Validator as Valid;


class Validator
{
  public function isValid($validation_data){


    $errors = [];

    foreach ($validation_data as $name => $value) {

      $rules = explode('|',$value);

      foreach ($rules as $rule) {

        $exploded = explode(":", $rule);

        switch ($exploded[0]) {
          case 'min':
            $min = $exploded[1];
            if (Valid::stringType()->length($min)->Validate($_REQUEST[$name]) == false) {
              $errors[] = $name . " must be at least " . $min . " characters long!";
            }
            break;

          case 'email':
            if (Valid::email()->validate($_REQUEST[$name]) == false) {
              $errors[] = $name . " must be a valid email address!";
            }
            break;

          case 'equalTo':
            $secondName = $exploded[1];
            if (isset($_REQUEST[$secondName])){
              if (Valid::equals($_REQUEST[$name])->validate($_REQUEST[$secondName]) == false) {
                $errors[] = $name . " must match " . $secondName . "!";
              }
            }else{
              $errors[] = "No second value found!";
            }
            break;

          case 'unique':
            $model = "Acme\\Models\\" . $exploded[1];
            $table = new $model;
            $results = $table::where($name, '=', $_REQUEST[$name])->get();
            foreach ($results as $item ) {
              $errors[] = $_REQUEST[$name] . " already exists in this system!";
            }
            break;

          default:
            $errors[] = "No value found!";
        }
      }
    }
    return $errors;

  }
}


/*
$errors = [];
$min = 5;
$max = null;
if(Validator::stringType()->length($min, $max)->validate($_REQUEST['first_name']) == false){
  $errors[] = "First name must have at least $min characters!";
}

if(Validator::stringType()->length($min, $max)->validate($_REQUEST['last_name']) == false){
  $errors[] = "Last name must have at least $min characters!";
}

if(Validator::email()->validate($_REQUEST['email']) == false){
  $errors[] = "The email must be a valid email address!";
}

if(Validator::equals($_REQUEST['email'])->validate($_REQUEST['verify_email']) == false){
  $errors[] = "The email and the verify email must the same!";
}

print_r($errors);
*/
