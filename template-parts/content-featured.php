<?php 
	if (!get_query_var('paged')) {
?>

<?php		

	$args = array( 
	    'posts_per_page' => 8,
		'ignore_sticky_posts' => 1,
		'post__not_in' => get_option( 'sticky_posts' ),		    
		'meta_query' => array(
                array(
                'key' => 'enjoytube-featured',
                'value' => 'yes'
        	)
    	)
	);  

	// The Query
	$the_query = new WP_Query( $args );

	$i = 1;

	if ( $the_query->have_posts() ) {	
	?>

	<div id="featured-content" class="clear">

	<div id="slider" class="flexslider">
		<ul class="slides">
		<?php 
			while ( $the_query->have_posts() ) : $the_query->the_post();
		?>	

		<li class="hentry">

			<?php if ( has_post_thumbnail() && ( get_the_post_thumbnail() != null ) ) { ?>
				<a class="thumbnail-link" href="<?php the_permalink(); ?>">
					<div class="thumbnail-wrap">
						<?php 
							the_post_thumbnail('enjoytube_featured_thumb');  
						?>
					</div><!-- .thumbnail-wrap -->
					<?php if( (enjoytube_has_embed_code() || enjoytube_has_embed()) ) { ?>
						<div class="icon-play"><i class="genericon genericon-play"></i></div>
					<?php } ?>					
				</a>
			<?php } ?>

			<div class="entry-header">
				<div class="entry-category">
					<?php enjoytube_first_category(); ?>
				</div>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-meta">
					<span class="entry-date"><?php echo esc_html( human_time_diff(get_the_time('U'), current_time('timestamp')) ) . ' '.  esc_html( 'ago', 'enjoytube' ); ?></span>
				</div><!-- .entry-meta -->
			</div><!-- .entry-header -->

			<div class="entry-summary">
				<p>
					<?php echo get_the_excerpt(); ?>
				</p>
				<div class="entry-more">
					<a href="<?php the_permalink(); ?>"><?php echo __('View more', 'enjoytube'); ?> &raquo;</a>
				</div>						
			</div>					
		</li><!-- .featured-large -->			

		<?php
			$i++;
			endwhile;
		?>

		</ul>
	</div>

	<div id="carousel" class="flexslider">
	  <ul class="slides">
		<?php 
			while ( $the_query->have_posts() ) : $the_query->the_post();
		?>			  
	    <li>
			<?php 
			if ( has_post_thumbnail() && ( get_the_post_thumbnail() != null ) ) {
				the_post_thumbnail('enjoytube_post_thumb');  
			} else {
				echo '<img src="' . get_template_directory_uri() . '/assets/img/featured-small-thumb.png" alt="" />';
			}
			?>
	    </li>
		<?php endwhile; ?>
	  </ul>
	</div>

	</div><!-- #featured-content -->

	<?php
		} //end if has featured posts
		wp_reset_postdata();				
	?>

<?php } ?>