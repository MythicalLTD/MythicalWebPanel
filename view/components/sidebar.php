<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
  <a href="index.html" class="app-brand-link">
    <span class="app-brand-text demo menu-text fw-bold"><?= $settings['name'] ?></span>
  </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Home</span>
    </li>
    <li class="menu-item <?php 
    if ($current_path == "/dashboard") {
      echo 'active';
    }
    ?>">
      <a href="/dashboard" class="menu-link">
        <i class="menu-icon tf-icons ti ti-home"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>
    <li class="menu-item <?php 
    if ($current_path == "/help-center" || $current_path == "/help-center/tos"|| $current_path == "/help-center/pp") {
      echo 'active';
    }
    ?>">
      <a href="/help-center" class="menu-link">
        <i class="menu-icon tf-icons ti ti-messages"></i>
        <div data-i18n="Help-Center">Help-Center</div>
      </a>
    </li>
  </ul>
</aside>