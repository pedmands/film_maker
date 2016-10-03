<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lance
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--    Adobe Typekit Call-->
<script src="https://use.typekit.net/cgp8ons.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lance' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <div class="branding-box">
			<div class="site-branding">
                    <h1 class="site-title">
                    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    		Lance <span class="lastname">Edmands</span>
                    	</a>
                    </h1>
			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation" role="navigation">
			 <button class="menu-toggle c-hamburger c-hamburger--htx"" aria-controls="primary-menu" aria-expanded="false">
					<span>toggle menu</span>
				</button>
	                    
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	                   
			</nav><!-- #site-navigation -->
        </div> <!-- branding-box-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
