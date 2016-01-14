<?php
namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Acme\Auth\LoggedIn;

class AuthenticationController extends BaseController
{
  public function getShowLoginPage()
  {
    echo $this->blade->render("login", [
      'signer' => $this->signer,
    ]);
  }

  public function postShowLoginPage()
  {
    if (!$this->signer->validateSignature($_POST['_token'])) {
      header('HTTP/1.0 400 Bad Request');
      exit;
    }

    $okay = true;
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // look up the user
    $user = User::where('email', '=', $email)
      ->first();

    if ($user != null) {
      // validate credentials
      if (! password_verify($password, $user->password)) {
        $okay = false;
      }

      if ($user->active == 0) {
        $okay = false;
      }
    } else {
      $okay = false;
    }

    if ($okay) {
      // if valid, log them in
      $_SESSION['user'] = $user;
      header("Location: /");
      exit();
    } else {
      // if not valid, redirect to login page
      $_SESSION['msg'] = ["Invalid login!"];
      echo $this->blade->render("login", [
        'signer' => $this->signer,
      ]);
      unset($_SESSION['msg']);
      exit();
    }
  }

  public function getLogout() {
    unset($_SESSION['user']);
    session_destroy();
    header("Location: /login");
    exit();
  }

}
