<?php 
function writeLog($type, $log, $conn)
{
    $ip_address = getclientip();
    if ($ip_address == "") {
        $ip_address = "Unknown";
    }
    try {
        if ($log == "") {
            $query = "INSERT INTO mythicalwebpanel_logs (log, type) VALUES ('Server sent blank value to logs', 'error')";
        } else {
            $w_log2 = '[' . $ip_address . '] ' . $log;
            $query = "INSERT INTO mythicalwebpanel_logs (log, type) VALUES ('$w_log2', '$type')";
            $conn->query($query);
            $conn->close();
        }
    } catch (Exception $e) {
        
    }
}
?>