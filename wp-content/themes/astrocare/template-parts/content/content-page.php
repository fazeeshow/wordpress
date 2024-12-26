<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astrocare
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('ast_blog_item'); ?>>
	<div class="ast_blog_img">
		<a href="<?php the_permalink(); ?>">
			<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
			<?php endif; ?>
		</a>
	</div>
	<div class="ast_blog_content">
		<div class="ast_blog_post">
			<?php
			$astrocare_author_name = get_the_author();
			$astrocare_author_link = get_author_posts_url(get_the_author_meta('ID'));
			?>
			<a href="<?php echo esc_url($astrocare_author_link); ?>">
				<i class="fa fa-user"></i> <?php esc_html_e('By', 'astrocare'); ?> <?php echo esc_html($astrocare_author_name); ?>
			</a>
			<a href="<?php echo esc_url( get_comments_link() ); ?>">
				<i class="fa fa-comment-o"></i>
				<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					printf( _x( 'One Comment', 'comments title', 'astrocare' ) );
				} else {
					printf(
						_nx(
							'Comment (%1$s)',
							'Comments (%1$s)',
							$comments_number,
							'comments title',
							'astrocare'
						),
						number_format_i18n( $comments_number )
					);
				}
				?>
			</a>
		</div>
		<div class="ast_blog_date">
			<span class="date"><?php echo esc_html( get_the_date('F j, Y')); ?></span>
		</div>

		<?php 
		if ( is_single() ) :
			
			the_title('<h3 class="ast_blog_title">', '</h3>' );

		else:

			the_title( sprintf( '<h3 class="ast_blog_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );

		endif; 
		?>
		<div class="ast_blog_btn">
			<a href="<?php the_permalink(); ?>" class="astro_btn"><span><?php esc_html_e('Read More', 'astrocare'); ?></span></a>
		</div>
	</div>
</div>