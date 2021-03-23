<?php
get_header();
?>

    <main class="container-fluid">
        <section>
			<?php services__banner(); ?>
            <!--            todo сюда услуги-->
        </section>
        <section class="row permissions">
            <div class="container">
				<?php
				front__permisions();
				?>
            </div>
        </section>
        <section class="container front__about mb-5">
            <h2>Обо мне</h2>
            <div class="row">
                <div class="col-12">
                    Учёба в Италии – больше не несбыточная мечта! Всё более реально, чем ты думаешь.
                    Меня давно манила солнечная страна пиццы и спагетти. Академический уровень университетов тоже
                    казался
                    многообещающим.
                    Когда я решила поступать в Италию, то столкнулась с рядом вопросов:
                    -как выбрать университет, город, специальность
                    -на каком языке учиться: итальянском или английском
                    -какие документы требуются в посольство
                    -какие существуют стипендии и как на них податься
                    -насколько дорого обойдётся обучение в Италии
                    -как от визы перейти к виду на жительство
                    -где найти жильё
                    ..и многое-многое другое.

                </div>
            </div>
        </section>
        <section class="row services pb-5">
            <div class="container">
                <h2>Услуги</h2>

				<?php
				// указываем категорию 9 и выключаем разбиение на страницы (пагинацию)


				services_card();

				?>

            </div>
        </section>

        <section class="row guide_block justify-content-center lyuba__guiede-bg">
            <style>
                .lyuba__guiede-bg{
                    background: url('<?php echo nl2br( esc_html( get_theme_mod( 'lyuba__guiede-bg' ) ) )?>') no-repeat 100% 50% fixed;
                    background-size: cover
                }
            </style>
            <div class="guide__filter"></div>
            <div class="container">
                <div class="row guide__content">
                    <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                        <h2 class="guide__header text-center wow animate__bounceInRight"><?php echo nl2br( esc_html( get_theme_mod( 'lyuba__guiede-title' ) ) )?></h2>
                        <p class="guide__description text-center"><?php echo nl2br( esc_html( get_theme_mod( 'lyuba__guiede-description' ) ) )?></p>

                        <div class="guide__file guide__footer">
                            <a href="<?php echo nl2br( esc_html( get_theme_mod( 'lyuba__guiede-file' ) ) )?>">Скачать</a>
                        </div>

                    </div>
                </div>
            </div>

            </sec>
        </section>


        <section class="container wow slideInLeft" data-wow-duration="2s" data-wow-delay="5s">
        <h2>Последние статьи</h2>
        <div class="row post__wrapper">

			<?php


			// указываем категорию 9 и выключаем разбиение на страницы (пагинацию)
			$query = new WP_Query( array(
				'post_type'      => 'post',
				'posts_per_page' => 5
			) );
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					posts_card();

				}
				if ( $query->max_num_pages > 1 ) :
					?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var true_posts = '<?php echo serialize( $query->query_vars ); ?>';
                        var current_page = <?php echo ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>;
                        var max_pages = '<?php echo $query->max_num_pages; ?>';
                    </script>
                    <!--                                    <div class="button-block row">-->
					<?php
					echo '<div id="true_loadmore" class="my-btn-green">Показать ещё</div>';

					// сброс
				endif;
				wp_reset_postdata(); // сбрасываем переменную $post
			} else {
				echo 'Записей нет.';
			}
			?>
        </div>
        </section>

        <section class="row front__testimonials mt-5">
            <div class="container">
                <h2>Отзывы клиентов</h2>
                <div class="row testimonial__wrapper">

					<?php
					// указываем категорию 9 и выключаем разбиение на страницы (пагинацию)
					$query = new WP_Query( array(
						'post_type' => 'testmonails'
					) );
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							testimonials_card();
						}
						wp_reset_postdata(); // сбрасываем переменную $post
					} else {
						echo 'Записей нет.';
					}
					?>
                </div>
            </div>

        </section>

        <section class="front_faq container mb-5">
            <h2>Вопрос ответ</h2>
            <div class="accordion" id="accordionFAQ">
				<?php
				// указываем категорию 9 и выключаем разбиение на страницы (пагинацию)
				$query = new WP_Query( array(
					'post_type' => 'faq'
				) );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						faq_card();
					}
					wp_reset_postdata(); // сбрасываем переменную $post
				} else {
					echo 'Записей нет.';
				}
				?>

            </div>
        </section>

    </main>

<?php
get_footer();
