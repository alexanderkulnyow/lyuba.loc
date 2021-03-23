<?php
/**
 * uni_italy Theme Customizer
 *
 * @package uni_italy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uni_italy_customize_register( $wp_customize ) {
	$dds_transport = 'postMessage';

	$wp_customize->add_section(
		'lyuba__guiede', // id секции, должен прописываться во всех настройках, которые в неё попадают
		array(
			'title'       => 'Гайд',
			'priority'    => 200, // приоритет расположения относительно других секций
			'description' => 'Блок гайд' // описание не обязательное
		)
	);
	//Заголовок гайда
	$wp_customize->add_setting(
		'lyuba__guiede-title', // id
		array(
			'default'   => 'Заголовок секции', // значение по умолчанию
			'transport' => $dds_transport
		)
	);

	$wp_customize->add_control(
		'lyuba__guiede-title', //id
		array(
			'type'     => 'text',
			'label'    => 'Заголовок блока', // title
			'settings' => 'lyuba__guiede-title', // id настроек
			'section'  => 'lyuba__guiede' // id секции
		)
	);
	//описание гайда
	$wp_customize->add_setting(
		'lyuba__guiede-description', // id
		array(
			'default'   => 'Описание секции', // значение по умолчанию
			'transport' => $dds_transport
		)
	);

	$wp_customize->add_control(
		'lyuba__guiede-description', //id
		array(
			'type'     => 'textarea',
			'label'    => 'Заголовок блока', // title
			'settings' => 'lyuba__guiede-description', // id настроек
			'section'  => 'lyuba__guiede' // id секции
		)
	);
//Файл гайда
	$wp_customize->add_setting(
		'lyuba__guiede-file', // id
		array(
			'default'   => '', // значение по умолчанию
			'transport' => $dds_transport
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Upload_Control(
			$wp_customize,
			'lyuba__guiede-file', //id
			array(
				'label'    => 'Пробная версия', // title
				'settings' => 'lyuba__guiede-file', // id настроек
				'section'  => 'lyuba__guiede' // id секции
			)
		)
	);
//	bg guide
	$wp_customize->add_setting(
		'lyuba__guiede-bg', // id
		array(
			'default'   => '', // значение по умолчанию
			'transport' => $dds_transport
		)
	);

//	bg guide
	$wp_customize->add_setting(
		'lyuba__guiede-bg', // id
		array(
			'default'   => '', // значение по умолчанию
			'transport' => $dds_transport
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'lyuba__guiede-bg-picker',
			array(
				'label'    => 'Фон для Гайд', // title
				'settings' => 'lyuba__guiede-bg', // id настроек
				'section'  => 'lyuba__guiede' // id секции
			)
		)
	);
	$wp_customize->add_section(
		'lyuba__social', // id секции, должен прописываться во всех настройках, которые в неё попадают
		array(
			'title'       => 'Контакты',
			'priority'    => 201, // приоритет расположения относительно других секций
			'description' => 'Контакты' // описание не обязательное
		)
	);
	$wp_customize->add_setting(
		'lyuba__tel-set', // id
		array(
			'default'   => '', // значение по умолчанию
			'transport' => $dds_transport
		)
	);

	$wp_customize->add_control(
		'lyuba__tel', //id
		array(
			'label'    => '# телефона', // title
			'settings' => 'lyuba__tel-set', // id настроек
			'section'  => 'lyuba__social' // id секции
		)

	);
	$wp_customize->add_setting(
		'lyuba__email-set', // id
		array(
			'default'   => '', // значение по умолчанию
			'transport' => $dds_transport
		)
	);

	$wp_customize->add_control(
		'lyuba__email', //id
		array(
			'label'    => 'email', // title
			'settings' => 'lyuba__email-set', // id настроек
			'section'  => 'lyuba__social' // id секции
		)

	);

	$wp_customize->add_setting(
		'lyuba__inst-set', // id
		array(
			'default'   => '', // значение по умолчанию
			'transport' => $dds_transport
		)
	);

	$wp_customize->add_control(
		'lyuba__inst', //id
		array(
			'label'    => 'instagram', // title
			'settings' => 'lyuba__inst-set', // id настроек
			'section'  => 'lyuba__social' // id секции
		)

	);

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'uni_italy_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'uni_italy_customize_partial_blogdescription',
			)
		);
		$wp_customize->selective_refresh->add_partial( 'lyuba__guiede-bg', array(
			'selector' => '.lyuba__guiede-bg',
//			'render_callback' => function () use ( $day ) {
//				return nl2br( esc_html( get_theme_mod( $day ) ) );
//			}
		) );
		$wp_customize->selective_refresh->add_partial( 'lyuba__guiede-title', array(
			'selector' => '.guide__header',
//			'render_callback' => function () use ( $day ) {
//				return nl2br( esc_html( get_theme_mod( $day ) ) );
//			}
		) );
		$wp_customize->selective_refresh->add_partial( 'lyuba__guiede-description', array(
			'selector' => '.guide__description',
//			'render_callback' => function () use ( $day ) {
//				return nl2br( esc_html( get_theme_mod( $day ) ) );
//			}
		) );
		$wp_customize->selective_refresh->add_partial( 'lyuba__guiede-file', array(
			'selector' => '.guide__file',
//			'render_callback' => function () use ( $day ) {
//				return nl2br( esc_html( get_theme_mod( $day ) ) );
//			}
		) );
	}
}

add_action( 'customize_register', 'uni_italy_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function uni_italy_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function uni_italy_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function uni_italy_customize_guide_bg() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function uni_italy_customize_preview_js() {
	wp_enqueue_script( 'uni_italy-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}

add_action( 'customize_preview_init', 'uni_italy_customize_preview_js' );
