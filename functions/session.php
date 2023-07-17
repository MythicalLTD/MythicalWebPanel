<?php 
if (isset($_COOKIE['token'])) {
  $session_id = $_COOKIE['token'];
  $query = "SELECT * FROM mythicalwebpanel_users WHERE api_key='".$session_id."'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
      session_start();
      $userdbd = $conn->query("SELECT * FROM mythicalwebpanel_users WHERE api_key='$session_id'")->fetch_array();
      $_SESSION["token"] = $session_id;
      $_SESSION['loggedin'] = true;
      $_SESSION['SESSION_EMAIL'] = $userdbd['email'];
      $_SESSION["email"] = $userdbd['email'];
      $_SESSION["username"] = $userdbd['username'];
  }
  else
  {
      if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/');
        }
      }
      echo '<script>window.location.replace("/auth/login");</script>';
  }
}
else
{
  if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
  }
  header('location: /auth/login');
}
?>