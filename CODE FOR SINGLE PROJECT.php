<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sassy_Underscores
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title showcasing">', '</h1>' ); ?>
	</header><!-- .entry-header -->
		<div class="showcase-content">
		<?php the_content(); ?>
	</div><!-- .showcase-content -->

	<div class="showcase-right">
		<div class="taxonomies">
			<div class="project-types">
				<?php echo get_the_term_list($post->ID, 'project-type', '<h3 class="project-type">', '</h3><h3 class="project-type">', '</h3>' ); ?>
		</div>
				<div class="languages">
					<?php echo get_the_term_list($post->ID, 'manufacturer', '<h3>Manufacturer:</h3>', ', ', '' ); ?>
				</div>
				<div class="languages">
					<?php echo get_the_term_list($post->ID, 'languages', '<h3>Languages:</h3>', ', ', '' ); ?>
				</div>
				<div class="software">
					<?php echo get_the_term_list($post->ID, 'software', '<h3>Software:</h3>', ', ', '' ); ?>
				</div>
		</div><!-- taxonomies -->
		<a href="../../#portfolio" class="back-to"><i class="fa fa-arrow-circle-left"></i> Portfolio</a>
	</div><!-- showcase-right -->

		

</article><!-- #post-## -->

