<?php
/**
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lance
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="billboard-wrap">
		<?php the_post_thumbnail('billboard',array( 'class' => 'billboard' ) ); ?>
	</div>
	<div class="page-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lance' ),
				'after'  => '</div>',
			) );
		?>

		<div class="agents">
				<?php the_meta(); ?>
			
		</div>	<!-- agents -->

	</div><!-- .entry-content -->
</article><!-- #post-## -->
