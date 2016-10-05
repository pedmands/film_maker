<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lance
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php lance_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<div class="entry-title">
		<?php the_title( '<h1 class="entry-title-title">', '</h1>' ); ?>
		<?php echo get_the_term_list($post->ID, 'clients', '<h1 class="entry-client">','', '</h1>' ); ?>
	</div>
	<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'lance' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

		?>
	<?php if (get_the_term_list($post->ID, 'director')) : ?>
		<div class="dir-box">	
			<h3 class="meta-title">Directed by</h3>
			<?php echo get_the_term_list($post->ID, 'director', '<h3 class="director">','', '</h3>' ); ?>
		</div>
	<? endif; ?>
	
		
		<div class="project-meta">
		<?php if (get_the_term_list($post->ID, 'agencies')) : ?>
			<?php echo get_the_term_list($post->ID, 'agencies', '<h3 class="agency">','', '</h3>' ); ?>
		<? endif; ?>
		<div class="year-length">
			<?php if (get_the_term_list($post->ID, 'year')) : ?>
				<?php echo get_the_term_list($post->ID, 'year', '<h3 class="year">','', '</h3>' ); ?>
			<? endif; ?>
			<?php if (get_the_term_list($post->ID, 'length')) : ?>
				<?php echo get_the_term_list($post->ID, 'length', '<h3 class="length">', '</h3>' ); ?>
			<? endif; ?>
		</div>
		<?php if (get_the_term_list($post->ID, 'studios')) : ?>
			<?php echo get_the_term_list($post->ID, 'studios', '<h3 class="studio">', '</h3>' ); ?>
		<? endif; ?>
		
		<div class="ed-box">
			<?php if (get_the_term_list($post->ID, 'editor')) : ?>
			<h3 class="meta-title">Edited by</h3>
			<?php echo get_the_term_list($post->ID, 'editor', '<h3 class="editor">', '</h3>' ); ?>
		<? endif; ?>
		</div>
		</div><!-- .project-meta -->
	</div><!-- .entry-content -->
	

		
	

	<footer class="entry-footer">
		<?php lance_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
