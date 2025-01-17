<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astrocare
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) {
			the_title( '<h2 class="entry-title">', '</h2>' );
		} else {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		}

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php astrocare_posted_on(); ?>
			</div>
			<?php
		endif; ?>
	</header>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'astrocare' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'astrocare' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<footer class="entry-footer">
		<?php astrocare_entry_footer(); ?>
	</footer>
</article>