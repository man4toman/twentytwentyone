<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_singular( 'attachment' ) ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: parent post link */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	if ( is_singular( 'post' ) ) {
		// Previous/next post navigation.
		the_post_navigation(
			array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentytwentyone' ) . ' &rarr;</span> ' .
				'<span class="screen-reader-text">' . __( 'Next post:', 'twentytwentyone' ) . '</span> <br/>' .
				'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">&larr; ' . __( 'Previous Post', 'twentytwentyone' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous post:', 'twentytwentyone' ) . '</span> <br/>' .
				'<span class="post-title">%title</span>',
			)
		);
	}

endwhile; // End of the loop.

get_footer();