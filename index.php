<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lance
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php 
	$projects = array(
	'post_type' => 'projects',
	'orderby' => 'rand'
	);
	$project_tiles = new WP_Query($projects);?>

			

	<div id="projects">
	<?php while ( $project_tiles->have_posts() ) : $project_tiles->the_post();
	    echo '<div class="project hvr-float">';
	    echo '<a class="" href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">';
	    the_post_thumbnail('project-thumb');
	    echo '<div class="project-caption">';
	    echo '<h1 class="project-title">' . get_the_title() . '</h1>';
	    echo get_the_term_list($post->ID, 'clients', '<h1 class="project-client">', '</h1><h1 class="project-client">', '</h1>' );
	    echo '</a>';
	    echo '</div>';
	    echo '</div>';
	endwhile; ?>
</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
