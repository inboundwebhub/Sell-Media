<?php

/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sell Media
 * @since 0.1
 */
get_header(); ?>

	<?php global $wp_query; if ( get_term_meta( $wp_query->queried_object_id, 'collection_hidden', true ) == "on" ) : ?>
		<div id="sell-media-archive" class="sell-media">
			<div id="content" role="main">
			<?php _e( 'This collection is hidden.', 'sell_media' ); ?>
			</div>
		</div>
	<?php else : ?>

	<div id="sell-media-archive" class="sell-media">
		<div id="content" role="main">
			<header class="entry-header">
				<h1 class="entry-title">
					<?php $taxonomy = get_query_var( 'taxonomy' ); ?>
					<?php if ( $taxonomy ) : ?>
						<?php global $wp_query; ?>
						<?php print $taxonomy; ?>: <?php print $wp_query->queried_object->name; ?>
					<?php else : ?>
						<?php print _e( 'Archive', 'sell_media' ); ?>
					<?php endif; ?>
				</h1>
			</header>

			<div class="sell-media-grid-container">
			<?php if ( have_posts() ) : ?>
				<?php rewind_posts(); ?>
				<?php $i = 0; ?>
				<?php while ( have_posts() ) : the_post(); $i++; ?>
					<?php
						if ( $i %3 == 0)
							$end = ' end';
						else
							$end = null;
					?>
					<div class="sell-media-grid<?php echo $end; ?>">
						<a href="<?php the_permalink(); ?>"><?php sell_media_item_icon( get_post_meta( $post->ID, '_sell_media_attachment_id', true ) ); ?></a>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php sell_media_item_buy_button( $post->ID, 'text', 'Purchase' ); ?>
					</div>
				<?php endwhile; ?>
    			<?php sell_media_pagination_filter(); ?>
			</div><!-- .sell-media-grid-container -->
			<?php else : ?>
				<p><?php _e( 'Nothing Found', 'sell_media' ); ?></p>
			<?php endif; $i = 0; ?>
		</div><!-- #content -->
	</div><!-- #sell_media-single .sell_media -->
<?php endif; ?>
<?php get_footer(); ?>
