<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lance
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		$prevPost = get_previous_post();
		$prevThumbnail = get_the_post_thumbnail( $prevPost->ID, 'project-thumb');
		$prevTitle = get_the_title($prevPost->ID);
		$nextPost = get_next_post();
		$nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'project-thumb');
		$nextTitle = get_the_title($nextPost->ID);

		get_template_part( 'template-parts/content', get_post_format() );
		?>

		
		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->

	</div><!-- #primary -->
	<div class="project-nav">
	
		<div class="p-nav">
			<div class="p-box">
				<?php if ($prevPost) : ?>
				<h5 class="p-post">Previous:</h5>
				<?endif;?>
				<?php
					previous_post_link( '%link', '<span class="p-button">' . $prevThumbnail . '<h4 class="p-title">' . $prevTitle . '</h4></span>' ); ?>
			</div> <!-- p-box -->
		</div> <!-- p-nav -->
		
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="b-back-to-all">
				Back To All
			</a>
		
		

		<div class="n-nav">
			<div class="n-box">
			<?php if ($nextPost) : ?>
				<h5 class="n-post">Next:</h5>
			<? endif; ?>
				<?php
					next_post_link( '%link', '<span class="n-button">' . $nextThumbnail . '<h4 class="n-title">' .  $nextTitle . '</h4></span>' );
				?>
			</div>
		</div>
			
			</div> <!-- .project-nav -->

<?php
get_sidebar();
get_footer();
