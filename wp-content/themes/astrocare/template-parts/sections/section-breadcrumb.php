<?php
$astrocare_hs_bread           = get_theme_mod('hs_breadcrumb','1');
$astrocare_bread_title_enable = get_theme_mod('breadcrumb_title_enable','1');
$astrocare_bread_path_enable  = get_theme_mod('breadcrumb_path_enable','1');
if($astrocare_hs_bread == '1') {	
	?>
	<section class="breadcrumb-section breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-xl-5 col-lg-6 col-md-8 col-12 m-auto">
					<div class="breadcrumb-content">
						<div class="breadcrumb-heading">
							<?php if($astrocare_bread_title_enable == '1') { ?>
								<h2><?php astrocare_breadcrumb_title(); ?></h2>
							<?php } ?>
						</div>
						<?php if($astrocare_bread_path_enable == '1') { ?>
							<ol class="breadcrumb-list">
								<li>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','astrocare'); ?></i></a>
								</li>
								<li><?php astrocare_breadcrumb_title();	?></li>
							</ol>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

