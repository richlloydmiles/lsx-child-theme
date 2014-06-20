<?php
/**
 * The template for displaying Archive pages.
 * 
 * Template Name: Features - Tour Operators
 *
 * @package lsx
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">

		<?php lsx_content_before(); ?>

		<main id="main" class="site-main" role="main">

		<?php lsx_content_top(); ?>
				
				<header class="page-header">
					<h1 class="page-title">
						<?php the_title(); ?>
					</h1>
				</header><!-- .page-header -->
				
				<section class="entry-content">
					<?php echo $post->post_content; ?>
				</section>
				
				<?php 
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array(
						'post_type' => 'feature',
						'feature-group' => 'tour-operator-page',
						'posts_per_page' => -1,
						'paged' => $paged,
						'orderby' => 'menu_order',
						'order' => 'ASC'
						);
				$query = new WP_Query( $args );

				$active = 'active';
				?>

				<?php if ( $query->have_posts() ) : ?>				

				<div class="bs-tabs">

				<ul class="nav nav-tabs">
				
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<?php
					$icon_font = get_post_meta( $post->ID, 'bs_feature_icon_font', true );
		            $icon_class = get_post_meta( $post->ID, 'bs_feature_icon_class', true );
					?>

					<li class="<?php echo $active; ?>">
					  	<a href="#<?php echo $post->post_name; ?>" data-toggle="tab"><?php the_title(); ?><i class="<?php echo $icon_font . ' ' . $icon_class; ?>"></i></a>			  	
					</li>

					<?php if ( $active == 'active') { $active = ''; } ?>
					
				<?php endwhile; ?>

				</ul>

				<?php
				wp_reset_query();

				$active = 'in active';
				?>

				<!-- Tab panes -->
				<div class="tab-content">

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				  <div class="tab-pane fade <?php echo $active; ?>" id="<?php echo $post->post_name; ?>">

				  	<?php the_content(); ?>

				  </div>

				  <?php if ( $active == 'in active') { $active = ''; } ?>
				
				<?php endwhile; ?>

				</div>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				<div class="clearfix"></div>
				
				</div>

				<?php lsx_content_bottom(); ?>
				
			<div class="clearfix"></div>
		</main><!-- #main -->

		<?php lsx_content_after(); ?>
		
	</section><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
