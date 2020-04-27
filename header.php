<!DOCTYPE html>
<html <?php language_attributes(); ?>>



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
      <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
      <li><a href="/news_list/">NEWS</a></li>
      <li><a href="/all_movies/">MOVIES</a></li>
      <li><a href="/contact/">CONTACT</a></li>
    </ul>
  </nav>

  <a href="#" class="header-open-button sp-only"></a>

  </header>