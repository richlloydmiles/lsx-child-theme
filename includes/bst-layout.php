<?php
function bst_enquire_modal() {
	?>
	<div class="modal fade" id="enquire-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        	<h4 class="modal-title" id="enquire-modal-label">Enquire</h4>
		      	</div>
			    <div class="modal-body">
			    	<?php if ( function_exists( 'gravity_form' ) ) { ?>
			        	<?php echo do_shortcode( '[gravityform id="2" name="Enquire Now" title="false"]' ); ?>
			        <?php } ?>
			    </div>
		    </div>
		</div>
	</div>
	<?php
}
add_action( 'lsx_body_bottom', 'bst_enquire_modal' );