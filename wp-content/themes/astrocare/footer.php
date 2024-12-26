<?php
$astrocare_footer_copyright	= get_theme_mod('footer_copyright','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
$astrocare_foo_right_desc	= get_theme_mod('footer_right_description','Privacy Policy - Terms & Conditions');
$astrocare_foo_top_logo     = get_theme_mod('footer_top_logo',get_template_directory_uri() .'/assets/images/logo/footer-logo.png');
?>
<footer class="ast_section ast_footer_wrapper bubbles_wrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<div class="ast_footer_top">
					<div class="ast_footer_logo footer_top_left">
						<?php if ( ! empty( $astrocare_foo_top_logo ) ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo esc_url($astrocare_foo_top_logo); ?>" alt="<?php echo esc_html_e('Astrocare','astrocare'); ?>">
							</a>
						<?php endif; ?>
						<div class="ast_ft_copyright">
							<?php if ( ! empty( $astrocare_footer_copyright ) ){ 
								$astrocare_copyright_allowed_tags = array(
									'[current_year]' => date_i18n('Y'),
									'[site_title]'   => get_bloginfo('name'),
									'[theme_author]' => sprintf(
										'<a href="%s">%s</a>',
										esc_url('https://burgerthemes.com/'),
										wp_kses_post(__('Burger Software', 'astrocare'))
									),
								);
								?>                          
								<div class="copyright-text">
									<?php
									echo apply_filters('astrocare_footer_copyright', wp_kses_post(astrocare_str_replace_assoc($astrocare_copyright_allowed_tags, $astrocare_footer_copyright)));
									?>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="footer_top_right">
						<?php do_action( 'astrocare_footer_social_icon'); ?>
						<div class="ast_ft_policy">
							<?php if ( ! empty( $astrocare_foo_right_desc ) ) : ?>
								<p class="py_policy"><?php echo wp_kses_post($astrocare_foo_right_desc); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<?php if ( is_active_sidebar( 'astrocare-footer-widget-area' ) ) : ?>
			<div class="row row-cols-1 row-cols-lg-4 row-cols-md-2">
				<?php dynamic_sidebar( 'astrocare-footer-widget-area' ); ?>
			</div>
		<?php endif; ?>

		<div class="row">
			<div class="col-lg-4 col-md-12 col-12 ml-lg-auto">
				<?php do_action( 'astrocare_footer_payment_method'); ?>
			</div>
		</div>
	</div>
</footer>
<button class="back-to-top" type="button"><i class="fa fa-chevron-up"></i></button>
<div class="AstroAPI-loader-body">
	<div class="AstroAPI-loader-body-inner">
		<div class="loader loader-1">
			<div class="loader-outter"></div>
			<div class="loader-inner"></div>
		</div>
	</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>