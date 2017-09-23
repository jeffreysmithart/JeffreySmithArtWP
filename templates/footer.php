<?php if (get_field('sign_up_for_display') == "footer_top" || is_archive('portfolio') || is_search() ) { ?>
<div class="sign-up-box sign-up-box-top" <?php
		if (get_field('newsletter_background_image', 'option')){
				echo 'style="background-image: url(\'';
				the_field('newsletter_background_image', 'option');
				echo '\'); "';
			}
	?>>
	<div class="row">
		<div class="small-12 columns ">
			<div class="sign-up-box-inner">
				<?php dynamic_sidebar('sidebar-sign-up'); ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<footer class="content-info site-footer">
	<div class="container">
		
		<?php
			if ( is_wc_endpoint_url( 'order-received' ) || ( ! is_cart() && ! is_checkout() )  ){
		?>
		<div class="row  site-footer-inner">
			<div class="small-12 columns insta-wrapper">
				<?php dynamic_sidebar('sidebar-footer-top'); ?>
			</div>
		</div>
		<?php } ?>
		<?php
			if ( is_wc_endpoint_url( 'order-received' ) || ( ! is_cart() && ! is_checkout() ) ){
		?>
		<div class="row ">
			<?php if ( is_front_page() || get_field('sign_up_for_display') == "footer_right"){ ?>
			<div class=" small-12 medium-6 column about-stacked">
				<?php dynamic_sidebar('sidebar-footer-left'); ?>
			</div>

			<div class=" small-12 medium-6 column">
			<div class=" sign-up-box" <?php
					if (get_field('newsletter_background_image', 'option')){
						echo 'style="background-image: url(\'';
						the_field('newsletter_background_image', 'option');
						echo '\'); "';
					}
				?>>
				
				
				<div class="sign-up-box-inner">

					<?php dynamic_sidebar('sidebar-sign-up'); ?>

				</div>
				</div>
				
			</div>

			<?php } else { ?>

			<div class=" small-12  column">
				<?php dynamic_sidebar('sidebar-footer-left'); ?>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		<div class="row">
			<div class="columns sub-footer">

                <div class="row">
                    <div class="footer-follow medium-text-right text-center column">
                        <ul class="footer-follow__social-menu  text-left ">
                            <li class="insta footer-follow__social-menu-item"><a href="https://www.instagram.com/jeffreysmithart" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i><div class="footer-follow__social-menu-text"><h4>My Latest Work</h4><h5>INSTAGRAM &gt;</h5></div></a></li>
                            <li class="pin footer-follow__social-menu-item"><a href="https://www.pinterest.com/jeffreysmithart" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i><div class="footer-follow__social-menu-text"><h4>Artsy Inspiration</h4><h5>PINTEREST &gt;</h5></div></a></li>
                            <li class="fb footer-follow__social-menu-item"><a  href="https://www.facebook.com/jeffreysmithart/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i><div class="footer-follow__social-menu-text"><h4>Studio News</h4><h5>FACEBOOK &gt;</h5></div></a></li>
                            <li class="mail footer-follow__social-menu-item"><a href="/contact" ><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="footer-follow__social-menu-text"><h4>Get Your Question Answered</h4><h5>CONTACT ME &gt;</h5></div></a></li>
                        </ul>


                    </div>
                </div>

				<div class="medium-text-right text-center copy-info">	
					<h5><span>&copy;<?php echo date('Y'); ?> Jeffrey Smith Art</span></h5>
				</div>
                <div class="row align-justify align-middle medium-unstack">
                    <div class="medium-text-left  text-center footer-menu column">
                        <?php
                        dynamic_sidebar('sidebar-footer-bottom');
                        ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
	
	
</footer>