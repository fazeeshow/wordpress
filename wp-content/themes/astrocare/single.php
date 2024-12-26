<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astrocare
 */

get_header();
?>
<section id="post-<?php the_ID(); ?>" <?php post_class('ast_section ast_blog_detail'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12 col-12 wow fadeInUp">
				<div class="ast_blog_item ast_blog_detail_item">
					<div class="ast_blog_img">
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
						<?php endif; ?>
					</div>
					<div class="ast_blog_content">
						<div class="ast_blog_date">
							<span class="date"><?php echo esc_html( get_the_date('F j, Y')); ?></span>
						</div>
						<?php 
						if ( is_single() ) :

							the_title('<h3 class="ast_blog_title">', '</h3>' );
						else:
							the_title( sprintf( '<h3 class="ast_blog_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
						endif; 

						the_content( 
							sprintf( 
								__( 'Read More', 'astrocare' ), 
								'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
							) 
						);
						?>
					</div>
				</div>
				<?php comments_template( '', true ); // show comments  ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
