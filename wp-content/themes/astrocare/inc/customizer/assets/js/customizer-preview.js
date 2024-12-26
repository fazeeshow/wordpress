/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	$(document).ready(function ($) {
		$('input[data-input-type]').on('input change', function () {
			var val = $(this).val();
			$(this).prev('.cs-range-value').html(val);
			$(this).val(val);
		});
	})
	
	/**
	 * logo_width
	 */
	wp.customize( 'logo_width', function( value ) {
		value.bind( function( width ) {
			jQuery( '.ast_logo img' ).css( 'max-width', width + 'px' );
		} );
	} );
	
	
	//abv_hdr_opening_content
	wp.customize(
		'abv_hdr_opening_content', function( value ) {
			value.bind(
				function( newval ) {
					$( '.main-header .ast_column_left span' ).text( newval );
				}
				);
		}
		);

	//hdr_email_ttl
	wp.customize(
		'hdr_email_ttl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.main-header .ast_column_right span' ).text( newval );
				}
				);
		}
		);

	//hdr_btn_lbl
	wp.customize(
		'hdr_btn_lbl', function( value ) {
			value.bind(
				function( newval ) {
					$( '.main-header .ast_book_btn' ).text( newval );
				}
				);
		}
		);

	//blog_title
	wp.customize(
		'blog_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_blog_section .astro_theme_titles h5' ).text( newval );
				}
				);
		}
		);

	//blog_subtitle
	wp.customize(
		'blog_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_blog_section .astro_theme_titles h2' ).text( newval );
				}
				);
		}
		);

	//astroform_title
	wp.customize(
		'astroform_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_astro-slider-form .astro_theme_titles h5' ).text( newval );
				}
				);
		}
		);

	//horoscope_title
	wp.customize(
		'horoscope_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.astrocare-horoscope .astro_theme_titles h5' ).text( newval );
				}
				);
		}
		);

	//horoscope_subtitle
	wp.customize(
		'horoscope_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.astrocare-horoscope .astro_theme_titles h2' ).text( newval );
				}
				);
		}
		);

	//service_title
	wp.customize(
		'service_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_service_section .astro_theme_titles h5' ).text( newval );
				}
				);
		}
		);

	//service_subtitle
	wp.customize(
		'service_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_service_section .astro_theme_titles h2' ).text( newval );
				}
				);
		}
		);

	//kundli_title
	wp.customize(
		'kundli_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_kundli-section .astro_theme_titles h5' ).text( newval );
				}
				);
		}
		);

	//kundli_subtitle
	wp.customize(
		'kundli_subtitle', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_kundli-section .astro_theme_titles h2' ).text( newval );
				}
				);
		}
		);

	//kundli_wave_title
	wp.customize(
		'kundli_wave_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_kundli-section .hs_waves2 h4' ).text( newval );
				}
				);
		}
		);

	//footer_copyright
	wp.customize(
		'footer_copyright', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_footer_wrapper .ast_footer_top .ast_ft_copyright' ).text( newval );
				}
				);
		}
		);

	//footer_right_description
	wp.customize(
		'footer_right_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.ast_footer_wrapper .footer_top_right .ast_ft_policy' ).text( newval );
				}
				);
		}
		);

	 /**
	 * Breadcrumb 
	 */
	wp.customize( 'breadcrumb_min_height', function( value ) {
		value.bind( function( size ) {
			jQuery( 'section.breadcrumb-area' ).css( 'min-height', size + 'px' );
		} );
	} );


   /**
	 * Body font size
	 */
	wp.customize( 'astrocare_body_font_size', function( value ) {
		value.bind( function( size ) {
			jQuery( 'body' ).css( 'font-size', size + 'px' );
		} );
	} );


   /**
	 * Body font style
	 */
	wp.customize( 'astrocare_body_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'body' ).css( 'font-style', font_style );
		} );
	} );


	/**
	 * Body text tranform
	 */
	wp.customize( 'astrocare_body_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'body' ).css( 'text-transform', text_tranform );
		} );
	} );

	/**
	 * astrocare_body_line_height
	 */
	wp.customize( 'astrocare_body_line_height', function( value ) {
		value.bind( function( line_height ) {
			jQuery( 'body' ).css( 'line-height', line_height );
		} );
	} );

	/**
	 * H1 font family
	 */
	wp.customize( 'astrocare_h1_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h1' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H1 font size
	 */
	wp.customize( 'astrocare_h1_font_size', function( value ) {
		value.bind( function( size ) {
			jQuery( 'h1' ).css( 'font-size', size + 'px' );
		} );
	} );
	
	
	/**
	 * H1 font style
	 */
	wp.customize( 'astrocare_h1_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h1' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H1 text tranform
	 */
	wp.customize( 'astrocare_h1_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h1' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H1 line height
	 */
	wp.customize( 'astrocare_h1_line_height', function( value ) {
		value.bind( function( line_height ) {
			jQuery( 'h1' ).css( 'line-height', line_height );
		} );
	} );
	
	/**
	 * H2 font family
	 */
	wp.customize( 'astrocare_h2_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h2' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H2 font size
	 */
	wp.customize( 'astrocare_h2_font_size', function( value ) {
		value.bind( function( size ) {
			jQuery( 'h2' ).css( 'font-size', size + 'px' );
		} );
	} );
	
	/**
	 * H2 font style
	 */
	wp.customize( 'astrocare_h2_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h2' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H2 text tranform
	 */
	wp.customize( 'astrocare_h2_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h2' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H2 line height
	 */
	wp.customize( 'astrocare_h2_line_height', function( value ) {
		value.bind( function( line_height ) {
			jQuery( 'h2' ).css( 'line-height', line_height );
		} );
	} );
	
	/**
	 * H3 font family
	 */
	wp.customize( 'astrocare_h3_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h3' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H3 font size
	 */
	wp.customize( 'astrocare_h3_font_size', function( value ) {
		value.bind( function( size ) {
			jQuery( 'h3' ).css( 'font-size', size + 'px' );
		} );
	} );
	
	/**
	 * H3 font style
	 */
	wp.customize( 'astrocare_h3_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h3' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H3 text tranform
	 */
	wp.customize( 'astrocare_h3_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h3' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H3 line height
	 */
	wp.customize( 'astrocare_h3_line_height', function( value ) {
		value.bind( function( line_height ) {
			jQuery( 'h3' ).css( 'line-height', line_height );
		} );
	} );
	
	/**
	 * H4 font family
	 */
	wp.customize( 'astrocare_h4_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h4' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H4 font size
	 */
	wp.customize( 'astrocare_h4_font_size', function( value ) {
		value.bind( function( size ) {
			jQuery( 'h4' ).css( 'font-size', size + 'px' );
		} );
	} );
	
	/**
	 * H4 font style
	 */
	wp.customize( 'astrocare_h4_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h4' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H4 text tranform
	 */
	wp.customize( 'astrocare_h4_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h4' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H4 line height
	 */
	wp.customize( 'astrocare_h4_line_height', function( value ) {
		value.bind( function( line_height ) {
			jQuery( 'h4' ).css( 'line-height', line_height );
		} );
	} );
	
	/**
	 * H5 font family
	 */
	wp.customize( 'astrocare_h5_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h5' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H5 font size
	 */
	wp.customize( 'astrocare_h5_font_size', function( value ) {
		value.bind( function( size ) {
			jQuery( 'h5' ).css( 'font-size', size + 'px' );
		} );
	} );
	
	/**
	 * H5 font style
	 */
	wp.customize( 'astrocare_h5_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h5' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H5 text tranform
	 */
	wp.customize( 'astrocare_h5_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h5' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H5 line height
	 */
	wp.customize( 'astrocare_h5_line_height', function( value ) {
		value.bind( function( line_height ) {
			jQuery( 'h5' ).css( 'line-height', line_height );
		} );
	} );
	
	/**
	 * H6 font family
	 */
	wp.customize( 'astrocare_h6_font_family', function( value ) {
		value.bind( function( font_family ) {
			jQuery( 'h6' ).css( 'font-family', font_family );
		} );
	} );
	
	/**
	 * H6 font size
	 */
	wp.customize( 'astrocare_h6_font_size', function( value ) {
		value.bind( function( size ) {
			jQuery( 'h6' ).css( 'font-size', size + 'px' );
		} );
	} );
	
	/**
	 * H6 font style
	 */
	wp.customize( 'astrocare_h6_font_style', function( value ) {
		value.bind( function( font_style ) {
			jQuery( 'h6' ).css( 'font-style', font_style );
		} );
	} );
	
	/**
	 * H6 text tranform
	 */
	wp.customize( 'astrocare_h6_text_transform', function( value ) {
		value.bind( function( text_tranform ) {
			jQuery( 'h6' ).css( 'text-transform', text_tranform );
		} );
	} );
	
	/**
	 * H6 line height
	 */
	wp.customize( 'astrocare_h6_line_height', function( value ) {
		value.bind( function( line_height ) {
			jQuery( 'h6' ).css( 'line-height', line_height );
		} );
	} );
	
} )( jQuery );