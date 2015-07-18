<?php 
/**
 * 	Template Name: Coaches Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	
		
	<div id="coaches" role="main" class="holder full sub-page"  >
			<?php if ( have_posts() ) : 
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

						<?php if (!is_front_page()) : // Only if this page is NOT being used as a home page, display the title ?>
							<h1 class='title'>
								<?php the_title(); // Display the page title ?>
							</h1>
						<?php endif; ?>
										
						<div class="lead-coach">
							<div id="eric" class="coach">
								<div class="info">
									<?php the_field('eric_hemphill')?>
								</div>
							</div>
						</div>
						<div class="all-coaches">
							<div id="josh" class="coach">
								<div class="info">
									<?php the_field('josh_botkin')?>
								</div>
							</div>
							<div id="stewart" class="coach">
								<div class="info">
									<?php the_field('stewart_sackett')?>
								</div>
							</div>
							<div id="shayne" class="coach ">
								<div class="info">
									<?php the_field('shayne_takamori')?>
								</div>
							</div>
							<div id="ricky" class="coach">
								<div class="info">
									<?php the_field('ricky_fernandez')?>
								</div>
							</div>
						</div>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
		
	</div><!-- #primary .-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>