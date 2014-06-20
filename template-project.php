<?php
/**
 * The template for displaying Archive pages.
 * 
 * Template Name: Projects
 *
 * @package lsx
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">

		<?php lsx_content_before(); ?>

		<main id="main" class="site-main" role="main">

		<?php lsx_content_top(); ?>
		
		<?php
		$args = array(
			'post_type' => 'project',				
			'posts_per_page' => -1,
			'meta_key' => 'bs_project_featured',
			'meta_value' => 1
			);
		
		$featured_posts = get_posts( $args );
		?>
		<div id="carousel" class="carousel slide" data-ride="carousel">
		  	<!-- Indicators -->
		  	<ol class="carousel-indicators">
		  		<?php $count = 0; ?>
			  	<?php foreach ( $featured_posts as $featured_post ) { ?>
			  		<?php $count++; ?>
			  		<?php if ( $count == 1 ) $slide_active = 'active'; else $slide_active = ''; ?>
			  		<li data-target="#carousel" data-slide-to="0" class="<?php echo $slide_active; ?>"></li>
			  	<?php } ?>							  		    	
		  	</ol>

		  	<!-- Wrapper for slides -->
		  	<div class="carousel-inner">
			  	<?php $count = 0; ?>
			  	<?php foreach ( $featured_posts as $featured_post ) { ?>
			  		<?php $count++; ?>
			  		<?php if ( $count == 1 ) $slide_active = 'active'; else $slide_active = ''; ?>
			  		<div class="item <?php echo $slide_active; ?>">							  		  		
			  			<div class="featured jumbotron">
							<div class="row">
								<div class="col-md-7 col-sm-12">
									<a href="<?php echo get_permalink( $featured_post->ID ); ?>">			
										<?php if ( has_post_thumbnail( $featured_post->ID ) ) {
											$args = array(
													'class' => 'img-responsive center-block'
												);
											echo get_the_post_thumbnail( $featured_post->ID, 'project-featured', $args );
										} else
											echo "<img class='img-responsive center-block' src='http://placehold.it/600x480/' alt='placeholder' />"
										?>
									</a>
								</div>
								<div class="col-md-5 col-sm-12">
									<h2><a href="<?php echo get_permalink( $featured_post->ID ); ?>"><?php echo $featured_post->post_title; ?></a></h2>
									<?php if ( $featured_post->post_excerpt ) {
										echo $featured_post->post_excerpt;
									} else {
										echo substr( $featured_post->post_content, 0, 300 ) . '...';
									} ?>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
			  		</div>
			  	<?php } ?>							  		    
		  	</div>

		  <!-- Controls -->
		  	<a class="left carousel-control" href="#carousel" data-slide="prev">
		    	<i class="fa fa-chevron-left"></i>
		  	</a>
		  	<a class="right carousel-control" href="#carousel" data-slide="next">
		    	<i class="fa fa-chevron-right"></i>
		  	</a>
		</div>						  		

		<?php 
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
				'post_type' => 'project',				
				'posts_per_page' => 8,
				'paged' => $paged,
				'meta_value' => 'bs_project_featured',
				'meta_value' => 0 
				);
		$query = new WP_Query( $args );

		$active = 'active';
		$count = 0;
		?>
		
		<?php if ( $query->have_posts() ) : ?>
						
			<div class="project-archive">
			
				<?php while ( $query->have_posts() ) : $query->the_post(); $count++;?>
				  	
					<div class="col-sm-12 col-md-6 col-lg-4">
						<div class="well">
							<a href="<?php echo the_permalink(); ?>">
								<?php
								if ( has_post_thumbnail() )
									the_post_thumbnail( 'project-thumb' );
								else
									echo "<img src='http://placehold.it/360x240/' alt='placeholder' />"

								?>
							</a>
							<h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
					</div>			 		
						
					<?php if ( $count >= 1 && $count % 3 == 0 ) echo "<div class='hidden-md hidden-sm clearfix'></div>"; ?>

					<?php if ( $count >= 1 && $count % 2 == 0 ) echo "<div class='hidden-lg hidden-sm clearfix'></div>"; ?>

					<?php endwhile; ?>
					
					<div class="col-sm-12 col-md-6 col-lg-4">
						<div class="well">
							<a href="#">
								<img src='<?php echo get_stylesheet_directory_uri() ?>/images/add_project.png' alt='placeholder' />
							</a>
							<h3><a href="<?php echo the_permalink(); ?>">Add Your Project</a></h3>
							<p>Your project could be here too!</p>
						</div>
					</div>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</div>
			<div class="clearfix"></div>
		<?php if ( function_exists('wp_pagenavi') ) { ?>
			<?php wp_pagenavi( array( 'query' => $query ) ); ?>
		<?php } ?>

		<?php lsx_content_bottom(); ?>
		<div class="clearfix"></div>
		</main><!-- #main -->
		
		<?php lsx_content_after(); ?>			

	</section><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
