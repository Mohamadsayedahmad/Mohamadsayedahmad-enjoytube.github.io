<div class="entry-meta">
	
	<?php if (is_single()) { ?>
		<span class="entry-category"><?php enjoytube_first_category(); ?></span>
		<span class="entry-author"><?php esc_url( the_author_posts_link() ); ?> &#8212; </span> 		
	<?php } ?>

	<?php if ( (!is_category()) && (!is_single()) ) { ?>
		<span class="entry-category"><?php enjoytube_first_category(); ?></span>
	<?php } ?>

	<span class="entry-date"><?php echo get_the_date(); ?></span>
	<span class="sep">&middot;</span>
	<span class='entry-comment'><?php comments_popup_link( __('0 Comment','enjoytube'), __('1 Comment','enjoytube'), __('% Comments','enjoytube'), 'comments-link', __('Comments off','enjoytube')); ?></span>
	
</div><!-- .entry-meta -->