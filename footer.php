	</div>
		<footer class="footer">
			<div class="container">
				<div class="footer__holder">
					<div class="footer__logo">
						<img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="" />
					</div>
					<div class="footer__item">
						<div class="footer__nav">
							<?php wp_nav_menu( array('menu' => 'Footer menu 1','theme_location'=>'footer_menu_1','container'=>null )); ?>
						</div>
					</div>
					<div class="footer__item">
						<h4 class="footer__headline">Contacts</h4>
						<div class="footer__nav">
							<?php wp_nav_menu( array('menu' => 'Footer menu 2','theme_location'=>'footer_menu_2','container'=>null )); ?>
						</div>
					</div>
					<div class="footer__item footer__soc">
						<h4 class="footer__headline">Follow Us</h4>
						<ul class="footer__soc-list social">
							<?php if(get_field('socs','options')): ?>
							<?php while(the_repeater_field('socs','options')): ?>
							<li>
								<a href="<?php echo get_sub_field('link'); ?>">
									<?php echo (get_sub_field('icon')); ?>
								</a>
							</li>
							<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="footer__bottom">
					<?php wp_nav_menu( array('menu' => 'Footer menu bottom','theme_location'=>'footer_menu_bottom','container'=>null )); ?>
				</div>
			</div>
		</footer>
	</body>
<?php wp_footer(); ?>
</html>
