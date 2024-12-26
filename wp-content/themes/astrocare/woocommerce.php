<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astrocare
 */

get_header();
?>
<section id="product" class="ast_section ast_product_section">
	<div class="container">
		<div class="row g-4">
			<?php if ( ! is_active_sidebar( 'astrocare-woocommerce-sidebar' ) ) { ?>
				<div id="product-content" class="col-lg-12">
				<?php }else{ ?>
					<div id="product-content" class="col-lg-8">
					<?php } ?>	
					<?php woocommerce_content(); ?>
				</div>
				<?php get_sidebar('woocommerce'); ?>
			</div>	
		</div>
	</div>
</section>
<?php get_footer(); ?>