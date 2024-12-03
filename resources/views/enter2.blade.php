<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>

{!! SEO::generate() !!}
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<!-- <link href="images/favicon.png" rel="icon" /> -->
<link rel="icon" href="/assets/images/logo.png" type="image/png">
<meta name="author" content="harnishdesign.net">
<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/all.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="css/color-red.css" />
</head>
<body>

<!-- Preloader -->
<div class="preloader preloader-dark">
  <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- Preloader End -->

<div id="main-wrapper" class="oxyy-login-register">
  <div class="hero-wrap min-vh-100">
    <div class="hero-mask opacity-4 bg-secondary"></div>
    <div class="hero-bg hero-bg-scroll mn" style="background-image:url('img/aaa.jpg');"></div>
    <div class="k hero-content d-flex min-vh-100" style="background-image:url('img/aaa.jpg');">
      <div class="container my-auto">
        <div class="row">
          <div class="col-md-9 col-lg-7 col-xl-5 mx-auto">
            <div class="hero-wrap rounded shadow-lg p-4 py-sm-5 px-sm-5 my-4">
              <div class="hero-mask opacity-9 bg-dark"></div>
              <div class="hero-content">
                <div class="logo mb-4"> <a class="d-flex justify-content-center"  title="Oxyy"><img src="img/logo.png" alt="Oxyy"></a> </div>
                <div class="d-flex justify-content-center">ورود به روبیک مارکت</div>
                <div class="d-flex justify-content-center mt-3 mb-3">{{$error}}</div>

                <form action="{{route('mm')}}" id="loginForm" class="form-dark" method="post">
                    @csrf
                  <div class="form-group icon-group">
                    <input name="codeEnter" type="text" class="form-control" value="" id="emailAddress" required placeholder="کد پیامک شده به شماره همراه">
                    <span class="icon-inside"><i class="fas fa-envelope"></i></span> </div>
                  <button class="btn btn-primary btn-block shadow-none mt-4 mb-3" type="submit">ورود</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Styles Switcher End -->
<!-- Script -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Style Switcher -->
<script src="js/switcher.min.js"></script>
<script src="js/theme.js"></script>
</body>
</html>
