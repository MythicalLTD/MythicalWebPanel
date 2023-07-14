<?php 
use Symfony\Component\Yaml\Yaml;
$config = Yaml::parseFile('../config.yml');
$appsettings = $config['app'];
$cfg_debugmode = $appsettings['debug'];
$cfg_ignoredebugmodemsg = $appsettings['silent_debug'];
if ($cfg_debugmode == true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if (!$cfg_ignoredebugmodemsg == true) 
    {
        ?>
        <script>
            alert("!!! WARNING Debug mode is active !!!\nIf this is a live production environment, please disable it in config.yml");
        </script>
        <?php
    }
}
else
{
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}
//DATABASE CONNECTION
include('dbconn.php');
//GET USER REAL IP
include('../functions/getclientip.php');
$ip_address = getclientip();    

?>