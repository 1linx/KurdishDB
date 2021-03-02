		<footer id="footer" role="contentinfo">
		<div id="copyright">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			<?php if ( is_active_sidebar( 'footerarea' ) ) : ?>
				<div id="" class="" role=""><!-- #Footer Widget -->
					<?php dynamic_sidebar( 'footerarea' ); ?>
				</div><!-- #Footer Widget -->
			<?php endif; ?>
		</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>