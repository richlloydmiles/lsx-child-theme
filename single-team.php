<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package lsx
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo lsx_main_class(); ?>">

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
								'class' => 'img-responsive center-block'
							);
						the_post_thumbnail( 'thumbnail', $args );
					} else
						echo "<img class='img-responsive center-block' src='http://placehold.it/1043x480/' alt='placeholder' />"

					?>
	
					<?php  
						$job_title = get_post_meta( get_the_ID(), 'bs_job_title', true );
						$location = get_post_meta( get_the_ID(), 'bs_location', true );
						$email = get_post_meta( get_the_ID(), 'bs_email_contact', true );
						$tel = get_post_meta( get_the_ID(), 'bs_tel', true );
						$fax = get_post_meta( get_the_ID(), 'bs_fax', true );
						$skype = get_post_meta( get_the_ID(), 'bs_skype', true );
						$facebook = get_post_meta( get_the_ID(), 'bs_facebook', true );
						$twitter = get_post_meta( get_the_ID(), 'bs_twitter', true );
						$googleplus = get_post_meta( get_the_ID(), 'bs_googleplus', true );
						$linkedin = get_post_meta( get_the_ID(), 'bs_linkedin', true );
						$user = get_post_meta( get_the_ID(), 'bs_user_id', true );
					?>

					<div class="entry-content">
						<?php the_content(); ?>
						<ul class="list-group">
							<?php if ( $job_title ) { ?>
								<li class="list-group-item"><strong>Job Title:</strong> <?php echo $job_title; ?></li>
							<?php } ?>
							<?php if ( $location ) { ?>
								<li class="list-group-item"><strong>Location:</strong> <?php echo $location; ?></li>
							<?php } ?>
							<?php if ( $email ) { ?>
								<li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
							<?php } ?>
							<?php if ( $tel ) { ?>
								<li class="list-group-item"><strong>Tel: </strong> <?php echo $tel; ?></li>
							<?php  } ?>
							<?php if ( $fax ) { ?>
								<li class="list-group-item"><strong>Fax: </strong> <?php echo $fax; ?></li>
							<?php } ?>
							<?php if ( $skype ) { ?>
								<li class="list-group-item"><strong>Skype: </strong> <?php echo $skype; ?></li>
							<?php } ?>
							<?php if ( $facebook ) { ?>
								<li class="list-group-item"><strong>Facebook: </strong> <?php echo $facebook; ?></li>
							<?php } ?>
							<?php if ( $twitter ) { ?>
								<li class="list-group-item"><strong>Twitter: </strong> <?php echo $twitter; ?></li>
							<?php } ?>
							<?php if ( $googleplus ) { ?>
								<li class="list-group-item"><strong>Google Plus: </strong> <?php echo $googleplus; ?></li>
							<?php } ?>
							<?php if ( $linkedin ) { ?>
								<li class="list-group-item"><strong>LinkedIn: </strong> <?php echo $linkedin; ?></li>
							<?php } ?>
						</ul>
					</div>

				</article>

			<?php endwhile; // end of the loop. ?>

			<?php lsx_content_bottom(); ?>

		</main><!-- #main -->

		<?php lsx_content_after(); ?>
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
