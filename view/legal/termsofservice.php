<!DOCTYPE html>

<html
  lang="en"
  class="dark-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= $appURL ?>/assets/"
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <?php include(__DIR__ . '/../requirements/head.php'); ?>
    <title><?= $settings['name']?> | Terms of Service</title>
    <link rel="stylesheet" href="<?= $appURL ?>/assets/vendor/css/pages/page-help-center.css" />
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include(__DIR__.'/../components/sidebar.php')?>
        <div class="layout-page">
          <?php include(__DIR__.'/../components/navbar.php')?> 
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Help Center /</span> Terms of Service</h4>
              <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 mb-lg-0 mb-4">
                  <h6>Support</h6>
                  <div class="nav-align-left">
                    <ul class="nav nav-pills border-0 w-100 gap-1">
                      <li class="nav-item" >
                        <a href="/help-center/tickets" class="nav-link">Home</a>
                      </li>
                      <li class="nav-item" >
                        <a href="/help-center/tickets" class="nav-link">Tickets</a>
                      </li>
                      <li class="nav-item">
                        <button class="nav-link active" data-bs-target="javascript:void(0);">Terms and service</button>
                      </li>
                      <li class="nav-item">
                        <a href="/help-center/tickets" class="nav-link">Privacy Policy</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-8">
                  <div class="card overflow-hidden">
                    <div class="card-body">
                      <a class="btn btn-label-primary mb-4" href="/help-center">
                        <i class="ti ti-chevron-left scaleX-n1-rtl me-1 me-1"></i>
                        <span class="align-middle">Back</span>
                      </a>
                      <h4 class="d-flex align-items-center mt-2 mb-4">
                        <span class="badge bg-label-secondary p-2 rounded me-3">
                        <i class="fa-sharp fa-solid fa-shield"></i>
                        </span>
                        Terms of Service
                      </h4>
                      <p>
                        In a professional context it often happens that private or corporate clients corder a
                        publication to be made and presented with the actual content still not being ready. Think of a
                        news blog that's filled with content hourly on the day of going live. However, reviewers tend to
                        be distracted by comprehensible content, say, a random text copied from a newspaper or the
                        internet. The are likely to focus on the text, disregarding the layout and its elements.
                      </p>
                      <p>
                        Most of its text is made up from sections 1.10.32–3 of Cicero's De finibus bonorum et malorum
                        (On the Boundaries of Goods and Evils; finibus may also be translated as purposes). Neque porro
                        quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit is the first
                        known version ("Neither is there anyone who loves grief itself since it is grief and thus wants
                        to obtain it"). It was found by Richard McClintock, a philologist, director of publications at
                        Hampden-Sydney College in Virginia; he searched for citings of consectetur in classical Latin
                        literature, a term of remarkably low frequency in that literary corpus.
                      </p>
                      <p>
                        Cicero famously orated against his political opponent Lucius Sergius Catilina. Occasionally the
                        first Oration against Catiline is taken for type specimens: Quo usque tandem abutere, Catilina,
                        patientia nostra? Quam diu etiam furor iste tuus nos eludet? (How long, O Catiline, will you
                        abuse our patience? And for how long will that madness of yours mock us?)
                      </p>
                      <hr class="container-m-nx my-4" />
                      <div class="d-flex justify-content-between flex-wrap gap-3 mb-3">
                        <div class="article-info">
                          <h5 class="mb-1">Did you find this article helpful?</h5>
                          <p class="card-text">55 People found this helpful</p>
                        </div>
                        <h5>Still need help? <a href="javascript:void(0);">Contact us?</a></h5>
                      </div>
                      <div class="article-votes">
                        <a href="javascript:void(0);" class="badge bg-label-primary me-2 p-2"
                          ><i class="ti ti-thumb-up ti-xs"></i
                        ></a>
                        <a href="javascript:void(0);" class="badge bg-label-primary p-2"
                          ><i class="ti ti-thumb-down ti-xs"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php include(__DIR__.'/../components/footer.php')?>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
      <div class="drag-target"></div>
    </div>
    <?php include(__DIR__.'/../requirements/footer.php')?>
    <script src="<?= $appURL ?>/assets/js/dashboards-ecommerce.js"></script>
  </body>
</html>
