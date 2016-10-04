<?php
/**
 * The sidebar containing social media.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lance
 */

if ( ! is_active_sidebar( 'social-widgets' ) ) {
	return;
}
?>

<aside id="secondary" class="social-media" role="complementary">
	<?php wp_nav_menu( array( 'theme_location' => 'social-menu', 'container_class' => 'menu-social' ) ); ?>
</aside><!-- #secondary -->
