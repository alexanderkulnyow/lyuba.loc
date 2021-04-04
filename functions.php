<?php
/**
 * uni_italy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uni_italy
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.288' );
}
add_filter( 'get_the_archive_title', function ( $title ) {
	return preg_replace( '~^[^:]+: ~', '', $title );
} );
update_option( 'medium_crop', 1 );
if ( ! function_exists( 'uni_italy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function uni_italy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on uni_italy, use a find and replace
		 * to change 'uni_italy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'uni_italy', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'uni_italy' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'uni_italy_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;

add_action( 'after_setup_theme', 'uni_italy_setup' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'blog-thumbnails', 300, 260, true ); // 300 в ширину и без ограничения в высоту
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uni_italy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uni_italy_content_width', 640 );
}

add_action( 'after_setup_theme', 'uni_italy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uni_italy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'uni_italy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'uni_italy' ),
			'before_widget' => '<section id="%1$s" class="widget widget_archive %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Single_Prod', 'uni_italy' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'uni_italy' ),
			'before_widget' => '<section id="%1$s" class="widget widget_archive %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}


add_action( 'widgets_init', 'uni_italy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function uni_italy_scripts() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendors/bootstrap-4.5.2-dist/css/bootstrap.css', array(), '4.5.2' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/vendors/slick/slick.css', array(), '1.8.1' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/vendors/slick/slick-theme.css', array(), '1.8.1' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/vendors/animatecss/animate.min.css', array(), '4.1.1' );
	wp_enqueue_style( 'uni_italy-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'uni_italy-style', 'rtl', 'replace' );

	wp_enqueue_script( 'uni_italy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendors/bootstrap-4.5.2-dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.5.2', true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/vendors/mixitup/mixitup.min.js', array(), '3.3.1', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/vendors/slick/slick.min.js', array( 'jquery' ), '1.8.1', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/vendors/wowjs/wow.min.js', array( 'jquery' ), '1.3.0', true );
	wp_enqueue_script( 'uni_italy-main', get_template_directory_uri() . '/js/main.js', array( 'wow' ), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'uni_italy_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

require get_template_directory() . '/inc/custom-post-type.php';

function services__banner() {
	global $id;
	?>
    <div id="Wp_Bootstrap_Carousel" class="row carousel slide" data-ride="carousel" data-interval="1000000">
		<?php
		$count__publish = wp_count_posts( 'product' )->publish;
		if ( $count__publish > 1 ) {
			?>
            <ol class="carousel-indicators">
				<?php
				$query = new WP_Query( array(
					'post_type' => 'product'
				) );
				?>
				<?php if ( $query->have_posts() ) : ?>
					<?php $i = 0; ?>
					<?php while ( $query->have_posts() ) : $query->the_post() ?>
                        <li data-target="#Wp_Bootstrap_Carousel" data-slide-to="<?php echo $i ?>"
                            class="<?php if ( $i === 0 ): ?>active<?php endif; ?>"></li>
						<?php $i ++; ?>
					<?php endwhile ?>
				<?php endif ?>
				<?php wp_reset_postdata(); ?>
            </ol>
            <!-- Controls -->
            <a class="carousel-control-prev" href="#Wp_Bootstrap_Carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#Wp_Bootstrap_Carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
			<?php
		} ?>

        <div class="carousel-inner dds__banner" role="listbox">
            <style>
                .dds__banner {
                    background-image: url("<?php echo bloginfo('template_url'); ?>/img/bg/bg.jpg");
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: 53% 50%;
                }
            </style>
			<?php
			$args  = array(
				'post_type' => 'product',
			);
			$query = new WP_Query( $args );
			?>
			<?php if ( $query->have_posts() ) : ?>
				<?php $i = 0; ?>
				<?php while ( $query->have_posts() ) : $query->the_post() ?>
                    <div class="carousel-item <?php if ( $i === 0 ): ?>active<?php endif; ?>" style="">
                        <!--                        <img class="img-fluid"-->
                        <!--                             style="width: 100vw; height: auto;"-->
                        <!--                             src="-->
						<?php //echo get_the_post_thumbnail_url( $id, 'full' ); ?><!--"-->
                        <!--                             srcset="-->
						<?php //echo get_the_post_thumbnail_url( $id, 'full' ); ?><!-- 1920w,-->
                        <!--	                        				-->
						<?php //echo get_the_post_thumbnail_url( $id, 'midle' ); ?><!-- 768w"-->
                        <!--                             sizes="(max-width: 800px) 768w, (min-width: 801px) 1920px"-->
                        <!--                             title="--><?php //the_title_attribute(); ?><!--"-->
                        <!--                             alt="Поступление в италию">-->
                        <div class="carousel__caption">
                            <h2 class="banner__title"><?php echo esc_html( get_the_title() ); ?></h2>
                            <a class="banner__button" href="<?php echo the_permalink(); ?>">Подробнее</a>
                        </div>
                    </div>
					<?php $i ++; ?>
				<?php endwhile ?>
			<?php endif ?>
			<?php wp_reset_postdata(); ?>
        </div>


    </div>
	<?php

}

function front__permisions() {
	echo ' <div class="row">';
	$query = new WP_Query( array(
		'post_type' => 'permisions'
	) );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			echo '<div class="col-12 col-md-4 container-permission">';
			$default_attr = array(
				'class' => "permission-img"
			);
			the_post_thumbnail( 'thumbnail', $default_attr );
			the_title( '<p>', '</p>' );
			echo '</div>';
		}
		echo '</div>';
		wp_reset_postdata(); // сбрасываем переменную $post

	} else {
		echo 'Записей нет.';
	}

}


function services_card() {
	$query = new WP_Query( array(
		'post_type' => 'product'
	) );

	?>
    <div class="row product__wrapper justify-content-center">
		<?php
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				?>

                <div class="card services__card" style="">
                    <div class="services__card-header">
						<?php the_post_thumbnail( 'medium', array( 'class' => 'w-100' ) ); ?>
                    </div>
                    <div class="services__card-body">
                        <h4><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
                    </div>
                    <div class="services__card-footer align-self-end w-100">
<!--	                    --><?php //woocommerce_template_single_price(); ?>
                        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-services-1 w-100">Подробнее</a>
                    </div>
                </div>

				<?php
			}
			wp_reset_postdata(); // сбрасываем переменную $post
		} else {
			echo 'Записей нет.';
		} ?>
    </div>
	<?php

}

//post card
function posts_card() { ?>
    <div class="ml-1 mr-1">
        <div class="card post__card" style="">
            <div class="card-header post__card-header text-center p-0">
				<?php
				uni_italy_post_thumbnail();
				?>
                <time class="post__time"><?php echo get_the_date( 'j M. Y' ); ?></time>
            </div>
            <div class="card-body post__card-body">
                <h4><?php the_title(); ?></h4>
				<?php the_excerpt(); ?>
            </div>
            <div class="post__card-footer">
                <a href="<?php echo get_the_permalink(); ?>" class="read__more">Подробнее</a>
            </div>
        </div>
    </div>
	<?php
}

add_filter( 'excerpt_length', function () {
	return 23;
} );
add_filter( 'excerpt_more', function ( $more ) {
	global $post;

	return '...';

} );
//end post card
function testimonials_card() { ?>
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card testimonial__card" style="">
			<?php
			the_post_thumbnail( 'thumbnail' );
			?>
            <h4><?php the_title(); ?></h4>
            <div class="card-body ">

				<?php the_content(); ?>
            </div>
        </div>
    </div>
	<?php
}

function faq_card() { ?>
    <div class="card faq__card">
        <div class="card-header faq__card-header" id="heading<?php the_ID(); ?>">
            <h4 style="cursor: pointer" data-toggle="collapse" data-target="#collapse<?php the_ID(); ?>"
                aria-expanded="true" aria-controls="collapse<?php the_ID(); ?>" class="w-100">
				<?php echo get_the_title(); ?>
            </h4>
        </div>
        <div id="collapse<?php the_ID(); ?>" class="collapse" aria-labelledby="heading<?php the_ID(); ?>"
             data-parent="#accordionFAQ">
            <div class="card-body">
				<?php the_content(); ?>
            </div>
        </div>
    </div>
	<?php
}

if ( ! function_exists( 'uni_italy_entry_footer1' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function uni_italy_entry_footer1() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'uni_italy' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Категория: %1$s', 'uni_italy' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'uni_italy' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'uni_italy' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__( 'Комментарий<span class="screen-reader-text"> on %s</span>', 'uni_italy' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'uni_italy' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if ( ! function_exists( 'uni_italy_posted_on1' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function uni_italy_posted_on1() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'uni_italy' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;



function uni_italy_guide_sample() {
	?>
        <a style="cursor: pointer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Получить</a>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Пробная версия Гайд</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php echo do_shortcode('[contact-form-7 id="2553" title="Пробник гайд"]')?>

                </div>
            </div>
        </div>
    </div>
	<?php
}

