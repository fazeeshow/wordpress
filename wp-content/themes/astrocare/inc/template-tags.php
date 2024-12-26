<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Astrocare
 */

if ( ! function_exists( 'astrocare_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function astrocare_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'astrocare' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'astrocare' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'astrocare_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function astrocare_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'astrocare' ) );
		if ( $categories_list && astrocare_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'astrocare' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'astrocare' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'astrocare' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'astrocare' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'astrocare' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function astrocare_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'astrocare_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'astrocare_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so astrocare_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so astrocare_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in astrocare_categorized_blog.
 */
function astrocare_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'astrocare_categories' );
}
add_action( 'edit_category', 'astrocare_category_transient_flusher' );
add_action( 'save_post',     'astrocare_category_transient_flusher' );

/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('astrocare_sticky_menu')):
	function astrocare_sticky_menu()
	{
		$hide_show_sticky = get_theme_mod('hide_show_sticky','1');

		if ($hide_show_sticky == '1'):
			return 'is-sticky-on';
		else:
			return 'not-sticky';
		endif;
	}
endif;

/**
 * Register Google fonts for astrocare.
 */
function astrocare_google_font() {
	
	$get_fonts_url = '';

	$font_families = array();

	$font_families = array('Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900');

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	return $get_fonts_url;
}

function astrocare_scripts_styles() {
	wp_enqueue_style( 'astrocare-fonts', astrocare_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'astrocare_scripts_styles' );

/**
 * Register Breadcrumb for Multiple Variation
 */
function astrocare_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');	
}

/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'astrocare_post_layout' )) :
	function astrocare_post_layout(){
		if(is_active_sidebar('astrocare-sidebar-primary'))
			{ echo 'col-lg-8'; } 
		else 
			{ echo 'col-lg-12'; }  
	} endif;

/**
 * Section Seprator title image
 */
if(!function_exists( 'astrocare_title_img_seprator' )) :
	function astrocare_title_img_seprator(){ 
		$astrocare_ge_title_img  = get_theme_mod('ge_title_img',get_template_directory_uri() .'/assets/images/general/earth.png');
		if ( ! empty( $astrocare_ge_title_img ) ) : ?>
			<img src="<?php echo esc_url($astrocare_ge_title_img); ?>" alt="Astrocare">
		<?php endif;

	} add_action('astrocare_title_img_seprator','astrocare_title_img_seprator'); endif;

/**
 *	Astrocare Dynamic Styles
 */

if( ! function_exists( 'astrocare_theme_dynamic_style' ) ):
	function astrocare_theme_dynamic_style() {

		$output_css = '';
/**
*  Breadcrumb Style
*/
$breadcrumb_bg_img	= get_theme_mod('breadcrumb_bg_img',get_template_directory_uri() .'/assets/images/bg/breadcrumbs-bg.png'); 
$breadcrumb_heading_img	= get_theme_mod('breadcrumb_heading_img',get_template_directory_uri() .'/assets/images/bg/breadcrumbs-heading.png');

   //  breadcrumb bg image
if($breadcrumb_bg_img !== '') { 
	$output_css .="section.breadcrumb-area {
		background-image: url(".esc_attr($breadcrumb_bg_img).");
	}\n";
}
   // breadcrumb content image
if($breadcrumb_heading_img !== '') { 
	$output_css .=".breadcrumb-content {
		background-image: url(".esc_attr($breadcrumb_heading_img).");
	}\n";
}

wp_add_inline_style( 'astrocare-style', $output_css );
}
endif;
add_action( 'wp_enqueue_scripts', 'astrocare_theme_dynamic_style' );