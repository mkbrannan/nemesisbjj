<?php 
/**
 * 	Template Name: Gallery
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
	
	
	<div id="primary" class="content-holder">
		<div id="content" role="main" class="template blog">
			<?php if ( have_posts() ) : 
			// Do we haleryve any posts/pages in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

					<article class="gallery">
										
						<!--<div class="intro">
							<?php if (!is_front_page()) : // Only if this page is NOT being used as a home page, display the title ?>
								<h1 class='title'>
									<?php the_title(); // Display the page title ?>
								</h1>
							<?php endif; ?>
						</div>	
					-->
				
						<div class="the-content">
							<?php query_posts('post_type=post&post_status=publish&posts_per_page=100&paged='. get_query_var('paged')); ?>

							<?php if( have_posts() ): ?>
						
						        <?php while( have_posts() ): the_post(); ?>
									<div class="image-holder">
										<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
										<a href="<?php echo $thumb['0'];?>" rel="lightbox">
											<div class="gallery-preview <?php post_class(); ?>" style="background-image: url('<?php echo $thumb['0'];?>')" >
											 	<!-- Title over image	<h2><?php the_title(); ?></h2> -->
							        		</div><!-- /#post-<?php get_the_ID(); ?> -->
										</a>
									</div>
									<!--<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( ); ?></a>-->
						
										
									<!--</a>	-->
						        	
						       		
						
						        <?php endwhile; ?>
						            
						        <div class="navigation">
									<span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> 
									<span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
								</div><!-- /.navigation -->
					
						<?php else: ?>

		<div id="post-404" class="noposts">

		    <p><?php _e('None found.','example'); ?></p>

	    </div><!-- /#post-404 -->

	<?php endif; wp_reset_query(); ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Sorry, We Can't Find That Information </h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
		</div><!-- #content .site-content -->
        <div class="sticky">
			<a href="/submit-photos/" class="button">Submit Gym Photos &#187;</a>
		</div>
	
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>