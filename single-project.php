<?php
/**
 * The Template for displaying all single posts.
 *
 * @package lsx
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-10">

		<?php lsx_content_before(); ?>

		<main id="main" class="site-main" role="main">

		<?php lsx_content_top(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

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
					
					<div class="testimonials">
						<?php $testimonials = get_post_meta( get_the_ID(), 'bs_project_testimonials', false ); ?>
						<?php
						if ( $testimonials ) { ?>
							<h2 id="testimonials">Testimonials</h2>
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
						}
						?>
					</div>					
					<div class="gallery">
						<?php $gallery = get_post_meta( get_the_ID(), 'bs_project_gallery', false ); ?>
						<?php if ( strlen( $gallery[0] ) !== 0 ) : ?>
							<h2 id="gallery">Gallery</h2>
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

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		<?php lsx_content_bottom(); ?>

		</main><!-- #main -->
		
		<?php lsx_content_after(); ?>
		
	</div><!-- #primary -->
	<nav id="affix-nav" class="sidebar col-md-2">
	    <ul class="nav sidenav" data-spy="affix" data-offset-top="330" data-offset-bottom="520">
	        <li><a href="#the-company">The Company</a>
	        <li><a href="#the-challenge">The Challenge</a>
	       	<li><a href="#the-solution">The Solution</a>
	       	<li><a href="#the-result">The Result</a>
	       	<li><a href="#services">Services</a>
	       	<?php if ( get_post_meta( get_the_ID(), 'bs_project_testimonials', false ) ) { ?>
	       		<li><a href="#testimonials">Testimonials</a>
	       	<?php } ?>
	       	<?php if ( strlen( $gallery[0] ) !== 0 ) { ?>
				<li><a href="#gallery">Gallery</a>
	       	<?php } ?>
	    </ul>
	</nav>
	
	<script>
	jQuery(document).ready(function($) {
		
		var offset = 115;
		$('.nav.sidenav li a').click(function(event) {
		    event.preventDefault();
		    $($(this).attr('href'))[0].scrollIntoView();
		    scrollBy(0, -offset);
		});
	});
	</script>
	              	           
<?php // get_sidebar(); ?>
<?php // get_sidebar( 'alt' ); ?>
<?php get_footer(); ?>