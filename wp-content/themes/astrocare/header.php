<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>
<body <?php body_class();?> >
	<?php wp_body_open(); ?>

	<div class="ast_page-wrapper">
		<a class="skip-link screen-reader-text" href="<?php echo esc_url('#content'); ?>"><?php esc_html_e( 'Skip to content', 'astrocare' ); ?></a>
		<?php astrocare_preloader(); 
		get_template_part('template-parts/sections/section','header'); 
		if ( !is_page_template( 'templates/template-frontpage.php' ) ) {
			astrocare_breadcrumbs_style();  
		}
	?>