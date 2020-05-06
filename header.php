<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

  <title>
    <?php wp_title(' | ', true, 'right'); ?>
    <?php bloginfo('name'); ?>
  </title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <nav class="main-navigation">

    <ul class="font-serif">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <li>
          <p class='pmenu-icon'>ホーム</p>
          <img class='menu-icon white' src=" <?php echo get_template_directory_uri(); ?>/images/home.png" width="25" height="25">
        </li>

      </a>
      <a href="/about/">
        <li>
          <p class='pmenu-icon'>IT全スポとは？</p>
          <img class='menu-icon white' src=" <?php echo get_template_directory_uri(); ?>/images/walk.png" width="30" height="30">
        </li>

      </a>
      <a href="/all_movies/">
        <li>
          <p class='pmenu-icon'>応援しよう！</p>
          <img class='menu-icon white' src=" <?php echo get_template_directory_uri(); ?>/images/megahon.png" width="30" height="30">
        </li>

      </a>
      <a href="/contact/">
        <li>
          <p class='pmenu-icon'>お問い合わせ</p>
          <img class=' menu-icon white' src=" <?php echo get_template_directory_uri(); ?>/images/star.png" width="25" height="25">
        </li>
      </a>
    </ul>
  </nav>

  <a href="#" class="header-close-button sp-only"></a>
  <a href="#" class="header-open-button sp-only"></a>

  </header>