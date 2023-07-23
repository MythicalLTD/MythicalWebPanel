<?php
if (isset($_GET['id'])) {
    if (!$_GET['id'] == "") {
        $user_query = "SELECT * FROM mythicalwebpanel_users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $user_query);
        mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $user_info = $conn->query("SELECT * FROM mythicalwebpanel_users WHERE id = '" . $_GET['id'] . "'")->fetch_array();
            if ($user_info['api_key'] == $_COOKIE['token']) {
                header('location: /admin/users/view?e=Can`t delete your own account');
                exit();
            }
        } else {
            header('location: /admin/users/view?e=Can`t find this user in the database');
            exit();
        }
    } else {
        header('location: /admin/users/view?e=Can`t find this user in the database');
        exit();
    }

} else {
    header('location: /admin/users/view');
    exit();
}
?>