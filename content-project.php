<?php
/**
 * @package lsx
 */
?>

<?php lsx_entry_before(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php lsx_entry_top(); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php // lsx_post_meta(); ?>
	</header><!-- .entry-header -->
	
	<?php if ( has_post_thumbnail() ) {
		$args = array(
				'class' => 'img-responsive'
			);
		the_post_thumbnail( 'project-thumb', $args );
	} else
		echo "<img class='img-responsive' src='http://placehold.it/360x240/' alt='placeholder' />"

	?>

	<div class="entry-content">
		<?php if ( ! is_singular() ) {
			the_excerpt();
		} else {
			the_content(); 
		} ?>
		<h2 id="testimonials">Testimonials</h2>
		<div class="testimonials">
			<?php $testimonials = get_post_meta( get_the_ID(), 'bs_project_testimonials', false ); ?>
			<?php
			foreach ( $testimonials as $testimonial_ids) {
				foreach ( $testimonial_ids as $testimonial_id ) {
					// print_r( $testimonial_id );
					$BS_Testimonials = new BS_Testimonials();
		        	echo $BS_Testimonials->output( array(
							'include' => $testimonial_id,
							'columns' => 1
						));
				}
			}
			?>
		</div>
		<h2 id="gallery">Gallery</h2>
		<div class="gallery">
			<?php $gallery = get_post_meta( get_the_ID(), 'bs_project_gallery', false ); ?>
			<?php if ( strlen( $gallery[0] ) !== 0 ) : ?>
			  	<div class="tab-pane <?php echo $active; ?>" id="gallery">							  									  		
			  		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  		  	<!-- Indicators -->
			  		  	<ol class="carousel-indicators">
			  		  		<?php $count = 0; ?>
				  		  	<?php foreach ( $gallery as $id ) { ?>
				  		  		<?php $count++; ?>
				  		  		<?php if ( $count == 1 ) $slide_active = 'active'; else $slide_active = ''; ?>
				  		  		<li data-target="#carousel-example-generic" data-slide-to="0" class="<?php echo $slide_active; ?>"></li>
				  		  	<?php } ?>							  		    	
			  		  	</ol>

			  		  	<!-- Wrapper for slides -->
			  		  	<div class="carousel-inner">
				  		  	<?php $count = 0; ?>
				  		  	<?php foreach ( $gallery as $id ) { ?>
				  		  		<?php $count++; ?>
				  		  		<?php if ( $count == 1 ) $slide_active = 'active'; else $slide_active = ''; ?>
				  		  		<div class="item <?php echo $slide_active; ?>">							  		  		
				  		  			<?php echo wp_get_attachment_image( $id, 'full' ); ?>
				  		  		</div>
				  		  	<?php } ?>							  		    
			  		  	</div>

			  		  <!-- Controls -->
			  		  	<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			  		    	<i class="fa fa-chevron-left"></i>
			  		  	</a>
			  		  	<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			  		    	<i class="fa fa-chevron-right"></i>
			  		  	</a>
			  		</div>						  		
			  	</div>
			  	<?php $active = ''; ?>
			  	
			<?php endif; ?>
		</div>	
		<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'lsx'), 'after' => '</p></nav>')); ?>
	</div><!-- .entry-content -->		

	<?php // lsx_entry_bottom(); ?>

</article><!-- #post-## -->

<?php // lsx_entry_after(); ?>