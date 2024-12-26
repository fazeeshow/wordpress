<?php 
$astrocare_hs_abo_open      =   get_theme_mod('hs_above_opening','1');
$astrocare_enable_hdr_email =	get_theme_mod('hide_show_hdr_email','1');	
$astrocare_enable_hdr_btn   =	get_theme_mod('hide_show_hdr_btn','1');
$astrocare_abv_hdr_ope_icon	=   get_theme_mod('abv_hdr_opening_icon','fa-clock-o');
$astrocare_abv_hdr_ope_cont =	get_theme_mod('abv_hdr_opening_content','Mon - Sat 8:00 - 6:30, Sunday - CLOSED');
$astrocare_hdr_email_icon   =	get_theme_mod('hdr_email_icon','fa-envelope');
$astrocare_hdr_email_ttl    =	get_theme_mod('hdr_email_ttl','info@example.com');
$astrocare_hdr_btn_lbl      =	get_theme_mod('hdr_btn_lbl','Book Appointment');
$astrocare_hdr_btn_url      =	get_theme_mod('hdr_btn_url','');
$astrocare_new_tab          =   get_theme_mod('hdr_btn_open_new_tab','');
?>
<header class="main-header header-01">
	<div class="ast_info_bar d-none d-lg-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<?php 
					if($astrocare_hs_abo_open == '1') : ?>
						<div class="ast_inner_info ast_column_left">
							<span>
								<i class="fa <?php echo esc_attr( $astrocare_abv_hdr_ope_icon ); ?>"></i> <?php echo wp_kses_post( $astrocare_abv_hdr_ope_cont ); ?>
							</span>
						</div>
					<?php endif; 
					?>	
				</div>
				<div class="col-lg-6">
					<?php 
					if($astrocare_enable_hdr_email == '1') : ?>
						<div class="ast_inner_info ast_column_right">
							<span>
								<i class="fa <?php echo esc_attr( $astrocare_hdr_email_icon ); ?>"></i> <?php echo wp_kses_post( $astrocare_hdr_email_ttl ); ?>
							</span>
						</div>
					<?php endif; 
					?>	
				</div>
			</div>
		</div>
	</div>
	<div class="ast_header_wrapper <?php echo astrocare_sticky_menu(); ?>">
		<?php
		if ( get_header_image() ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
				<img class="astro_header-image" src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
			</a>	
		<?php endif; ?>
		<div class="container ">
			<div class="ast_header_navigation_wrapper">
				<div class="row">
					<div class="col-xl-12 col-lg-12">
						<div class="navbar navbar-expand-lg ast_navbar_wraper">
							<div class="ast_logo">
								<?php 
								if(has_custom_logo())
								{	
									the_custom_logo();
								}
								else { 
									?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<h4 class="site-title">
											<?php 
											echo esc_html(bloginfo('name'));
											?>
										</h4>
									</a>	
									<?php 						
								}
								?>
								<?php
								$astrocare_site_desc = get_bloginfo( 'description');
								if ($astrocare_site_desc) : ?>
									<p class="site-description"><?php echo esc_html($astrocare_site_desc); ?></p>
								<?php endif; ?>
							</div>
							<div class="ast_primary-menu">
								<button type="button" class="navbar-toggler" aria-label="Menu Collaped">
									<i class="fa fa-bars"></i>
								</button>
								<div class="nav-menu">
									<nav class="nav navbar-nav main-menu">
										<?php wp_nav_menu( 
											array(  
												'theme_location' => 'primary_menu',
												'container'  => '',
												'menu_class' => 'primary-menu-list',
												'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
												'walker' => new WP_Bootstrap_Navwalker()
											) 
										); ?>  
									</nav>
									<button type="button" class="navbar-close"><i class="fa fa-times"></i></button>
								</div>
							</div>
							<?php 
							if($astrocare_enable_hdr_btn == '1') : ?>
								<a href="<?php echo esc_url( $astrocare_hdr_btn_url ); ?>" <?php if($astrocare_new_tab == '1'): echo "target='_blank'"; endif;?> class="ast_book_btn astro_btn"><span><?php echo esc_html( $astrocare_hdr_btn_lbl ); ?></span></a>
							<?php endif; 
							?>	
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="body-overlay"></div>	
	</div>
</header>