<?php 
try {
    require("../vendor/autoload.php");
}
catch(Exception $e) {
    die('Woopps this looks like your packages are broken or you installed the wrong version of McStaffX please check the docs error: "<code>ROUTER-CNI</code>"');
}
$router = new \Router\Router();
$router->add('/', function() {
    require("../include/main.php");
    require("../view/index.php");
});

$router->add('/auth/login', function() {
    require("../include/main.php");
    require("../view/auth/login.php");
});

$router->add('/auth/logout', function() {
    require("../include/main.php");
    require("../functions/logout.php");
});

$router->add("/e/critical", function() {;
    require("../view/errors/critical.php");
});

$router->add("/e/404", function() {
    require("../include/main.php");
    require("../view/errors/404.php");
});

$router->add("/e/401", function() {
    require("../include/main.php");
    require("../view/errors/401.php");
});

$router->add("/e/maintenance", function() {
    require("../include/main.php");
    require("../view/errors/maintenance.php");
});

$router->add("/(.*)", function() {
    require("../include/main.php");
    require("../view/errors/404.php");
});

$router->route();
?>