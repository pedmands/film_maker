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
			<?php 
				if ( 'projects' == get_post_type()) {
			    	if (has_term('','clients')){
					    echo get_the_term_list($post->ID, 'clients', '<h2 id="entry-client">', '</h2><h2 id="entry-client">', '</h2>' );
					} else {
						echo get_the_term_list($post->ID, 'director', '<h2 id="entry-client">', '</h2><h2 id="entry-client">', '</h2>' );
					}
			    } else {
			    	if (has_term('', 'year')){
						echo get_the_term_list($post->ID, 'year', '<h2 id="entry-client">', '</h2><h2 id="entry-client">', '</h2>' );
			    	} else {
			    		echo get_the_term_list($post->ID, 'director', '<h2 id="entry-client">', '</h2><h2 id="entry-client">', '</h2>' );
			    	}
				}
			?>
		</div>
<?php if ( 'projects' == get_post_type()) : ?>
	<div class="projects-meta">

	<?php if (get_the_term_list($post->ID, 'agencies')) : ?>
			<?php echo get_the_term_list($post->ID, 'agencies', '<h3 class="agency">','', '</h3>' ); ?>
		<? endif; ?>
		<?php if (get_the_term_list($post->ID, 'editor')) : ?>
			<div class="ed-box">
				<h3 class="meta-title">Edited by</h3>
				<?php echo get_the_term_list($post->ID, 'editor', '<h3 class="editor">', '</h3>' ); ?>
			</div>
		<? endif; ?>

		

		<?php if (get_the_term_list($post->ID, 'director')) : ?>
			<div class="dir-box">	
				<h3 class="meta-title">Directed by</h3>
				<?php echo get_the_term_list($post->ID, 'director', '<h3 class="director">','', '</h3>' ); ?>
			</div>
		<? endif; ?>
		
		<?php if (get_the_term_list($post->ID, 'year') || get_the_term_list($post->ID, 'length')) : ?>
			<div class="year-length">
				<?php if (get_the_term_list($post->ID, 'year')) : ?>
					<?php echo get_the_term_list($post->ID, 'year', '<h3 class="year">','', '</h3>' ); ?>
				<? endif; ?>
				<?php if (get_the_term_list($post->ID, 'length')) : ?>
					<?php echo get_the_term_list($post->ID, 'length', '<h3 class="length">', '</h3>' ); ?>
				<? endif; ?>
			</div>
		<?php endif; ?>
	</div>
<?php elseif ('features' == get_post_type()) : ?>
	<div class="features-meta">
		<?php if (get_the_term_list($post->ID, 'year') || get_the_term_list($post->ID, 'length')) : ?>
			<div class="year-length">
				<?php if (get_the_term_list($post->ID, 'year')) : ?>
					<?php echo get_the_term_list($post->ID, 'year', '<h3 class="year">','', '</h3>' ); ?>
				<? endif; ?>
				<?php if (get_the_term_list($post->ID, 'length')) : ?>
					<?php echo get_the_term_list($post->ID, 'length', '<h3 class="length">', '</h3>' ); ?>
				<? endif; ?>
			</div>
		<?php endif; ?>

		<?php if (get_the_term_list($post->ID, 'studios')) : ?>
			<?php echo get_the_term_list($post->ID, 'studios', '<h3 class="studio">', '</h3>' ); ?>
		<? endif; ?>

		<?php if (get_the_term_list($post->ID, 'director')) : ?>
			<div class="dir-box">	
				<h3 class="meta-title">Directed by</h3>
				<?php echo get_the_term_list($post->ID, 'director', '<h3 class="director">','', '</h3>' ); ?>
			</div>
		<? endif; ?>

		<?php if (get_the_term_list($post->ID, 'editor')) : ?>
			<div class="ed-box">
				<h3 class="meta-title">Edited by</h3>
				<?php echo get_the_term_list($post->ID, 'editor', '<h3 class="editor">', '</h3>' ); ?>
			</div>
		<? endif; ?>
		
		<?php if (get_the_term_list($post->ID, 'agencies')) : ?>
			<?php echo get_the_term_list($post->ID, 'agencies', '<h3 class="agency">','', '</h3>' ); ?>
		<? endif; ?>
	</div>
<?php endif; ?>

<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'lance' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php lance_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
