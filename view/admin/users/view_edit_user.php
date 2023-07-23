<?php
include(__DIR__ . '/../../requirements/page.php');
include(__DIR__ . '/../../requirements/admin.php');

if (isset($_GET['edit_user'])) {
    if (!$_GET['id'] == "") {
        $user_query = "SELECT * FROM mythicalwebpanel_users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $user_query);
        mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $user_info = $conn->query("SELECT * FROM mythicalwebpanel_users WHERE id = '" . $_GET['id'] . "'")->fetch_array();
            $username = mysqli_real_escape_string($conn, $_GET['username']);
            $firstName = mysqli_real_escape_string($conn, $_GET['firstName']);
            $lastName = mysqli_real_escape_string($conn, $_GET['lastName']);
            $email = mysqli_real_escape_string($conn, $_GET['email']);
            $avatar = mysqli_real_escape_string($conn, $_GET['avatar']);
            $skey = mysqli_real_escape_string($conn, $_GET['skey']);
            $conn->query("UPDATE `mythicalwebpanel_users` SET `username` = '" . $username . "' WHERE `mythicalwebpanel_users`.`id` = " . $_GET['id'] . ";");
            $conn->query("UPDATE `mythicalwebpanel_users` SET `first_name` = '" . $firstName . "' WHERE `mythicalwebpanel_users`.`id` = " . $_GET['id'] . ";");
            $conn->query("UPDATE `mythicalwebpanel_users` SET `last_name` = '" . $lastName . "' WHERE `mythicalwebpanel_users`.`id` = " . $_GET['id'] . ";");
            $conn->query("UPDATE `mythicalwebpanel_users` SET `api_key` = '" . $skey . "' WHERE `mythicalwebpanel_users`.`id` = " . $_GET['id'] . ";");
            $conn->query("UPDATE `mythicalwebpanel_users` SET `avatar` = '" . $avatar . "' WHERE `mythicalwebpanel_users`.`id` = " . $_GET['id'] . ";");
            $conn->query("UPDATE `mythicalwebpanel_users` SET `email` = '" . $email . "' WHERE `mythicalwebpanel_users`.`id` = " . $_GET['id'] . ";");
            $conn->close();
            header('location: /admin/users/edit?id='.$_GET['id']);
        } else {
            header('location: /admin/users/view?e=Can`t find this user in the database');
            exit();
        }
    } else {
        header('location: /admin/users/view?e=Can`t find this user in the database');
        exit();
    }
} else if (isset($_GET['id'])) {
    if (!$_GET['id'] == "") {
        $user_query = "SELECT * FROM mythicalwebpanel_users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $user_query);
        mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $user_info = $conn->query("SELECT * FROM mythicalwebpanel_users WHERE id = '" . $_GET['id'] . "'")->fetch_array();
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
<!DOCTYPE html>
<html lang="en" class="dark-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-semi-dark"
    data-assets-path="<?= $appURL ?>/assets/" data-template="vertical-menu-template">

<head>
    <?php include(__DIR__ . '/../../requirements/head.php'); ?>
    <title>
        <?= $settings['name'] ?> | Users
    </title>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include(__DIR__ . '/../../components/sidebar.php') ?>
            <div class="layout-page">
                <?php include(__DIR__ . '/../../components/navbar.php') ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / Users /</span>
                            Edit</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-4">
                                    <li class="nav-item">
                                        <a href="/admin/users/edit?id=<?= $_GET['id'] ?>" class="nav-link active"><i
                                                class="ti-xs ti ti-users me-1"></i> Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="/admin/users/edit?tab=security&id=<?= $_GET['id'] ?>"><i
                                                class="ti-xs ti ti-lock me-1"></i> Security</a>
                                    </li>
                                    <!--<li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-billing.html"
                        ><i class="ti-xs ti ti-file-description me-1"></i> Billing & Plans</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-notifications.html"
                        ><i class="ti-xs ti ti-bell me-1"></i> Notifications</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-connections.html"
                        ><i class="ti-xs ti ti-link me-1"></i> Connections</a
                      >
                    </li>-->
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="<?= $user_info['avatar'] ?>" alt="user-avatar"
                                                class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form action="/admin/users/edit" method="GET">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input class="form-control" type="text" id="username"
                                                        name="username" value="<?= $user_info['username'] ?>"
                                                        placeholder="jhondoe" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">First Name</label>
                                                    <input class="form-control" type="text" id="firstName"
                                                        name="firstName" value="<?= $user_info['first_name'] ?>"
                                                        autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Last Name</label>
                                                    <input class="form-control" type="text" name="lastName"
                                                        id="lastName" value="<?= $user_info['last_name'] ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="text" id="email" name="email"
                                                        value="<?= $user_info['email'] ?>"
                                                        placeholder="john.doe@example.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="avatar" class="form-label">Avatar</label>
                                                    <input class="form-control" type="text" id="avatar" name="avatar"
                                                        value="<?= $user_info['avatar'] ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="skey" class="form-label">Secret Key</label>
                                                    <input class="form-control" type="text" id="skey" <?php
                                                    if ($_COOKIE['token'] == $user_info['api_key']) {
                                                        ?> readonly="true"
                                                        <?php
                                                    }
                                                    ?> name="skey" value="<?= $user_info['api_key'] ?>" />
                                                </div>
                                                <input class="form-control" type="hidden" id="id" name="id" value="<?= $_GET['id']?>">

                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" name="edit_user" class="btn btn-primary me-2" value="true">Save changes</button>
                                                <a href="/admin/users/view" class="btn btn-label-secondary">Cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Delete Account</h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <h5 class="alert-heading mb-1">Are you sure you want to this account?
                                                </h5>
                                                <p class="mb-0">Once you delete this account, there is no going back.
                                                    Please be certain.</p>
                                            </div>
                                        </div>
                                        <a href="/admin/users/delete?id=<?= $_GET['id'] ?>"
                                            class="btn btn-danger deactivate-account">Deactivate Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include(__DIR__ . '/../../components/footer.php') ?>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
    <?php include(__DIR__ . '/../../requirements/footer.php') ?>
    <!-- Page JS -->
    <script src="../../assets/js/pages-account-settings-account.js"></script>
</body>

</html>