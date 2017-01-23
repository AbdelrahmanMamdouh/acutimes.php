<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cjc
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="page-container">
		<header id="masthead" role="banner">
			<div class="container-fluid">
				<div class="row">
<!--
					<div class="col-sm-2 left-panel">
						<a href="<?php echo get_permalink( get_page_by_title( 'Login' ) ) ?>">
							<img src="<?php echo get_template_directory_uri();?>/img/sprites/account-active.png" alt="">
						</a>
					</div>
-->
					<?php if (has_custom_logo()): ?>
						<div class="logo col-sm-10 col-md-2">
							<a href="<?php echo site_url()?>" class="logo__link">
								<img src="<?php echo Mcustomizer::getCustomLogoURL() ?>" alt="Cairo Jazz Club Logo">
							</a>
						</div>
					<?php endif; ?>

					<div class="col-sm-2 right-panel">
						<a href="#main-menu">
							<img src="<?php echo get_template_directory_uri();?>/img/burger.png" alt="" width="32">
						</a>
					</div>

					<div class="main-menu col-sm-8 col-md-7" id="main-menu">
						<ul>
						<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
							<?php/*
								wp_nav_menu( array(
									'menu'            => 'main-menu',
									'container' => '',
									'container_class' => false,
									'items_wrap' => '%3$s',
								) );*/
							?>
						</ul>
					</div> <!-- /.main-menu -->

					<div class="top-icons col-sm-4 col-md-3">
						<?php get_template_part('template-parts/social-icons' ); ?>
					</div> <!-- /.top-icons -->  
				</div>
			</div>
		</header>
		
	<div id="content" class="site-content">
