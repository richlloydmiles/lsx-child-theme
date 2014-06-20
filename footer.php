<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package lsx
 */
?>

		</div><!-- .content -->
	</div><!-- wrap -->

	<div class="footer-cta">
		<div class="footer-cta-inner">
			<?php if ( function_exists( 'gravity_form' ) ) { ?>
				<?php gravity_form(3, true, true, false, '', true); ?>
			<?php } ?>
		</div>
	</div>

	<footer class="content-info" role="contentinfo">

		<?php lsx_footer_before(); ?>

		<div class="footer container">
		  	<div class="row">
		    	<div class="col-sm-12">

		    		<?php lsx_footer_top(); ?>

		      		<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>

		      		<p class="credit">Developed by <a href="http://lsdev.biz/" target="_blank">LightSpeed</a></p>

		      		<?php lsx_footer_bottom(); ?>
		      		
		    	</div>
		  	</div>
		</div>
	</footer>

	<?php lsx_footer_after(); ?>

<?php wp_footer(); ?>

<?php /*wp_footer(); TODO */ ?>
<?php lsx_body_bottom(); ?>
</body>
</html>