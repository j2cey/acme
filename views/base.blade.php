<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    @yield('browsertitle')
  </title>

  <script src="js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/styles.css">

  @yield('css')

</head>

<body>

  @include('topnav')
  @yield('outsidecontainer')
  <div class="container">

    <div class="row">
      <br><br>
      @include('errormessage')
    </div>

    <div class="row">
      <div class="col-md-12 push-down">
        @yield('content')
      </div>
    </div>

  </div>

  <footer class="footer">
    <div class="row footer-background">
      <div class="col-md-3">
        <div class="padding-left-8px">
          <h4>Contact us</h4>
          123 Main St.<br>
          Unionville, PA<br>
          76543<br>
          +1 (555) 555-1212
        </div>
      </div>
      <div class="col-md-6">
      </div>
      <div class="col-md-3">
      </div>
    </div>
  </footer>



  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/jquery-validation-1.14.0/dist/localization/messages_fr.js"></script>

  @if((Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level == 2))
    <script src="ckeditor_4.5.6_standard/ckeditor/ckeditor.js"></script>
    <script src="ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
  @endif

  @yield('bottomjs')

</body>

</html>
