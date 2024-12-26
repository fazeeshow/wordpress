<?php
/**
 * side bar template
 *
 * @package WordPress
 * @subpackage Astrocare
 */
?>
<?php if ( ! is_active_sidebar( 'astrocare-woocommerce-sidebar' ) ) { return; } ?>
<div class="col-lg-4 order-0">
	<div class="sidebar">
		<?php dynamic_sidebar('astrocare-woocommerce-sidebar'); ?>
	</div>
</div>