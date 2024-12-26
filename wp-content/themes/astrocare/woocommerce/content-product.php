<?php
/**
 * The template for displaying product content within loops
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( 'item ', $product ); ?>>
	<div class="product">
		<div class="product-single">
			<div class="product-img">
				<a href="<?php echo esc_url(the_permalink()); ?>">
					<img src="<?php the_post_thumbnail_url(); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" loading="lazy">
				</a>
				<?php if ( $product->is_on_sale() ) : ?>
					<?php echo apply_filters( 'woocommerce_sale_flash', '<div class="sale-ribbon sale"><span class="tag-line">' . esc_html__( 'Sale', 'astrocare' ) . '</span></div>', $post, $product ); ?>
				<?php else: ?>	
					<?php echo apply_filters( 'woocommerce_sale_flash', '<div class="sale-ribbon"><span class="tag-line">' . esc_html__( 'Sale', 'astrocare' ) . '</span></div>', $post, $product ); ?>
				<?php endif; ?>
			</div>
			<div class="product-content-outer">
				<div class="product-content">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

					<?php if ($average = $product->get_average_rating()) : ?>
						<?php echo '<i class="fa fa-star" title="'.sprintf(__( 'Rated %s out of 5', 'astrocare' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'astrocare' ).'</span></i>'; ?>
					<?php endif; ?>

					<div class="price">
						<?php echo $product->get_price_html(); ?>		
					</div>
				</div>
				<div class="product-action">
					<div class="add-to-wishlist-60">
						<div class="yith-wcwl-add-button">
							<?php if(class_exists( 'YITH_WCWL' )) { echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); } ?>
						</div>
					</div>
					<?php woocommerce_template_loop_add_to_cart(); ?>
					<?php if(class_exists( 'YITH_WOOCOMPARE' )) { echo do_shortcode( '[yith_compare_button]' ); } ?>
				</div>
			</div>
		</div>
	</div>
</div>