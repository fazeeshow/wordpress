<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Astrocare
 */

get_header();
?>
<section class="ast_section section-404">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-9 col-md-12 col-12 m-auto">
				<div class="ast_card-404">
					<h3 class="ast_error"><?php esc_html_e('Error','astrocare'); ?></h3>
					<h2 class="ast_404-title"><?php esc_html_e('404','astrocare'); ?></h2>
					<h4><?php esc_html_e('Page Not Found','astrocare'); ?></h4>
					<div class="ast_404-btn mt-4">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="astro_btn"><span><?php esc_html_e('Go to Home','astrocare'); ?></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>