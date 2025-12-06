<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php bloginfo('name'); ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <?php wp_head(); ?>


</head>

<header class="bg-white text-dark border-bottom mb-0">
  <div class="container d-flex align-items-center py-2">

    <!-- Logo -->
    <div class="d-flex align-items-center">
      <!-- Logo -->
      <a href="<?php echo home_url(); ?>" class="d-flex align-items-center me-3" title="<?php bloginfo('name'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/picture/logo_tagline.png" alt="<?php bloginfo('name'); ?>"
          style="height:50px;">
      </a>

      <!-- Time -->
      <div class="border-start ps-2">
        <span class="text-muted">
          Hôm nay là: <?php echo date_i18n('d/m/Y', current_time('timestamp')); ?>
        </span>
      </div>
    </div>
    <!-- Center navigation -->
    <div class="d-none d-lg-flex align-items-center flex-grow-1 justify-content-center gap-3 ms-5 w-auto">

      <!-- Mới nhất -->
      <a style="" href="#" class="text-decoration-none text-dark border-end pe-2">Mới nhất</a>

      <!-- Tin theo khu vực (dropdown) -->
      <div class="dropdown">
        <a class="text-decoration-none text-dark dropdown-toggle border-end pe-2" href="#" role="button"
          data-bs-toggle="dropdown" aria-expanded="false">
          Tin theo khu vực
        </a>
        <ul class="dropdown-menu ">
          <li><a class="dropdown-item" href="#">Hà Nội</a></li>
          <li><a class="dropdown-item" href="#">Hồ Chí Minh</a></li>
        </ul>
      </div>

      <!-- International -->
      <a href="#" class="text-decoration-none text-dark d-flex align-items-center gap-1 ms-3 border-end pe-2">
        <svg class="ic ic-evne" width="16" height="16">
          <use href="#letter-E"></use>
        </svg>
        International
      </a>
      <!-- Search -->
      <form class="input-group mb-0 w-50" id="formSearchHeader">
        <span class="input-group-text bg-white border-end-0" type="submit"> <svg class="ic ic-search" width="16"
            height="16">
            <use href="#Search"></use>
          </svg>
        </span>
        <input class="form-control " type="text" placeholder="Tìm kiếm" aria-label="Search">
      </form>

      <!-- Mobile menu toggle -->
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#mobileHeaderMenu" aria-controls="mobileHeaderMenu" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>

  <!-- Mobile menu -->
  <div class="collapse" id="mobileHeaderMenu">
    <div class="container py-2 d-flex flex-column gap-2">
      <a href="#" class="text-decoration-none">Mới nhất</a>
      <div class="dropdown">
        <a class="text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Tin theo khu vực
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Hà Nội</a></li>
          <li><a class="dropdown-item" href="#">Hồ Chí Minh</a></li>
        </ul>
      </div>
      <a href="#" class="text-decoration-none d-flex align-items-center gap-1">
        <svg class="ic ic-evne" width="16" height="16">
          <use href="#letter-E"></use>
        </svg>
        International
      </a>
      <form class="d-flex align-items-center mt-2" id="formSearchHeaderMobile" style="gap: 4px;">
        <input class="form-control form-control-sm rounded-pill border border-secondary" type="search"
          placeholder="Tìm kiếm" aria-label="Search" style="padding: 4px 12px;">
        <button class="btn btn-sm btn-primary rounded-circle d-flex align-items-center justify-content-center"
          type="submit" style="width: 32px; height: 32px; padding: 0;">
          <svg class="ic ic-search" width="16" height="16">
            <use href="#Search"></use>
          </svg>
        </button>
      </form>

      </form>
    </div>
  </div>
</header>