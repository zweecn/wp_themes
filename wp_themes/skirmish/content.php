<?php
/**
 * @package Skirmish
 * @since Skirmish 1.8
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="postedon">
		<div class="time"><?php the_time('m/j/Y') ?></div>
 		<?php if ( has_post_thumbnail()) : ?> 
   		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
   		<?php the_post_thumbnail('index-post-thumbnail'); ?>
   		</a>
		<?php else:?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
 		<?php echo getFirstImage($post->ID);?>
   		</a>
 		<?php endif; ?>
		</div>
	
	<div class="entry">	
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'skirmish' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'skirmish' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'skirmish' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'skirmish' ) );
				if ( $categories_list && skirmish_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'skirmish' ), $categories_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'skirmish' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( 'Tagged %1$s', 'skirmish' ), $tags_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'skirmish' ), __( '1 Comment', 'skirmish' ), __( '% Comments', 'skirmish' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'skirmish' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
</div><!-- end .entry -->
</article><!-- #post-<?php the_ID(); ?> -->