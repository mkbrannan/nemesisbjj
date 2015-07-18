<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

</div><!-- / end page container, begun in the header -->
<?php if( !is_page('gallery') ) :?>

	<div class="sticky">
		<a href="/contact/" class="button">One Week Free Trial</a>
	</div>
	<footer class="site-footer" role="contentinfo">
			
			<div class="container gallery">
			
				<?php if ( have_posts() ) : 
				// Do we haleryve any posts/pages in the databse that match our query?
				?>
	
					<?php while ( have_posts() ) : the_post(); 
					// If we have a page to show, start a loop that will display it
					?>
	
						<div class="footer-gallery-holder">
								<?php query_posts('post_type=post&post_status=publish&posts_per_page=5&paged='. get_query_var('paged')); ?>
	
									<?php if( have_posts() ): ?>
								
								        <?php while( have_posts() ): the_post(); ?>
											<div class="image-holder">
												<a href="/gallery/">
													<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
													<div id="post-<?php get_the_ID(); ?>" class="gallery-preview <?php post_class(); ?>" style="background-image: url('<?php echo $thumb['0'];?>')" ></div><!-- /#post-<?php get_the_ID(); ?> -->
												</a>	
											</div>
								        <?php endwhile; ?>
								        
								    <?php else: ?>
	
								<?php endif; wp_reset_query(); ?>
						</div><!-- footer-gallery-->
							
					
					<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>
	
				
	
				<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
				<div class="content">
					<h4>Check out the most recent photos from Nemesis Jiu Jitsu, or add your own!</h4>
					<a href="/gallery/" class="button">View Gym Photos &#187;</a> <a href="/submit-photos/" class="button">Submit Gym Photos &#187;</a>
				</div>
			
			</div>
			
	
			
			<div class="social">
				<ul>
					<li><a class="facebook" href="https://www.facebook.com/NemBJJ" target="_blank"></a></li>
					<li><a class="instagram" href="https://instagram.com/nemesisbjj/" target="_blank"></a></li>
					<li><a class="youtube" href="https://www.youtube.com/user/NemesisJiuJitsu" target="_blank"></a></li>
				</ul>
			</div>
		
			
	</footer><!-- #colophon .site-footer -->
<?php endif;?>
<?php wp_footer(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>


</body>
</html>
