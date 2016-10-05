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
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->


		<div id="projects">
			<?php while ( have_posts() ) : the_post();
			echo '<div class="project hvr-float">';
		    echo '<a class="" href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">';
		    echo '<span class="cover">';
		    the_post_thumbnail('project-thumb');
		    echo '<div class="project-caption">';
		    echo '<h1 class="project-title">' . get_the_title() . '</h1>';
		     if ( 'projects' == get_post_type()) {
		    echo get_the_term_list($post->ID, 'clients', '<h1 class="project-client">', '</h1><h1 class="project-client">', '</h1>' );
	    	}
			else {
			 echo get_the_term_list($post->ID, 'year', '<h1 class="project-client">', '</h1><h1 class="project-client">', '</h1>' );
			}
		    echo '</div>';
		    echo '</span>';
		    echo '</a>';
		    echo '</div>';

			endwhile; // End of the loop.
			?>
		</div>
		
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();


