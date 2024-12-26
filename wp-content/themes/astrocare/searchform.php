<?php
/**
 * The template for displaying search form.
 *
 * @package     Astrocare
 * @since       1.0.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'astrocare' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e('Search …','astrocare'); ?>" value="" name="s">
	</label>
	<button type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'astrocare' ); ?>">
		<i class="fa fa-search"></i>
	</button>
</form>