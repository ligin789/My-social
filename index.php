<?php
session_start();
if (isset($_SESSION["mysocialid"]) != session_id()) 
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mysocial</title>
      <link rel="icon" type="image/ico" href="Image/mysocial_trans.png" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="mysocialstyle.css" />
  </head>
  <body>

    <div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome back!</h3>
              <form action="logincheck.php" method="post">
                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email"required autofocus>
                  <label for="inputEmail">Email address</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
                  <label for="inputPassword">Password</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="submit">Sign in</button>
                
                  <a href="signup.php" class="btn btn-lg btn-secondary btn-block btn-login text-uppercase font-weight-bold mb-2">Join Us
</a>
<div class="text-center">
                  <a class="small" href="#">Forgot password?</a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer id="sticky-footer" class="py-2 bg-dark text-white-50">
    <div class="container text-center">
      <small>liginzz &trade; </small>
    </div>
  </footer>
  </body>
</html>
<?php
}
else
  {
    echo ("<script LANGUAGE='JavaScript'>   
                  window.location.href='newsfeed.php';
                  </script>");
  }
    ?>
