<!-- Project tiles, to be controlled by Masonry. -->
<?php $projects = array(
	'post_type' => 'projects',
	'posts_per_page' => 12,
	'orderby' => 'rand'
	);
$project_tiles = new WP_Query($projects); ?>

<div id="projects">
	<?php while ( $project_tiles->have_posts() ) : $project_tiles->the_post();
	    echo '<div class="project">';
	    echo '<a href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">';
	    the_post_thumbnail('portfolio-thumb');
	    echo '<div class="entry-content">';
	    echo '<h1 class="project-title">' . get_the_title() . '</h1>';
	    echo get_the_term_list($post->ID, 'client', '<h1 class="project-client">', '</h1><h1 class="project-client">', '</h1>' );
	    echo '</a>';
	    echo '</div>';
	    echo '</div>';
	endwhile; ?>
</div>

<?php wp_reset_query(); ?>