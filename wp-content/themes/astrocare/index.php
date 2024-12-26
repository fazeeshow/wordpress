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
 * @package astrocare
 */

get_header(); 
?>
<section class="ast_section ast_blog_section">
	<div class="container">
		<div class="row gy-lg-0 gy-5 wow fadeInUp">
			<div class="<?php esc_attr(astrocare_post_layout()); ?>">

				<?php if ( ! is_active_sidebar( 'astrocare-sidebar-primary' ) ) { ?>
					<div class="row row-cols-1 row-cols-lg-3 g-4">

					<?php }else{ ?>
						<div class="row row-cols-1 row-cols-lg-2 g-4">
						<?php } ?>
						<?php 
						$astrocare_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$astrocare_paged );	
						?>
						<?php if( have_posts() ): ?>
							<?php while( have_posts() ) : the_post(); ?>
								<div class="col">
									<?php get_template_part('template-parts/content/content','page'); ?>
								</div>
							<?php endwhile; ?>
						<?php else: ?>
							<?php get_template_part('template-parts/content/content','none'); ?>
						<?php endif; ?>
					</div>
					<div class="row">
						<div class="col-12 text-center mt-5">
							<div class="ast-post-pagination">
								<?php								
								the_posts_pagination( array(
									'prev_text' => wp_kses_post( '<i class="fa fa-angle-double-left"></i>' ),
									'next_text' => wp_kses_post( '<i class="fa fa-angle-double-right"></i>' ),
								) ); ?>
							</div>
						</div>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<?php get_footer(); ?>