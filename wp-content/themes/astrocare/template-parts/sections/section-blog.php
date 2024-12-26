<?php
$astrocare_hs_blog		 	 = get_theme_mod('hs_blog','1');
$astrocare_blog_title        = get_theme_mod('blog_title','Latest News');
$astrocare_blog_subtitle     = get_theme_mod('blog_subtitle','Latest From Article');
$astrocare_blog_display_num  = get_theme_mod('blog_display_num','3');
if($astrocare_hs_blog == '1'){ ?>
	<section class="ast_section ast_blog_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 m-auto">
					<div class="astro_theme_titles">

						<?php if ( ! empty( $astrocare_blog_title ) ) : ?>
							<h5 class="theme_title"><?php do_action('astrocare_title_img_seprator'); ?><?php echo wp_kses_post($astrocare_blog_title); ?></h5>
						<?php endif; ?>

						<?php if ( ! empty( $astrocare_blog_subtitle ) ) : ?>
							<h2 class="theme_subtitle"><?php echo wp_kses_post($astrocare_blog_subtitle); ?></h2>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<div class="row g-4">
				<?php 	
				$astrocare_blogs_args = array( 'post_type' => 'post', 'posts_per_page' => $astrocare_blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 	
				$astrocare_blog_wp_query = new WP_Query($astrocare_blogs_args);
				if($astrocare_blog_wp_query)
				{	
					while($astrocare_blog_wp_query->have_posts()): $astrocare_blog_wp_query->the_post(); ?>
						<div class="col-lg-4 col-md-6 col-12 wow fadeInUp">
							<?php get_template_part('template-parts/content/content','page'); ?>
						</div>
					<?php endwhile; } ?>
				</div>
			</div>
		</section>
		<?php } ?>