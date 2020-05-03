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
    <a href="#" class="header-close-button sp-only"></a>
    <ul class="font-serif">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <li>ホーム</li>
      </a>
      <a href="/about/">
        <li>IT全スポとは</li>
      </a>
      <a href="/all_movies/">
        <li>応援しよう！</li>
      </a>
      <a href="/contact/">
        <li>おまけ</li>
      </a>
    </ul>
  </nav>

  <a href="#" class="header-open-button sp-only"></a>

  </header>