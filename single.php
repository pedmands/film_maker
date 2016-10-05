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
		$prevThumbnail = get_the_post_thumbnail( $prevPost->ID, array(160,95));
		$prevTitle = get_the_title($prevPost->ID);
		$nextPost = get_next_post();
		$nextThumbnail = get_the_post_thumbnail( $nextPost->ID, array(160,95));
		$nextTitle = get_the_title($nextPost->ID);

		get_template_part( 'template-parts/content', get_post_format() );
		?>

		
		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->

	</div><!-- #primary -->
	<div class="post-navigation">
				<div class="nav-links">
					<div class="nav-previous">
					
						<div class="prev-title">
						<h5 class="prev-post">Previous:</h5>
							<?php
								previous_post_link( '%link', '<span class="b-button">' . $prevThumbnail . '<h4 class="nav-title">' . $prevTitle . '</h4></span>' );
							?>
						</div>
					</div>
					<div class="nav-next">
					
						<div class="next-title">
						<h5 class="next-post">Next:</h5>
							<?php
								next_post_link( '%link', '<span class="b-button">' . $nextThumbnail . '<h4 class="nav-title">' .  $nextTitle . '</h4></span>' );
							?>
						</div>
					</div>
				</div> <!-- nav-links -->
			</div> <!-- .post-navigation -->

<?php
get_sidebar();
get_footer();
