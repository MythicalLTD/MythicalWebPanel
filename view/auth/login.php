<?php 
include('../include/php-csrf.php');
session_start();
$csrf = new CSRF();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if ($csrf->validate('my-form')) {
    if (!$settings['reCAPTCHA_sitekey'] == "disabled" || $settings['reCAPTCHA_secretkey'] == "disabled") {
      $response = $_POST["g-recaptcha-response"];
      $url = 'https://www.google.com/recaptcha/api/siteverify';
      $data = array(
        'secret' => $settings['reCAPTCHA_secretkey'],
        'response' => $_POST["g-recaptcha-response"]
      );
      $options = array(
        'http' => array(
          'header' => "Content-type: application/x-www-form-urlencoded\r\n",
          'method' => 'POST',
          'content' => http_build_query($data)
        )
      );
      $context = stream_context_create($options);
      $verify = file_get_contents($url, false, $context);
      $captcha_success = json_decode($verify);
      
      if ($captcha_success->success == false) {
        writeLog("auth","Faild to login: 'reCAPTCHA faild'",$conn);
        echo "<center><div class='return' style='background-color:red'>CAPTCHA Failed. <a href='/auth/login' style='color:white;'>Click to retry</a></div></center>";
      }
      else if ($captcha_success->success==true) {
        if (isset($_POST['login'])) {
              $username = mysqli_real_escape_string($conn, $_POST['username']);
              $password = mysqli_real_escape_string($conn, $_POST['password']);
              $query = "SELECT * FROM mcstaffx_users WHERE username = '$username'";
              $result = mysqli_query($conn, $query);
              if ($result) {
                  if (mysqli_num_rows($result) == 1) {
                      $row = mysqli_fetch_assoc($result);
                      $hashedPassword = $row['password'];
                      if (password_verify($password, $hashedPassword)) {
                          $token = $row['token'];
                          $username = $row['username'];
                          $cookie_name = 'token';
                          $cookie_value = $token;
                          setcookie($cookie_name, $cookie_value, time() + (10 * 365 * 24 * 60 * 60), '/');
                          writeLog('auth', "The user ($username) logged in.",$conn);
                          header('location: /dashboard');
                      } else {
                          writeLog("auth","Faild to login: 'Invalid Password'",$conn);
                          header('location: /auth/login?error=Invalid Password');
                      }
                  } else {
                      echo "Invalid username";
                      writeLog("auth","Faild to login: 'Invalid username'",$conn);
                      header('location: /auth/login?error=Invalid username');
                  }
              } else {
                  writeLog("error", "Faild to log user in",$conn);
                  header('location: /auth/login?error=Faild to log user in');
              }
              mysqli_free_result($result);
              $conn->close();
           }
        }
        else {
         setcookie('api_key', '', time() - (10 * 365 * 24 * 60 * 60 * 2), '/');
         setcookie('phpsessid', '',time() - (10 * 365 * 24 * 60 * 60 * 2), '/');
         writeLog("error", "Faild to log user in: 'CSRF Verfication Faild'",$conn);
         header('location: /auth/login?error=CSRF Verfication Faild');
        }
      }
    }
      
}

?>
<html lang="en" data-lt-installed="true">
   <head>
    <?php include(__DIR__.'/../components/head.php');?>
    <title><?= $settings['name'] ?> | Login</title>
   </head>
<body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3"><?= $lang['app_login']?></h3>
                <form method="post">
                  <div class="form-group">
                    <label><?= $lang['login_username']?></label>
                    <input type="text" name="username" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label><?= $lang['login_password']?></label>
                    <input type="password" name="password" class="form-control p_input">
                  </div>
                  <?php 
                  if (!$settings['reCAPTCHA_sitekey'] == "" || $settings['reCAPTCHA_secretkey'] == "") {
                    ?>
                    <center><div class="g-recaptcha" data-sitekey="<?= $settings['reCAPTCHA_sitekey']?>"></div><center>
                    <?php
                  }
                  ?>
                  &nbsp;
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn"><?= $lang['app_login']?></button>
                  </div>
                  <?=$csrf->input('my-form');?>
                  <p class="sign-up"><?= $lang['login_staffjoin']?><a href="#"> <?= $lang['app_applystaff']?> </a></p>
                </form>
                <?php 
                if (isset($_GET['error'])) {
                  ?>
                     <div class="alert alert-danger" role="alert"> <?= $_GET['error']?> </div>
                  <?php
                }
                else
                { 

                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include(__DIR__.'/../ui/footer.php');?>
   </body>
</html>
