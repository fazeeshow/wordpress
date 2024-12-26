<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Astrocare
 */

get_header();
?>
<section class="ast_section ast_blog_section">
	<div class="container">
		<div class="row g-4 wow fadeInUp">
			<div class="<?php esc_attr(astrocare_post_layout()); ?>">
				<div class="row row-cols-1 row-cols-md-2 g-4">
					<?php if( have_posts() ): ?>

						<?php while( have_posts() ) : the_post();

							get_template_part('template-parts/content/content','search'); 

						endwhile; 
						the_posts_navigation();
						?> 
						
					<?php else: ?>

						<?php get_template_part('template-parts/content/content','none'); ?>
						
					<?php endif; ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
