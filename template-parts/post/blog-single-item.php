<?php
/**
 * The template for displaying single post
 *
 * @package WordPress
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) :
		endif; ?>
	</header>
    <!-- .entry-header -->
	<div class="blog__card w-100">
		<div class="blog__card__thumbnail">
			<?php
			the_post_thumbnail( 'blog-thumbnails' );
			?>
		</div>
		<div class="blog__card__captions">
			<div class="blog__card__header">
				<?php
				the_title( '<h2 class="entry-title card-title mt-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
				<div class="entry-meta">
					<?php
					uni_italy_posted_on1();
					?>
				</div>
			</div>

			<div class="blog__card-text">
				<?php
				the_excerpt(
					sprintf(
						wp_kses(
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'uni_italy' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uni_italy' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>
			<div class="blog__card__footer">
				<div class="">
<!--					--><?php //uni_italy_entry_footer1(); ?>
				</div>

				<a href="<?php echo get_permalink(); ?>" class="btn btn-services-1">Подробней</a>
			</div>
		</div>
	</div>
	</article>
