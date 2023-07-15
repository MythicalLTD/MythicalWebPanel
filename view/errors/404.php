<?php 
http_response_code(404); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> | 404</title>
    <link rel="stylesheet" href="<?= $appURL?>/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= $appURL?>/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= $appURL?>/assets/css/style.css">
    <link rel="shortcut icon" href="" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
          <div class="row flex-grow">
            <div class="col-lg-7 mx-auto text-white">
              <div class="row align-items-center d-flex flex-row">
                <div class="col-lg-6 text-lg-right pr-lg-4">
                  <h1 class="display-1 mb-0">404</h1>
                </div>
                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                  <h2>SORRY!</h2>
                  <h3 class="font-weight-light">The page you’re looking for was not found.</h3>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 text-center mt-xl-2">
                  <a class="text-white font-weight-medium" href="/">Back to home</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?= $appURL?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= $appURL?>/assets/js/off-canvas.js"></script>
    <script src="<?= $appURL?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?= $appURL?>/assets/js/misc.js"></script>
    <script src="<?= $appURL?>/assets/js/settings.js"></script>
    <script src="<?= $appURL?>/assets/js/todolist.js"></script>
  </body>
</html>